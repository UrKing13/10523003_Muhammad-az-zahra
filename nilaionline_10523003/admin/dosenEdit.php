<?php
include "../koneksi/koneksi.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    $query = "SELECT * FROM dosen WHERE nip = '$nip'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    if (!$data) {
        echo "<script>alert('Data dosen tidak ditemukan'); window.location='dosenView.php';</script>";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kode_mtkul = mysqli_real_escape_string($koneksi, $_POST['kode_mtkul']);
    $password = $_POST['password'] ? md5($_POST['password']) : $data['password'];

    $queryUpdate = "UPDATE dosen SET nama = '$nama', kode_mtkul = '$kode_mtkul', password = '$password' WHERE nip = '$nip'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Data berhasil diubah'); window.location='./?adm=dosenView';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<h3>Edit Data Dosen</h3>
<hr/>
<form method="post" action="dosenEdit.php?nip=<?php echo $nip; ?>" class="form-container">
    <label for="nip">NIP:</label>
    <input type="text" name="nip" value="<?php echo $data['nip']; ?>" readonly class="input-field" />
    
    <label for="nama">Nama:</label>
    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required class="input-field" />
    
    <label for="kode_mtkul">Kode Mata Kuliah:</label>
    <input type="text" name="kode_mtkul" value="<?php echo $data['kode_mtkul']; ?>" required class="input-field" />
    
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="input-field" />
    
    <div class="button-group">
        <input type="submit" value="Update" class="submit-btn" />
        <a href="./?adm=dosenView"><button type="button" class="cancel-btn">Kembali</button></a>
    </div>
</form>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f9fc;
        margin: 0;
        padding: 0;
    }

    h3 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    label {
        font-size: 14px;
        color: #555;
        margin-bottom: 8px;
        display: block;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        background-color: #f9f9f9;
    }

    .input-field:focus {
        border-color: #3498db;
        outline: none;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .submit-btn, .cancel-btn {
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn {
        background-color: #3498db;
        color: white;
    }

    .submit-btn:hover {
        background-color: #2980b9;
    }

    .cancel-btn {
        background-color: #e74c3c;
        color: white;
    }

    .cancel-btn:hover {
        background-color: #c0392b;
    }

    hr {
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }
</style>
