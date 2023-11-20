<?php

namespace App\Http\Controllers;

use App\Models\Pmbprodi;
use App\Models\Pmbsekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendidikanController extends Controller
{
    public function index()
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $data = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();

        return view('pendidikan.index', compact('data', 'cekjalur'));
    }

    public function postPendidikan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_sekolah' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'jurusan_sekolah' => 'required',
            'tahun_lulus_sekolah' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Pmbsekolah::updateOrCreate([
            'sekolah_id_siswa' => auth()->user()->pengenal_akun,
            'jenis_sekolah' => $request->jenis_sekolah,
            'nama_sekolah' => $request->nama_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'jurusan_sekolah' => $request->jurusan_sekolah,
            'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
            'ijasah_sekolah' => $request->ijasah_sekolah,
        ]);

        toastr()->success('Data berhasil diinput!', 'Selamat');
        return redirect()->back();
    }
}
