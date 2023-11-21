@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Upload Berkas</h6>
        </div>
        <div class="card-body">
            <p>Upload semua berkas sesuai formulir dibawah ini.</p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama File</th>
                            <th>File</th>
                            <th style="width: 40px">Status</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    @if ($jalur->jalur == 'reguler2')
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Foto 4 x 6</td>
                                <td>
                                    @if (!empty($gam->foto_upload))
                                        <img style="width: 100px; height: 100px"
                                            src="{{ asset('assets/berkas/foto') . '/' . $gam->foto_upload }}"
                                            alt="foto">
                                    @else
                                        <span class="text-danger">Belum ada file!</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($gam->foto_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->foto_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#foto"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Ijazah</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->ijasah_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->ijasah_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#ijazah"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Surat Keterangan Catatan Kepolisian (SKCK)</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->skck_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->skck_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#skck"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>

                            <tr>
                                <td>4.</td>
                                <td>Kartu Keluarga</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->kk_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->kk_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#kk"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Akta Lahir</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->akta_lahir_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->akta_lahir_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#akta"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Kartu Tanda Penduduk (KTP)</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->ktp_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->ktp_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#ktp"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>

                            <tr>
                                <td>7.</td>
                                <td>Bukti Pembayaran</td>
                                <td class="text-center">
                                    @if (!empty($gam->pembayaran_upload))
                                        <img style="width: 100px; height: 100px"
                                            src="{{ asset('assets/img/bukti') . '/' . $gam->pembayaran_upload }}"
                                            alt="foto">
                                    @else
                                        <span class="text-danger">Belum ada file!</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($gam->pembayaran_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->pembayaran_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#bukti"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>


                        </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Foto 4 x 6</td>
                                <td class="text-center">
                                    @if (!empty($gam->foto_upload))
                                        <img style="width: 100px; height: 100px"
                                            src="{{ asset('assets/berkas/foto') . '/' . $gam->foto_upload }}"
                                            alt="foto">
                                    @else
                                        <span class="text-danger">Belum ada file!</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($gam->foto_upload))
                                        <a href="{{ asset('assets/berkas/foto') . '/' . $gam->foto_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#foto"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Ijazah</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->ijasah_upload))
                                        <a href="{{ asset('assets/berkas/pdf') . '/' . $gam->ijasah_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#ijazah"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Surat Keterangan Kelakuan Baik (SKKB)</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->skkb_upload))
                                        <a href="{{ asset('assets/berkas/pdf') . '/' . $gam->skkb_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#skkb"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Kartu Keluarga</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->kk_upload))
                                        <a href="{{ asset('assets/berkas/pdf') . '/' . $gam->kk_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#kk"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Akta Lahir</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->akta_lahir_upload))
                                        <a href="{{ asset('assets/berkas/pdf') . '/' . $gam->akta_lahir_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#akta"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Kartu Tanda Penduduk (KTP)</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->ktp_upload))
                                        <a href="{{ asset('assets/berkas/pdf') . '/' . $gam->ktp_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#ktp"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Surat Keterangan Lulus</td>
                                <td><span class="text-danger">Belum ada file!</span></td>
                                <td>
                                    @if (!empty($gam->ket_lulus_upload))
                                        <a href="{{ asset('assets/berkas/pdf') . '/' . $gam->ket_lulus_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#skl"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>

                            <tr>
                                <td>9.</td>
                                <td>Bukti Pembayaran</td>
                                <td class="text-center">
                                    @if (!empty($gam->pembayaran_upload))
                                        <img style="width: 100px; height: 100px"
                                            src="{{ asset('assets/img/bukti') . '/' . $gam->pembayaran_upload }}"
                                            alt="foto">
                                    @else
                                        <span class="text-danger">Belum ada file!</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($gam->pembayaran_upload))
                                        <a href="{{ asset('assets/berkas/pdf') . '/' . $gam->pembayaran_upload }}"
                                            target="_blank"><span class="badge bg-success text-white">Diupload</span></a>
                                    @else
                                        <span class="badge bg-danger text-white">Belum Diupload</span>
                                    @endif
                                </td>
                                <td>
                                    <center><button type="button" data-toggle="modal" data-target="#bukti"
                                            class="btn btn-info btn-sm"><i class="fas fa-file-upload"></i>
                                            Upload
                                            Berkas</button></center>
                                </td>
                            </tr>


                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
    @include('upload.foto')
    @include('upload.akta')
    @include('upload.bukti')
    @include('upload.ijazah')
    @include('upload.kk')
    @include('upload.ktp')
    @include('upload.skck')
    @include('upload.skkb')
    @include('upload.skl')
@endsection
