@extends('layouts.master')
@section('content')
    @if ($cekputus == true && $cekputus->status_penerimaan == 1)
        <div class="text-center alert alert-success" role="alert">
            Selamat <br> <strong> Anda dinyatakan lulus di STKIP Persada Khatulistiwa Sintang! </strong>
        </div>
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Info Pembayaran Calon Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Diterima pada Prodi</label>
                    <div class="col-sm-8">
                        @if ($cekputus->prodi_penerimaan == 1)
                            <span class="form-control">Pendidikan Bahasa dan Sastra Indonesia</span>
                        @elseif($cekputus->prodi_penerimaan == 2)
                            <span class="form-control">Pendidikan Matematika</span>
                        @elseif($cekputus->prodi_penerimaan == 3)
                            <span class="form-control">Pendidikan Ekonomi</span>
                        @elseif($cekputus->prodi_penerimaan == 4)
                            <span class="form-control">Pendidikan Pancasila dan Kewarganegaraan</span>
                        @elseif($cekputus->prodi_penerimaan == 5)
                            <span class="form-control">Pendidikan Komputer</span>
                        @elseif($cekputus->prodi_penerimaan == 6)
                            <span class="form-control">Pendidikan Biologi</span>
                        @elseif($cekputus->prodi_penerimaan == 7)
                            <span class="form-control">Pendidikan Anak Usia Dini</span>
                        @elseif($cekputus->prodi_penerimaan == 8)
                            <span class="form-control">Pendidikan Bahasa Inggris</span>
                        @else
                            <span class="form-control">Pendidikan Guru Sekolah Dasar</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Catatan Penerimaan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" disabled>{{ $cekputus->note_penerimaan }}</textarea>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Item Pembayaran</th>
                            <th style="width: 40px">Biaya(Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cekjalur->jalur == 'prestasi')
                            <tr>
                                <td>1.</td>
                                <td>Biaya Registrasi Mahasiswa Baru</td>
                                <td>{{ rupiah($biaya[0]->prestasi_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Biaya Pengembangan Kampus</td>
                                <td>{{ rupiah($biaya[1]->prestasi_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>SPP Tetap / Semester</td>
                                <td>{{ rupiah($biaya[2]->prestasi_biaya) }}</td>
                            </tr>
                        @elseif($cekjalur->jalur == 'test')
                            <tr>
                                <td>1.</td>
                                <td>Biaya Registrasi Mahasiswa Baru</td>
                                <td>{{ rupiah($biaya[0]->test_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Biaya Pengembangan Kampus</td>
                                <td>{{ rupiah($biaya[1]->test_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>SPP Tetap / Semester</td>
                                <td>{{ rupiah($biaya[2]->test_biaya) }}</td>
                            </tr>
                        @else
                            <tr>
                                <td>1.</td>
                                <td>Biaya Registrasi Mahasiswa Baru</td>
                                <td>{{ rupiah($biaya[0]->reguler2_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Biaya Pengembangan Kampus</td>
                                <td>{{ rupiah($biaya[1]->reguler2_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>SPP Tetap / Semester</td>
                                <td>{{ rupiah($biaya[2]->reguler2_biaya) }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @php
                    if ($cekjalur->jalur == 'prestasi') {
                        $total = $biaya[0]->prestasi_biaya + $biaya[1]->prestasi_biaya + $biaya[2]->prestasi_biaya;
                    } else {
                        $total = $biaya[0]->test_biaya + $biaya[1]->test_biaya + $biaya[2]->test_biaya;
                    }
                @endphp
                <p>Pembayaran biaya Registrasi Mahasiswa Baru, Pengembangan kampus, SPP Tetap/Semester dilakukan mulai dari
                    dinyatakan lulus sampai dengan 25 April 2024</b></p>
                <div class="alert-warning p-2 text-center">
                    <h5><i class="icon fas fa-ban"></i> Perhatian!!!</h5><strong>Pembayaran hanya melalui Teller Bank
                        KALBAR</strong>
                </div>
                <p>Silahkan Melakukan Pembayaran Sebesar <b> Rp. {{ rupiah($total) }}</b>, melalui Teller Bank KALBAR ke
                    Nomor Rekening
                    <b>4010006517 (BANK KALBAR) </b> Atas Nama PRKMPULN BDN PEND KARYA BANGSA. <i>Masukan Berita pada
                        keterangan transfer bank anda sesuai dengan nomor pendaftaran yaitu :
                    </i><b>{{ auth()->user()->ref }}</b>. Setelah Melakukan Pembayaran Upload Bukti Transaksi (Slip Bank /
                    Struk
                    ATM) ke dalam Akun PMB ini dan melakukan Konfirmasi via WA/SMS ke Nomor 082155964080, konfirmasi
                    pembayaran paling lama dilakukan 2 x 24 jam setelah pembayaran.
                </p>
                <strong class="text-danger mb-3">Harap untuk melakukan konfirmasi pembayaran dengan klik tombol "Konfirmasi
                    Pembayaran" dibawah
                    ini.</strong>
                {{-- <h2 class="text-danger">Mahasiswa Baru wajib mengikuti kegiatan PKKMB pada tanggal 28 Agustus - 2 September
                    2023</h2> --}}
                <a href="{{ url('pembayaran/konfirmasi') }}" class="btn btn-primary">Konfirmasi Pembayaran</a>
            </div><br>

        </div>
        <a href="{{ url('calon') }}" class="btn btn-primary btn-md float-right mt-3 mb-3">Lanjutkan untuk melengkapi data
            anda</a>
    @else
        @if ($data->metode_bayar != null && $data->valid_bayar == 2)
            <div class="text-center alert alert-success" role="alert">
                Status Pembayaran <br> <strong> Sudah Divalidasi! </strong>
            </div>
        @elseif($data->metode_bayar != null && $data->valid_bayar == 1)
            <div class="text-center alert alert-success" role="alert">
                Status Pembayaran <br> <strong> Tidak Divalidasi! </strong> <br> Pembayaran tidak cocok direkening
                koran STKIP Persada Khatulistiwa
            </div>
        @elseif($data->metode_bayar != null)
            <div class="text-center alert alert-warning" role="alert">
                Status Pembayaran <br> <strong> Belum Divalidasi! </strong>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Info Pembayaran</h6>
            </div>
            <div class="card-body">
                @if ($cekputus == false)
                    @if ($data->metode_bayar == null && $data->valid_bayar == null)
                        <h5>Untuk melanjutkan proses pendaftaran anda harus memilih metode pembayaran registrasi PMB!!!</h5>
                        <form action="{{ url('postMetodeBayar') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Metode Bayar</label>
                                <select name="metode_bayar"
                                    class="form-control @error('metode_bayar') is-invalid @enderror">
                                    <option value=" ">-- Pilih Metode Bayar --</option>
                                    <option value="1" @selected(old('metode_bayar') == '1')>Panitian PMB</option>
                                    <option value="2" @selected(old('metode_bayar') == '2')>Teller Bank Kalbar</option>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-md">Simpan</button>
                        </form>
                    @elseif ($data->metode_bayar == 2)
                        @if ($data->valid_bayar == null)
                            <p>Silahkan Melakukan Pembayaran melalui Teller Bank ke Nomor Rekening 4010006517 (BANK KALBAR)
                                Atas
                                Nama
                                PRKMPULN BDN PEND KARYA BANGSA. Masukan Berita pada keterangan transfer bank anda sesuai
                                dengan
                                nomor
                                pendaftaran yaitu : 19656. Setelah Melakukan Pembayaran Upload Bukti Transaksi (Slip Bank /
                                Struk
                                ATM)
                                ke Akun PMB dan melakukan Konfirmasi via WA/SMS ke Nomor 082155964080, konfirmasi pembayaran
                                paling
                                lama
                                dilakukan 2 x 24 jam.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card bg-success">
                                        <div class="card-header border-0">
                                            <i class="fas fa-money-check"></i>
                                            DATA BANK
                                        </div>
                                        <!-- /.card-header -->
                                        <div style="color: white" class="card-body pt-2">
                                            <!--The calendar -->
                                            <p>Lakukan pembayaran registrasi PMB pada</p>
                                            <p>BANK KALBAR</p>
                                            <p>CABANG SINTANG</p>
                                            <p>REKENING :4010006517</p>
                                            <p>ATAS NAMA: PRKMPULN BDN PEND KARYA BANGSA</p>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-primary">
                                        <div class="card-header border-0">
                                            <i class="fas fa-file-upload"></i>
                                            Upload Slip Pembayaran
                                        </div>
                                        <!-- /.card-header -->
                                        <div style="color: white" class="card-body pt-2">
                                            <!--The calendar -->
                                            <form action="{{ url('uploadBukti') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <label for="">Format file : .jpg, besar file maksimal 5MB</label>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input name="foto" type="file" class="custom-file-input"
                                                            id="inputGroupFile02" value="{{ old('foto') }}">
                                                        <label class="custom-file-label" for="inputGroupFile02">Pilih
                                                            file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        {{-- <span class="input-group-text" id="">Upload</span> --}}
                                                        <button type="submit"
                                                            class="input-group-text btn-success">Upload</button>
                                                    </div>
                                                </div>
                                                @error('foto')
                                                    <div class="text-danger ml-3 mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                {{-- <button type="submit" class="btn btn-success btn-md mt-4 float-right">Upload
                                                Sekarang</button> --}}
                                            </form>
                                            @if ($cekbukti == true)
                                                <img src="{{ asset('assets/img/bukti') . '/' . $cekbukti->pembayaran_upload }}"
                                                    alt="Bukti Bayar" style="max-width: 300px;"><br>
                                                <a href="{{ asset('assets/img/bukti') . '/' . $cekbukti->pembayaran_upload }}"
                                                    target="_blank" class="btn btn-success btn-md mt-2">Lihat Bukti</a>
                                            @endif
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        @elseif($data->valid_bayar == 2)
                            <h5>Silahkan untuk melanjutkan dalam pengisian data lengkap. Klik link dibawah untuk melanjutkan
                                ke
                                tahap berikutnya.</h5>
                        @else
                            <h5>Pembayaran tidak cocok direkening koran STKIP Persada Khatulistiwa.</h5>
                        @endif
                    @elseif ($data->metode_bayar == 1)
                        @if ($data->valid_bayar == null)
                            <h5>Silahkan menunggu validasi pembayaran oleh panitia PMB</h5>
                        @elseif($data->valid_bayar == 2)
                            <h5>Silahkan untuk melanjutkan dalam pengisian data lengkap. Klik link dibawah untuk melanjutkan
                                ke
                                tahap berikutnya.</h5>
                        @else
                            <h5>Pembayaran tidak cocok direkening koran STKIP Persada Khatulistiwa.</h5>
                        @endif
                        {{-- @elseif() --}}
                    @endif
                @elseif($cekputus->status_penerimaan == 2)
                    <p>Mohon Maaf Anda Dinyatakan Tidak Lulus</p>
                @else
                    <p>Selamat Anda Sudah Dinyatakan Lulus</p>
                @endif
            </div>
        </div>
        @if ($data->valid_bayar == 2 && $cekjalur->jalur == 'test')
            <a href="{{ url('infoTes') }}" class="btn btn-info btn-md">Lihat Informasi Tes Online</a>
            <a href="{{ url('calon') }}" class="btn btn-primary btn-md">Lanjutkan Pengisian Data</a>
        @elseif($data->valid_bayar == 2 && $cekjalur->jalur == 'prestasi')
            <a href="{{ url('calon') }}" class="btn btn-primary btn-md float-right">Lanjutkan Pengisian Data</a>
        @endif
    @endif

    @php
        function rupiah($angka)
        {
            $hasil_rupiah = number_format($angka, 0, ',', '.');
            return $hasil_rupiah;
        }
    @endphp
@endsection
