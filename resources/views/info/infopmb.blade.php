@extends('layouts.master')
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
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="tab1">Prestasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="tab2">Tes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="tab3">Reguler 2</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Untuk Melihat Informasi</h5>
                    <p class="card-text">Pilih jalur diatas</p>
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        <script>
            $(document).ready(function() {
                // Initial content
                var currentTab = 1;

                // Function to change the content
                function changeContent(judul, konten) {
                    $("#content h5").text(judul);
                    $("#content p").text(konten);
                }

                function updateActiveTab(tab) {
                    $(".nav-link").removeClass("active");
                    $("#tab" + tab).addClass("active");
                }

                // Handle tab clicks
                $("#tab1").on("click", function() {
                    currentTab = 1;
                    changeContent("Jalur Prestasi", "Ini adalah jalur prestasi");
                    updateActiveTab(currentTab);
                });

                $("#tab2").on("click", function() {
                    currentTab = 2;
                    changeContent("Jalur Tes", "Ini adalah jalur tes");
                    updateActiveTab(currentTab);
                });

                $("#tab3").on("click", function() {
                    currentTab = 3;
                    changeContent("Jalur Reguler 2", "Ini adalah jalur reguler 2");
                    updateActiveTab(currentTab);
                });

                // Handle button click to change content
                // $("#changeContent").on("click", function() {
                //     // Example: change the content based on the current tab
                //     if (currentTab === 1) {
                //         // Change content for Tab 1
                //         $("#content h5").text("Updated Content for Tab 1");
                //         $("#content p").text("This is the updated content for Tab 1.");
                //     } else if (currentTab === 2) {
                //         // Change content for Tab 2
                //         $("#content h5").text("Updated Content for Tab 2");
                //         $("#content p").text("This is the updated content for Tab 2.");
                //     } else if (currentTab === 3) {
                //         // Change content for Tab 3
                //         $("#content h5").text("Updated Content for Tab 3");
                //         $("#content p").text("This is the updated content for Tab 3.");
                //     }
                // });
            });
        </script>
    @endpush
@endsection
