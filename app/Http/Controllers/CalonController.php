<?php

namespace App\Http\Controllers;

use App\Models\Pmbakun;
use App\Models\Pmbsiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
        if ($data->valid_bayar != 2) {
            toastr()->warning('Anda belum tervalidasi', 'Peringatan');
            return redirect()->back();
        }
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
            'kab_siswa' => 'required',
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

    public function downloadkartu()
    {
        $warga = Pmbakun::leftJoin('pmb_siswa', 'pmb_akun.pengenal_akun', '=', 'pmb_siswa.akun_siswa')
            ->leftJoin('pmb_prodi', 'pmb_akun.pengenal_akun', '=', 'pmb_prodi.prodi_id_siswa')
            ->leftJoin('prodi', 'pmb_prodi.pilihan_satu', '=', 'prodi.id_prodi')
            ->leftJoin('prod', 'pmb_prodi.pilihan_dua', '=', 'prod.id_prodi_baru')
            ->where('pmb_akun.pengenal_akun', auth()->user()->pengenal_akun)
            ->first();
        $pdf = Pdf::loadView('kartupendaftaran.kartu_pendaftaran', compact('warga'))->setPaper('a5', 'potrait');
        return $pdf->stream('Kartu Pendaftaran.pdf');
    }
}
