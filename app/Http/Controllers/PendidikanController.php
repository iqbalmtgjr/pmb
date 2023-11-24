<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Pmbprodi;
use App\Models\Pmbsiswa;
use App\Models\Pmbupload;
use App\Models\Pmbsekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PendidikanController extends Controller
{
    public function index()
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $data = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();
        $upload = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        // $smk = json_decode(Http::get('https://api-sekolah-indonesia.vercel.app/sekolah/SMK?page=1&perPage=5'));
        // $sma = json_decode(Http::get('https://api-sekolah-indonesia.vercel.app/sekolah/SMA'));
        $cekvalid = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        if ($cekvalid->valid_bayar != 2) {
            toastr()->warning('Anda belum tervalidasi', 'Peringatan');
            return redirect()->back();
        }
        return view('pendidikan.index', compact('data', 'cekjalur', 'upload'));
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

    public function postSmt1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester1' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester1->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester1')->move(public_path('assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_satu' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_satu)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('assets/berkas/rapor/' . $data->semes_satu);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester1')->move(public_path('assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_satu' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function postSmt2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester2' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester2->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester2')->move(public_path('assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_dua' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_dua)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('assets/berkas/rapor/' . $data->semes_dua);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester2')->move(public_path('assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_dua' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function postSmt3(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester3' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester3->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester3')->move(public_path('assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_tiga' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_tiga)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('assets/berkas/rapor/' . $data->semes_tiga);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester3')->move(public_path('assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_tiga' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function postSmt4(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester4' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester4->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester4')->move(public_path('assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_empat' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_empat)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('assets/berkas/rapor/' . $data->semes_empat);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester4')->move(public_path('assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_empat' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }
}
