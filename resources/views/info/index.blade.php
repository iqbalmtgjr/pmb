@extends('layouts.master')
@section('content')
    @if ($cekputus == true && $cekputus->status_penerimaan == 1)
        <div class="text-center alert alert-success" role="alert">
            Selamat <br> <strong> Anda dinyatakan lulus di STKIP Persada Khatulistiwa Sintang! </strong>
        </div>
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Info Siswa</h6>
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
                        <tr>
                            <td>1.</td>
                            <td>Biaya Registrasi Mahasiswa Baru</td>
                            <td>1.510.000</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Biaya Pengembangan Kampus</td>
                            <td>3.500.000</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>SPP Tetap / Semester</td>
                            <td>2.280.000</td>
                        </tr>

                    </tbody>
                </table>
                <p>Pembayaran biaya Registrasi Mahasiswa Baru, Pengembangan kampus, SPP Tetap/Semester dilakukan mulai dari
                    dinyatakan lulus sampai dengan 25 April 2024</b></p>
                <div class="alert-warning p-2 text-center">
                    <h5><i class="icon fas fa-ban"></i> Perhatian!!!</h5><strong>Pembayaran hanya melalui Teller Bank
                        KALBAR</strong>
                </div>
                <p>Silahkan Melakukan Pembayaran Sebesar <b> Rp. 7.290.000</b>, melalui Teller Bank KALBAR ke Nomor Rekening
                    <b>4010006517 (BANK KALBAR) </b> Atas Nama PRKMPULN BDN PEND KARYA BANGSA. <i>Masukan Berita pada
                        keterangan transfer bank anda sesuai dengan nomor pendaftaran yaitu :
                    </i><b>{{ auth()->user()->ref }}</b>. Setelah Melakukan Pembayaran Upload Bukti Transaksi (Slip Bank /
                    Struk
                    ATM) ke dalam Akun PMB ini dan melakukan Konfirmasi via WA/SMS ke Nomor 082155964080, konfirmasi
                    pembayaran paling lama dilakukan 2 x 24 jam setelah pembayaran.
                </p>
                {{-- <h2 class="text-danger">Mahasiswa Baru wajib mengikuti kegiatan PKKMB pada tanggal 28 Agustus - 2 September
                    2023</h2> --}}
                <p><a href="#" class="btn btn-primary">Konfirmasi Pembayaran</a></p>
            </div><br>
            <div class="form-group row">
                <a href="#" style="margin-left: 7px;">Lanjutkan untuk melengkapi data
                    anda</a>
            </div>
        </div>
    @else
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Info Siswa</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
                    <div class="col-sm-8">
                        <span class="form-control">{{ $data->ref }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Jalur Pendaftaran</label>
                    <div class="col-sm-8">
                        @if ($data->jalur == 'test')
                            <span class="form-control">Tes</span>
                        @elseif($data->jalur == 'prestasi')
                            <span class="form-control">Prestasi</span>
                        @else
                            <span class="form-control">Reguler 2</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <span class="form-control">{{ $data->nama_siswa }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">NISN</label>
                    <div class="col-sm-8">
                        <span class="form-control">{{ $data->nis_siswa }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi Pilihan I</label>
                    <div class="col-sm-8">
                        @if ($data->pilihan_satu == 1)
                            <span class="form-control">Pendidikan Bahasa dan Sastra Indonesia</span>
                        @elseif ($data->pilihan_satu == 2)
                            <span class="form-control">Pendidikan Matematika</span>
                        @elseif ($data->pilihan_satu == 3)
                            <span class="form-control">Pendidikan Ekonomi</span>
                        @elseif ($data->pilihan_satu == 4)
                            <span class="form-control">Pendidikan Pancasila dan Kewarganegaraan</span>
                        @elseif ($data->pilihan_satu == 5)
                            <span class="form-control">Pendidikan Komputer</span>
                        @elseif ($data->pilihan_satu == 6)
                            <span class="form-control">Pendidikan Biologi</span>
                        @elseif ($data->pilihan_satu == 7)
                            <span class="form-control">Pendidikan Anak Usia Dini</span>
                        @elseif ($data->pilihan_satu == 8)
                            <span class="form-control">Pendidikan Bahasa Inggris</span>
                        @else
                            <span class="form-control">Pendidikan Guru Sekolah Dasar</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi Pilihan II</label>
                    <div class="col-sm-8">
                        @if ($data->pilihan_dua == 1)
                            <span class="form-control">Pendidikan Bahasa dan Sastra Indonesia</span>
                        @elseif ($data->pilihan_dua == 2)
                            <span class="form-control">Pendidikan Matematika</span>
                        @elseif ($data->pilihan_dua == 3)
                            <span class="form-control">Pendidikan Ekonomi</span>
                        @elseif ($data->pilihan_dua == 4)
                            <span class="form-control">Pendidikan Pancasila dan Kewarganegaraan</span>
                        @elseif ($data->pilihan_dua == 5)
                            <span class="form-control">Pendidikan Komputer</span>
                        @elseif ($data->pilihan_dua == 6)
                            <span class="form-control">Pendidikan Biologi</span>
                        @elseif ($data->pilihan_dua == 7)
                            <span class="form-control">Pendidikan Anak Usia Dini</span>
                        @elseif ($data->pilihan_dua == 8)
                            <span class="form-control">Pendidikan Bahasa Inggris</span>
                        @else
                            <span class="form-control">Pendidikan Guru Sekolah Dasar</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <a class="btn btn-primary btn-md float-right" href="{{ url('pembayaran') }}" style="margin-left: 7px;">Lanjutkan
            untuk
            info pembayaran anda</a>
    @endif
@endsection
