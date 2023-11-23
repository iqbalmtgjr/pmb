<?php

namespace App\Http\Controllers;

use App\Models\Pmbakun;
use App\Models\Pmbsiswa;
use App\Models\Pmbupload;
use Illuminate\Http\Request;
use App\Models\Pmbpenerimaan;
use App\Models\Biayakuliahpmb;
use App\Models\Buktibayar;
use App\Models\Pembayaranrinci;
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
        $bayar = Buktibayar::where('akunb_msiswa', auth()->user()->pengenal_akun)->get();
        return view('info.konfirmasi_bayar', compact('cekjalur', 'biaya', 'bayar'));
    }

    public function postKonfirmasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pengirim' => ['required'],
            'bank_pengirim' => ['required'],
            'tanggal_transaksi' => ['required'],
            'jam_transaksi' => ['required'],
            'no_referensi' => ['nullable'],
            'jumlah_pembayaran' => ['required'],
            'detail_pembayaran' => ['required'],
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $masuk_bukti = Buktibayar::create([
            'akunb_msiswa' => auth()->user()->pengenal_akun,
            'nama_pengirim' => $request->nama_pengirim,
            'bank_pengirim' => $request->bank_pengirim,
            'tgl_trans' => $request->tanggal_transaksi,
            'jam_trans' => $request->jam_transaksi,
            'nomor_refe' => $request->no_referensi,
            'jlh_bayar' => $request->jumlah_pembayaran,
            'validasi_bukti' => 1,
            'konfirm_bauk' => 1,
        ]);

        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $item = $request->detail_pembayaran;
        $query = Biayakuliahpmb::whereIn('id_biayakuliahpmb', $item)->get();
        $point = array();
        if ($cekjalur->jalur == 'test') {
            foreach ($query as $rinci) {
                $point[] = array(
                    'bukti_id_bayar' => $masuk_bukti->id_bukti_bayar,
                    'akun_pembayaran' => auth()->user()->pengenal_akun,
                    'jenis_bayar_rinci' => $rinci->id_biayakuliahpmb,
                    'jumlah_rinci' => $rinci->test_biaya,
                    'semester_rinci' => 1,
                    'smt_nama' => 'ganjil',
                    'tahun_ajaran' => '2023/2024'
                );
            }
        } elseif ($cekjalur->jalur == 'prestasi') {
            foreach ($query as $rinci) {
                $point[] = array(
                    'bukti_id_bayar' => $masuk_bukti->id_bukti_bayar,
                    'akun_pembayaran' => auth()->user()->pengenal_akun,
                    'jenis_bayar_rinci' => $rinci->id_biayakuliahpmb,
                    'jumlah_rinci' => $rinci->prestasi_biaya,
                    'semester_rinci' => 1,
                    'smt_nama' => 'ganjil',
                    'tahun_ajaran' => '2023/2024'
                );
            }
        } else {
            foreach ($query as $rinci) {
                $point[] = array(
                    'bukti_id_bayar' => $masuk_bukti->id_bukti_bayar,
                    'akun_pembayaran' => auth()->user()->pengenal_akun,
                    'jenis_bayar_rinci' => $rinci->id_biayakuliahpmb,
                    'jumlah_rinci' => $rinci->reguler2_biaya,
                    'semester_rinci' => 1,
                    'smt_nama' => 'ganjil',
                    'tahun_ajaran' => '2023/2024'
                );
            }
        }
        // dd($point);
        Pembayaranrinci::insert($point);

        toastr()->success('Rincian berhasil diinput!', 'Selamat');
        return redirect()->back();
    }

    public function uploadBuktibayar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bukti' => 'required|mimes:jpg,png|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('File belum dipilih!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Buktibayar::where('akunb_msiswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->bukti->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if (!empty($data->bukti_bayar)) {
            // Hapus yang lama dulu foto filenya
            $path = public_path('assets/berkas/bukti/' . $data->bukti_bayar);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        $request->file('bukti')->move(public_path('assets/berkas/bukti/'), $nama_file);
        $data->update([
            'bukti_bayar' => $nama_file
        ]);

        toastr()->success('Bukti bayar berhasil diupload!', 'Selamat');
        return redirect()->back();
    }
}
