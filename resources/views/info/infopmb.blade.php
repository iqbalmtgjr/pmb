@extends('layouts.master')
@push('header')
    <style>
        .nav-link {
            cursor: pointer;
        }

        .tab-content {
            display: none;
        }

        .tab-content:target {
            display: block;
        }

        .nav-link:target {
            font-weight: bold;
            color: #007bff;
        }
    </style>
@endpush
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informasi Pendaftaran dan Informasi Pembayaran PMB</h1>
        <a download href="{{ asset('assets/img/brosur.jpg') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Download
            Brosur</a>
    </div>
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pendaftaran PMB</h6>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header text-white text-center">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#tabprestasi">Jalur Prestasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabtes">Jalur Tes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabreg2">Jalur Reguler 2</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="" id="before">
                        <h3 class="card-title text-center">Pilih Jalur diatas dulu!</h3>
                    </div>
                    <div class="tab-content" id="tabprestasi">
                        <h3 class="card-title text-center">Jalur Prestasi</h3>
                        <p class="card-text text-muted">This is the content for Tab 1.</p>
                    </div>
                    <div class="tab-content" id="tabtes">
                        <h3 class="card-title text-center">Jalur Tes</h3>
                        <p class="card-text text-muted">This is the content for Tab 2.</p>
                    </div>
                    <div class="tab-content" id="tabreg2">
                        <h3 class="card-title text-center">Jalur Reguler 2</h3>
                        <p class="card-text text-muted">This is the content for Tab 3.</p>
                    </div>
                    {{-- <button id="btnTab1" class="btn btn-outline-primary btn-active">Change to Tab 1</button>
                    <button id="btnTab2" class="btn btn-outline-primary">Change to Tab 2</button>
                    <button id="btnTab3" class="btn btn-outline-primary">Change to Tab 3</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Pembayaran PMB</h6>
        </div>
        <div class="card-body">

        </div>
    </div>
    @push('footer')
        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> --}}
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
        <script>
            $(document).ready(function() {
                $("#tabprestasi").addClass("active");
                // Handle tab clicks
                $(".nav-link").on("click", function() {
                    $("#before").addClass("tab-content");
                    $(".nav-link").removeClass("active");
                    $(this).addClass("active");
                });

                // Handle button clicks to change content
                // $("#btnTab1").on("click", function() {
                //     location.href = "#tabprestasi";
                // });

                // $("#btnTab2").on("click", function() {
                //     location.href = "#tabtes";
                // });

                // $("#btnTab3").on("click", function() {
                //     location.href = "#tabreg2";
                // });
            });
        </script>
    @endpush
@endsection
