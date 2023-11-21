<?php

namespace App\Http\Controllers;

use App\Models\Pmbinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfopmbController extends Controller
{
    public function index()
    {
        $data = Pmbinfo::where('info_siswa_akun', auth()->user()->pengenal_akun)->first();
        return view('infopmb.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_informan' => 'nullable',
            'no_hp' => 'nullable',
            'media_info' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbinfo::where('info_siswa_akun', auth()->user()->pengenal_akun)->first();
        if ($data == false) {
            Pmbinfo::create([
                'info_siswa_akun' => auth()->user()->pengenal_akun,
                'nama_informan' => $request->nama_informan,
                'no_hp' => $request->no_hp,
                'media_info' => $request->media_info,
            ]);
        } else {
            $data->update($request->all());
        }

        toastr()->success('Data berhasil diinput!', 'Selamat');
        return redirect()->back();
    }
}
