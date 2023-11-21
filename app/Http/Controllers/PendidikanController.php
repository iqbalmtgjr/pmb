<?php

namespace App\Http\Controllers;

use App\Models\Pmbprodi;
use App\Models\Pmbsekolah;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class PendidikanController extends Controller
{
    public function index()
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $data = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();
        // $smk = json_decode(Http::get('https://api-sekolah-indonesia.vercel.app/sekolah/SMK?page=1&perPage=5'));
        // $sma = json_decode(Http::get('https://api-sekolah-indonesia.vercel.app/sekolah/SMA'));
        return view('pendidikan.index', compact('data', 'cekjalur'));
    }

    public function postPendidikan(Request $request)
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        if ($cekjalur->jalur == 'test') {
            $validator = Validator::make($request->all(), [
                'jenis_sekolah' => 'required',
                'nama_sekolah' => 'required',
                'alamat_sekolah' => 'required',
                'jurusan_sekolah' => 'required',
                'tahun_lulus_sekolah' => 'required',
                'ijasah_sekolah' => 'nullable',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'jenis_sekolah' => 'required',
                'nama_sekolah' => 'required',
                'alamat_sekolah' => 'required',
                'jurusan_sekolah' => 'required',
                'tahun_lulus_sekolah' => 'required',
                'ijasah_sekolah' => 'nullable',
                'nilai_satu' => 'required',
                'nilai_dua' => 'required',
                'nilai_tiga' => 'required',
                'nilai_empat' => 'required',
            ]);
        }

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $sklh = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();
        if ($cekjalur->jalur == 'test') {
            if ($sklh == false) {
                Pmbsekolah::create([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'nama_sekolah' => $request->nama_sekolah,
                    'alamat_sekolah' => $request->alamat_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                ]);
            } else {
                $sklh->update([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'nama_sekolah' => $request->nama_sekolah,
                    'alamat_sekolah' => $request->alamat_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                ]);
            }
        } else {
            if ($sklh == false) {
                Pmbsekolah::create([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'nama_sekolah' => $request->nama_sekolah,
                    'alamat_sekolah' => $request->alamat_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                    'nilai_satu' => $request->nilai_satu,
                    'nilai_dua' => $request->nilai_dua,
                    'nilai_tiga' => $request->nilai_tiga,
                    'nilai_empat' => $request->nilai_empat,
                ]);
            } else {
                $sklh->update([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'nama_sekolah' => $request->nama_sekolah,
                    'alamat_sekolah' => $request->alamat_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                    'nilai_satu' => $request->nilai_satu,
                    'nilai_dua' => $request->nilai_dua,
                    'nilai_tiga' => $request->nilai_tiga,
                    'nilai_empat' => $request->nilai_empat,
                ]);
            }
        }

        toastr()->success('Data berhasil diinput! Silahkan isi data informasi dibawah ini', 'Selamat');
        return redirect('info-pmb');
    }
}
