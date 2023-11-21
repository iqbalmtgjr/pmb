<?php

namespace App\Http\Controllers;

use App\Models\Pmbprodi;
use App\Models\Pmbupload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileuploadController extends Controller
{
    public function index()
    {
        $jalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $gam = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        return view('upload.index', compact('jalur', 'gam'));
    }

    public function foto(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'foto' => ['required'],
        ]);

        if ($validator->fails()) {
            toastr()->error('File belum dipilih! Silahkan lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        if ($data == false) {
            toastr()->warning('Bukti transaksi belum diupload oleh panitia PMB!, Silahkan hubungi panitia PMB sebelum melanjutkan upload berkas', 'Peringatan');
            return redirect()->back();
        }

        if (!empty($data->foto_upload)) {
            // Hapus yang lama dulu foto filenya
            $path = public_path('assets/berkas/foto/' . $data->foto_upload);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        $extension = $request->foto->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        $request->file('foto')->move(public_path('assets/berkas/foto/'), $nama_file);
        $data->update([
            'foto_upload' => $nama_file
        ]);

        toastr()->success('Bukti berhasil diupload!', 'Selamat');
        return redirect()->back();
    }
}
