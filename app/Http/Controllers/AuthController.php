<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pmbakun;
use App\Models\Pmbprodi;
use App\Models\Pmbsiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // protected $username = 'email_akun_siswa';
    // protected $password = 'kunci_akun_siswa';

    // public function retrieveByCredentials(array $credentials)
    // {
    //     return User::where('email_akun_siswa', $credentials['email_akun_siswa'])->first();
    // }

    public function validator($data)
    {
        $validator = Validator::make($data, [
            'nama_siswa' => ['required', 'string', 'max:255'],
            'nis_siswa' => ['required', 'integer'],
            'hp_siswa' => ['required'],
            'email_akun_siswa' => ['required', 'string', 'email', 'max:255', 'unique:pmb_akun'],
            'prodi' => ['required'],
            'prodi2' => ['required'],
            'jalur' => ['required'],
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        // $this->validator($request->all());
        $validator = Validator::make($request->all(), [
            'nama_siswa' => ['required', 'string', 'max:255'],
            'nis_siswa' => ['required', 'integer'],
            'hp_siswa' => ['required'],
            'email_akun_siswa' => ['required', 'string', 'email', 'max:255', 'unique:pmb_akun'],
            'prodi' => ['required'],
            'prodi2' => ['required'],
            'jalur' => ['required'],
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $rand_password = Str::random(6);
        $rand_password = rand(100000, 999999);

        $rand_akun = Str::random(20);

        $rand_ref = Str::random(4);
        $rand_ref = rand(100000, 999999);

        Pmbsiswa::create([
            'akun_siswa' => $rand_akun,
            'ref' => $rand_ref,
            'nis_siswa' => $request->nis_siswa,
            'nama_siswa' => $request->nama_siswa,
            'hp_siswa' => $request->hp_siswa,
        ]);

        Pmbprodi::create([
            'prodi_id_siswa' => $rand_akun,
            'pilihan_satu' => $request->prodi,
            'pilihan_dua' => $request->prodi2,
            'jalur' => $request->jalur,
        ]);

        Pmbakun::create([
            'pengenal_akun' => $rand_akun,
            'email_akun_siswa' => $request->email_akun_siswa,
            'kunci_akun_siswa' => Hash::make($rand_password),
            'kuncigudang' => $rand_password,
            'status_akun' => 0,
            'gelombang' => 1,
            'alamat_ip_daftar' => $request->ip(),
            'daftar_akun' => now()->timestamp,
        ]);

        toastr()->success('Akun berhasil dibuat!', 'Selamat');
        return redirect()->back();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email_akun_siswa' => ['required'],
            'kunci_akun_siswa' => ['required'],
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = [
            'email_akun_siswa' => $request->email_akun_siswa,
            'kunci_akun_siswa' => $request->kunci_akun_siswa,
        ];

        if (Auth::attempt($credentials)) {
            toastr()->success('Anda berhasil login!', 'Selamat');
            return redirect('/');
        }

        toastr()->error('Email atau Password Salah!', 'Gagal');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
