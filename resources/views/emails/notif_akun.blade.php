<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pendaftaran PMB 2022 STKIP Persada Khatulistiwa</title>
</head>
<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-0lax {
        text-align: left;
        vertical-align: top
    }
</style>

<body>
    <h2 style="text-align: center">SIPEMA</h2>

    <h3>Terima kasih telah mendaftar sebagai mahasiswa baru di STKIP Persada Khatulistiwa Sintang.</h3>
    <p>
        Dibawah ini merupakan informasi pendaftaran sekaligus password yang digunakan untuk login ke website Sistem
        Informasi Pendaftaran Mahasiswa (SIPEMA).
    </p>
    <table class="tg">
        <thead>
            <tr>
                <td class="tg-0lax">Nama</td>
                <td class="tg-0lax">{{ $akun->nama_siswa }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-0lax">Jalur</td>
                <td class="tg-0lax">{{ $akun->jalur }}</td>
            </tr>
            <tr>
                <td class="tg-0lax">Gelombang</td>
                <td class="tg-0lax">Gelombang 1</td>
            </tr>
            <tr>
                <td class="tg-0lax">Email</td>
                <td class="tg-0lax">{{ $akun->email_akun_siswa }}</td>
            </tr>
            <tr>
                <td class="tg-0lax">Password</td>
                <td class="tg-0lax">{{ $akun->kuncigudang }}</td>
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
