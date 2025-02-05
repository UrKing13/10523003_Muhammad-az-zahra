<?php
include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nl_tugas = mysqli_real_escape_string($koneksi, $_POST['nl_tugas']);
    $nl_uts = mysqli_real_escape_string($koneksi, $_POST['nl_uts']);
    $nl_uas = mysqli_real_escape_string($koneksi, $_POST['nl_uas']);

    $queryInsert = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) 
                    VALUES ('$nim', '$nip', '$nl_tugas', '$nl_uts', '$nl_uas')";

    if (mysqli_query($koneksi, $queryInsert)) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = './?adm=mahasiswa';
              </script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="content-wrapper">
    <h3>Tambah Data Nilai</h3>
    <hr/><br />

    <div class="form-container">
        <form method="post" action="nilaiAdd.php">
            <label for="nim">NIM:</label><br />
            <input type="text" name="nim" required /><br /><br />

            <label for="nip">NIP Dosen:</label><br />
            <input type="text" name="nip" required /><br /><br />

            <label for="nl_tugas">Nilai Tugas:</label><br />
            <input type="number" name="nl_tugas" step="0.01" required /><br /><br />

            <label for="nl_uts">Nilai UTS:</label><br />
            <input type="number" name="nl_uts" step="0.01" required /><br /><br />

            <label for="nl_uas">Nilai UAS:</label><br />
            <input type="number" name="nl_uas" step="0.01" required /><br /><br />

            <div class="button-container">
                <input type="submit" value="Tambah" class="btn-submit" />
                <a href="./?adm=mahasiswa"><input type="button" value="Kembali" class="btn-back" /></a>
            </div>
        </form>
    </div>
</div>

<style>
    .content-wrapper {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 80%;
        margin: 20px auto;
    }

    h3 {
        color: #007bff;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"], input[type="number"] {
        padding: 8px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        width: 100%;
    }

    input[type="text"]:focus, input[type="number"]:focus {
        border-color: #007bff;
        outline: none;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
    }

    .btn-submit, .btn-back {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit {
        background-color: #28a745;
        color: white;
    }

    .btn-submit:hover {
        background-color: #218838;
    }

    .btn-back {
        background-color: #ffc107;
        color: white;
    }

    .btn-back:hover {
        background-color: #e0a800;
    }
</style>
