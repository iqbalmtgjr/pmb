
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PMB Persada</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{url('info')}}">
            <i class="fas fa-fw fa-chart-area">1</i>
            <span>Informasi Siswa</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('pembayaran')}}">
            <i class="fas fa-fw fa-chart-area">1</i>
            <span>Informasi Pembayaran</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Isi Form
    </div>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i><strong>1</strong></i>
            <span>Form Calon Mahasiswa</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i><strong>2</strong></i>
            <span>Form Pendidikan Terakhir</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i><strong>3</strong></i>
            <span>Upload Nilai Semester</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i><strong>4</strong></i>
            <span>Program Studi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i><strong>5</strong></i>
            <span>Form Orang Tua</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i><strong>6</strong></i>
            <span>Form Upload Berkas</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>