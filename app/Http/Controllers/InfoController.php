<?php

namespace App\Http\Controllers;

use App\Models\Pmbakun;
use App\Models\Pmbsiswa;
use App\Models\Pmbupload;
use Illuminate\Http\Request;
use App\Models\Pmbpenerimaan;
use App\Models\Biayakuliahpmb;
use App\Models\Buktibayar;
use App\Models\Pmbjadwal;
use App\Models\Pmbprodi;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    public function index()
    {
        $data = Pmbakun::leftJoin('pmb_siswa', 'pmb_akun.pengenal_akun', '=', 'pmb_siswa.akun_siswa')
            ->leftJoin('pmb_prodi', 'pmb_akun.pengenal_akun', '=', 'pmb_prodi.prodi_id_siswa')
            ->where('pmb_akun.pengenal_akun', auth()->user()->pengenal_akun)
            ->first();
        $cekputus = Pmbpenerimaan::where('siswa_penerimaan', auth()->user()->pengenal_akun)->where('umumkan', 1)->first();
        if ($cekputus == true && $cekputus->status_penerimaan == 1) {
            return redirect('pembayaran');
        } else {
            return view('info.index', compact('data', 'cekputus'));
        }
    }

    public function pembayaran()
    {
        $gelombang = 1;
        $cekputus = Pmbpenerimaan::where('siswa_penerimaan', auth()->user()->pengenal_akun)->where('umumkan', 1)->first();
        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $biaya = Biayakuliahpmb::all();
        $cekbukti = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        return view('info.pembayaran', compact('cekputus', 'data', 'biaya', 'cekbukti', 'cekjalur'));
    }

    public function postMetodeBayar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'metode_bayar' => ['required'],
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $data->update([
            'metode_bayar' => $request->metode_bayar
        ]);

        // toastr()->success('Metode bayar berhasil diinput!', 'Selamat');
        return redirect()->back();
    }

    public function uploadBukti(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:png,jpg|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->foto->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('foto')->move(public_path('assets/berkas/bukti/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'foto_upload' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            $request->file('foto')->move(public_path('assets/berkas/bukti/'), $nama_file);
            $data->update([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'pembayaran_upload' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function infoTes()
    {
        $gelombang = 1;
        $data = Pmbjadwal::find($gelombang);
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        return view('info.infotes', compact('data', 'cekjalur'));
    }

    public function konfirmasi()
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $biaya = Biayakuliahpmb::all();
        $bayar = Buktibayar::where('akunb_msiswa', auth()->user()->pengenal_akun)->first();
        return view('info.konfirmasi_bayar', compact('cekjalur', 'biaya', 'bayar'));
    }

    public function postKonfirmasi(Request $request)
    {
        dd($request->all());
        return redirect()->back();
    }
}
