@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm">
                    <h6 class="m-0 font-weight-bold text-primary">Info PMB</h6>
                </div>
                <div class="col-sm">
                    <a download href="{{ asset('assets/img/brosur.jpg') }}"
                        class="btn btn-success btn-sm float-right">Download
                        Brosur</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <img src="{{ asset('assets/img/info.png') }}" alt="" style="width:100%">
            <a href="{{ url('info') }}" class="btn btn-primary btn-sm float-right mt-4">Lihat
                Informasi
                Siswa</a>
        </div>
    </div>
@endsection
