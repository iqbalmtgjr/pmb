@extends('layouts.master')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Info Pembayaran</h6>
  </div>
  <div class="card-body">
    {{-- Jika pembayaran lewat panitia --}}
    @if ($data->metode_bayar == null && $data->valid_bayar == null)
        <h5>Untuk melanjutkan proses pendaftaran anda harus memilih metode pembayaran registrasi PMB!!!</h5>
        <form action="{{url('postMetodeBayar')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Metode Bayar</label>
            <select name="metode_bayar" class="form-control @error('metode_bayar') is-invalid @enderror">
                <option value=" ">-- Pilih Metode Bayar --</option>
                <option value="1" @selected(old('metode_bayar') == '1')>Panitian PMB</option>
                <option value="2" @selected(old('metode_bayar') == '2')>Teller Bank Kalbar</option>
            </select>
        </div>
        <button class="btn btn-primary btn-md">Simpan</button>
        </form>
    @elseif ($data->metode_bayar == 2 && $data->valid_bayar == null)
        <p>Silahkan Melakukan Pembayaran melalui Teller Bank ke Nomor Rekening 4010006517 (BANK KALBAR) Atas Nama PRKMPULN BDN PEND KARYA BANGSA. Masukan Berita pada keterangan transfer bank anda sesuai dengan nomor pendaftaran yaitu : 19656. Setelah Melakukan Pembayaran Upload Bukti Transaksi (Slip Bank / Struk ATM) ke Akun PMB dan melakukan Konfirmasi via WA/SMS ke Nomor 082155964080, konfirmasi pembayaran paling lama dilakukan 2 x 24 jam.</p>
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
                      <form action="" method="post">
                        <input type="file" class="form-control">
                      </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    @elseif ($data->metode_bayar == 1 || $data->valid_bayar == 1)
        <h5>Silahkan Melanjutkan Pengisian Data</h5>
    @endif
  </div>
</div>
<a href="#" class="btn btn-primary btn-md float-right">Lanjutkan Pengisian Data</a>
@endsection