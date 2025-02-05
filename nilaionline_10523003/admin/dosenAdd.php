<?php
include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kode_mtkul = mysqli_real_escape_string($koneksi, $_POST['kode_mtkul']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

    $queryAdd = "INSERT INTO dosen (nip, nama, kode_mtkul, password) 
                 VALUES ('$nip', '$nama', '$kode_mtkul', '$password')";
    
    if (mysqli_query($koneksi, $queryAdd)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='./?adm=dosenView';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<h3>Tambah Data Dosen</h3>
<hr/>
<form method="post" action="dosenAdd.php">
    <div class="form-group">
        <label for="nip">NIP:</label>
        <input type="text" name="nip" required class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="kode_mtkul">Kode Mata Kuliah:</label>
        <input type="text" name="kode_mtkul" required class="form-control" />
    </div>
    
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required class="form-control" />
    </div>

    <div class="form-group">
        <input type="submit" value="Tambah" class="btn btn-primary" />
        <a href="./?adm=dosenView"><button type="button" class="btn btn-secondary">Kembali</button></a>
    </div>
</form>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    h3 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-size: 16px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #3498db;
        outline: none;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    .btn-secondary {
        background-color: #7f8c8d;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #95a5a6;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    hr {
        border: 1px solid #ddd;
    }
</style>
