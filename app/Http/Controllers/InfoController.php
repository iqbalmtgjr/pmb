<?php

namespace App\Http\Controllers;

use App\Models\Pmbakun;
use App\Models\Pmbsiswa;
use Illuminate\Http\Request;
use App\Models\Biayakuliahpmb;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    public function index()
    {
        $data = Pmbakun::leftJoin('pmb_siswa', 'pmb_akun.pengenal_akun', '=', 'pmb_siswa.akun_siswa')
            ->leftJoin('pmb_prodi', 'pmb_akun.pengenal_akun', '=', 'pmb_prodi.prodi_id_siswa')
            ->where('pmb_akun.pengenal_akun', auth()->user()->pengenal_akun)
            ->first();
        return view('info.index', compact('data'));
    }

    public function pembayaran()
    {
        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $biaya = Biayakuliahpmb::all();
        return view('info.pembayaran', compact('data', 'biaya'));
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

        toastr()->success('Metode bayar berhasil diinput!', 'Selamat');
        return redirect()->back();
    }
}
