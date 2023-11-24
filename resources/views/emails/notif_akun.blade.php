<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pendaftaran PMB 2024 STKIP Persada Khatulistiwa</title>
</head>

<body>
    <h2>SIPEMA</h2>

    <h3>Terima kasih telah mendaftar sebagai mahasiswa baru di STKIP Persada Khatulistiwa Sintang.</h3>
    <p>
        Dibawah ini merupakan informasi pendaftaran sekaligus password yang digunakan untuk login ke website Sistem
        Informasi Pendaftaran Mahasiswa (SIPEMA).
    </p>
    <table>
        <thead>
            <tr>
                <td>Nama</td>
                <td>: {{ $akun->nama_siswa }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jalur</td>
                <td>: {{ $akun->jalur }}</td>
            </tr>
            <tr>
                <td>Gelombang</td>
                <td>: {{ $akun->gelombang }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $akun->email_akun_siswa }}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>: {{ $akun->kuncigudang }}</td>
            </tr>
        </tbody>
    </table>
    <p>
        Untuk Login Silahkan <a href="https://daftar.persadakhatulistiwa.ac.id/login/index.html">Klik disini</a> untuk
        proses lebih lanjut. <br><br>

        Terima Kasih, <br>
        Panitia PMB
    </p>
</body>

</html>
