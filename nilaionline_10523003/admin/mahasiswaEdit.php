<?php
include ('../koneksi/koneksi.php');

$getNim = $_GET['nim'];
$editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);
?>

<h3>UBAH DATA MAHASISWA</h3>
<br /><br />
<?php
if (!isset($_POST['submit'])) {
?>
<form enctype="multipart/form-data" method="post" class="form-ubah-mahasiswa">
    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" value="<?php echo $dataMhs['nim'] ?>" readonly="readonly"/>
    </div>
    
    <div class="form-group">
        <label for="nama">NAMA</label>
        <input name="nama" type="text" id="nama" value="<?php echo $dataMhs['nama'] ?>" />
    </div>

    <div class="form-group">
        <label>JENIS KELAMIN</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="jk" value="Laki-Laki" <?php echo ($dataMhs['jk'] == 'Laki-Laki') ? 'checked' : ''; ?>> Laki-Laki
            </label>
            <label>
                <input type="radio" name="jk" value="Perempuan" <?php echo ($dataMhs['jk'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="jur">JURUSAN</label>
        <select name="jur" id="jur">
            <option value="<?php echo $dataMhs['jur']; ?>" selected><?php echo $dataMhs['jur']; ?></option>
            <option value="">--PILIH--</option>
            <option value="Sistem Informasi">SISTEM INFORMASI</option>
            <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
            <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">PASSWORD</label>
        <input type="password" name="password" id="password" value="<?php echo $dataMhs['password'] ?>" />
    </div>

    <div class="form-group">
        <button type="submit" name="submit" class="btn-submit">UBAH</button>
    </div>
</form>
<?php
}
else {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];
    $password = md5($_POST['password']);

    $updateMhs = "UPDATE mahasiswa SET nama='$nama', jk='$jk', jur='$jur', password='$password' WHERE nim='$nim'";
    $queryMhs = mysqli_query($koneksi, $updateMhs);

    if ($queryMhs) {
        echo "<script>alert('Data Berhasil Diubah !');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah !');</script>";
        echo "<script type='text/javascript'>window.location='mahasiswaView.php';</script>";
    }
}
?>
<div class="back-button">
    <a href="./?adm=mahasiswa" class="btn-back">KEMBALI</a>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    h3 {
        font-size: 24px;
        text-align: center;
        color: #333;
    }

    .form-ubah-mahasiswa {
        width: 60%;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-size: 16px;
        margin-bottom: 8px;
        color: #555;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f8f8f8;
    }

    .form-group input[type="radio"] {
        width: auto;
        margin-right: 10px;
    }

    .radio-group label {
        margin-right: 15px;
    }

    .form-group button {
        width: 100%;
        padding: 12px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-group button:hover {
        background-color: #2980b9;
    }

    .back-button {
        text-align: center;
        margin-top: 20px;
    }

    .btn-back {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #95a5a6;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #7f8c8d;
    }
</style>
