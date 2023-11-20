@extends('layouts.master')
@section('content')
    {{-- <h1 class="h3 mb-4 text-gray-800">Formulir Pendidikan</h1> --}}
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Pendidikan Tertinggi Sebelumnya</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('postPendidikan') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="jenis_sekolah" class="col-sm-2 col-form-label">Asal Sekolah<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <select id="jenis_sekolah" name="jenis_sekolah"
                            class="form-control  @error('jenis_sekolah') is-invalid @enderror">
                            <option value="">-- Pilih Asal Sekolah --</option>
                            <option value="sma"
                                @if ($data == true && $data->jenis_sekolah != null) {{ $data->jenis_sekolah == 'sma' ? 'selected' : '' }} @else {{ old('jenis_sekolah') == 'sma' ? 'selected' : '' }} @endif>
                                SMA</option>
                            <option value="smk"
                                @if ($data == true && $data->jenis_sekolah != null) {{ $data->jenis_sekolah == 'smk' ? 'selected' : '' }} @else {{ old('jenis_sekolah') == 'smk' ? 'selected' : '' }} @endif>
                                SMA
                            </option>
                            <option value="ma"
                                @if ($data == true && $data->jenis_sekolah != null) {{ $data->jenis_sekolah == 'ma' ? 'selected' : '' }} @else {{ old('jenis_sekolah') == 'ma' ? 'selected' : '' }} @endif>
                                Madrasah Aliyah
                            </option>
                            <option value="mak"
                                @if ($data == true && $data->jenis_sekolah != null) {{ $data->jenis_sekolah == 'mak' ? 'selected' : '' }} @else {{ old('jenis_sekolah') == 'mak' ? 'selected' : '' }} @endif>
                                Madrasah Aliyah Kejuruan
                            </option>
                        </select>
                        @error('jenis_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namasekolah" class="col-sm-2 col-form-label">Nama Sekolah<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('nama_sekolah') is-invalid @enderror"
                            id="namasekolah" name="nama_sekolah" placeholder="Nama Sekolah"
                            value="{{ $data == true && $data->nama_sekolah != null ? $data->nama_sekolah : old('nama_sekolah') }}">
                        <p class="text-warning">Contoh format penulisan nama sekolah: SMA NEGERI 1 SINTANG</p>
                        @error('nama_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('alamat_sekolah') is-invalid @enderror"
                            id="alamat" name="alamat_sekolah" placeholder="Alamat Sekolah"
                            value="{{ $data == true && $data->alamat_sekolah != null ? $data->alamat_sekolah : old('alamat_sekolah') }}">
                        @error('alamat_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Jurusan<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('jurusan_sekolah') is-invalid @enderror"
                            id="alamat" name="jurusan_sekolah" placeholder="Jurusan Sekolah"
                            value="{{ $data == true && $data->jurusan_sekolah != null ? $data->jurusan_sekolah : old('jurusan_sekolah') }}">
                        @error('jurusan_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Tahun Lulus<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control  @error('tahun_lulus_sekolah') is-invalid @enderror"
                            id="alamat" name="tahun_lulus_sekolah" placeholder="Tahun Lulus Sekolah"
                            value="{{ $data == true && $data->tahun_lulus_sekolah != null ? $data->tahun_lulus_sekolah : old('tahun_lulus_sekolah') }}">
                        @error('tahun_lulus_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Nomor IJAZAH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('ijasah_sekolah') is-invalid @enderror"
                            id="alamat" name="ijasah_sekolah" placeholder="Nomor Ijazah Sekolah"
                            value="{{ $data == true && $data->ijasah_sekolah != null ? $data->ijasah_sekolah : old('ijasah_sekolah') }}">
                        @error('ijasah_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        </div>
    </div>

    @if ($cekjalur->jalur == 'prestasi')
        <div class="card card-info mt-4">
            <div class="card-header">
                <h6 class="text-primary">Nilai Rapor</h6>
            </div>
            <div class="card-body">
                <p class="text-info">Silahkan masukkan nilai rapor per semester yang ditentukan ke form input yang sudah
                    disediakan.</p>
                <form action="{{ url('postPendidikan') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 1<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control  @error('nilai_satu') is-invalid @enderror"
                                id="namasekolah" name="nilai_satu" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_satu != null ? $data->nilai_satu : old('nilai_satu') }}">
                            @error('nilai_satu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 2<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control  @error('nilai_dua') is-invalid @enderror"
                                id="namasekolah" name="nilai_dua" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_dua != null ? $data->nilai_dua : old('nilai_dua') }}">
                            @error('nilai_dua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 3<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control  @error('nilai_tiga') is-invalid @enderror"
                                id="namasekolah" name="nilai_tiga" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_tiga != null ? $data->nilai_tiga : old('nilai_tiga') }}">
                            @error('nilai_tiga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 4<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control  @error('nilai_empat') is-invalid @enderror"
                                id="namasekolah" name="nilai_empat" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_empat != null ? $data->nilai_empat : old('nilai_empat') }}">
                            @error('nilai_empat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            </div>
        </div>
    @endif
    <button type="submit" class="btn btn-primary btn-md float-right mt-3 mb-3">Simpan dan Lanjutkan</button>
    </form>
    @push('footer')
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#jenis_sekolah').on('change', function() {
                    let id_jenis_sekolah = $('#jenis_sekolah').val();
                })
            });
        </script>
    @endpush
@endsection
