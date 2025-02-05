<?php
include('../koneksi/koneksi.php');
?>

<div class="content-wrapper">
    <h3>TAMBAH DATA MAHASISWA</h3>
    <hr/><br/><br/>

    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <div class="form-container">
            <form enctype="multipart/form-data" method="post">
                <table width="100%" border="0">
                    <tr>
                        <td width="27%">NIM</td>
                        <td width="3%">:</td>
                        <td width="70%"><input type="text" name="nim" size="30" placeholder="NIM" required /></td>
                    </tr>
                    <tr>
                        <td>NAMA</td>
                        <td>:</td>
                        <td><input type="text" name="nama" size="30" placeholder="NAMA" required /></td>
                    </tr>
                    <tr>
                        <td>JENIS KELAMIN</td>
                        <td>:</td>
                        <td>
                            <label>
                                <input type="radio" name="jk" value="Laki-Laki" required /> Laki-Laki
                            </label>
                            <label>
                                <input type="radio" name="jk" value="Perempuan" /> Perempuan
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>JURUSAN</td>
                        <td>:</td>
                        <td>
                            <select name="jurusan" required>
                                <option value="">--PILIH--</option>
                                <option value="Sistem Informasi">SISTEM INFORMASI</option>
                                <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
                                <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td>:</td>
                        <td><input type="password" name="password" size="30" placeholder="PASSWORD" required /></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="submit" name="submit">TAMBAH</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php
    } else {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $jk = $_POST["jk"];
        $jurusan = $_POST["jurusan"];
        $password = md5($_POST["password"]);

        
        $insertMhs = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jk', '$jurusan', '$password')";
        $queryMhs = mysqli_query($koneksi, $insertMhs);

        if ($queryMhs) {
            echo "<script>alert('Data Berhasil Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
        }
    }
    ?>

    <a href="./?adm=mahasiswa">&raquo; KEMBALI</a>
</div>

<!-- Style CSS -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: #333;
    }
    .content-wrapper {
        background: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
    }
    h3 {
        text-align: center;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        color: #2c3e50;
    }
    hr {
        border: 1px solid #f0f0f0;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
    }
    td {
        padding: 8px 12px;
        vertical-align: top;
    }
    input[type="text"], input[type="password"], select {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }
    input[type="text"]:focus, input[type="password"]:focus, select:focus {
        border-color: #3498db;
        outline: none;
    }
    button[type="submit"] {
        width: 100%;
        padding: 14px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button[type="submit"]:hover {
        background-color: #2980b9;
    }
    a {
        display: inline-block;
        margin-top: 20px;
        text-align: center;
        font-size: 16px;
        color: #3498db;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
