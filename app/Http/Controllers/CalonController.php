<?php

namespace App\Http\Controllers;

use App\Models\Pmbsiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user());
        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        return view('calon.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik_siswa' => 'required',
            'tmp_lahir_siswa' => 'required',
            'tgl_lahir_siswa' => 'required',
            'jekel_siswa' => 'required',
            'agama_siswa' => 'required',
            'desa_siswa' => 'required',
            'kec_siswa' => 'required',
            'pos_siswa' => 'required',
            'hp_siswa' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $data->update($request->all());

        toastr()->success('Data berhasil diinput!, Silahkan lanjutkan mengisi data sekolah', 'Selamat');
        return redirect('pendidikan');
    }
}
