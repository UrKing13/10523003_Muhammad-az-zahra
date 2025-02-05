<?php
include "../koneksi/koneksi.php";

if (isset($_GET['nim']) && isset($_GET['nip'])) {
    $nim = $_GET['nim'];
    $nip = $_GET['nip'];

    $query = "SELECT * FROM nilai WHERE nim = '$nim' AND nip = '$nip'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location='nilaiView.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('NIM atau NIP tidak diterima'); window.location='nilaiView.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nip = $_POST['nip'];
    $nl_tugas = $_POST['nl_tugas'];
    $nl_uts = $_POST['nl_uts'];
    $nl_uas = $_POST['nl_uas'];

    $queryUpdate = "UPDATE nilai SET nl_tugas = '$nl_tugas', nl_uts = '$nl_uts', nl_uas = '$nl_uas'
                    WHERE nim = '$nim' AND nip = '$nip'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href = './?adm=mahasiswa';  // Ganti dengan halaman admin yang sesuai
              </script>";
    } else {
        echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<h3><b>Edit Data Nilai</b></h3>
<hr/><br />

<form method="post" action="nilaiEdit.php?nim=<?php echo $nim; ?>&nip=<?php echo $nip; ?>" class="form-container">
    <label for="nim"><b>NIM:</b></label><br />
    <input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly class="input-field"/><br /><br />
    
    <label for="nip"><b>NIP Dosen:</b></label><br />
    <input type="text" name="nip" value="<?php echo $data['nip']; ?>" readonly class="input-field"/><br /><br />
    
    <label for="nl_tugas"><b>Nilai Tugas:</b></label><br />
    <input type="number" name="nl_tugas" step="0.01" value="<?php echo $data['nl_tugas']; ?>" required class="input-field"/><br /><br />
    
    <label for="nl_uts"><b>Nilai UTS:</b></label><br />
    <input type="number" name="nl_uts" step="0.01" value="<?php echo $data['nl_uts']; ?>" required class="input-field"/><br /><br />
    
    <label for="nl_uas"><b>Nilai UAS:</b></label><br />
    <input type="number" name="nl_uas" step="0.01" value="<?php echo $data['nl_uas']; ?>" required class="input-field"/><br /><br />
    
    <input type="submit" value="Update" class="btn-submit"/>
    <a href="./?adm=mahasiswa"><button type="button" class="btn-cancel">Batal</button></a>
</form>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h3 {
        text-align: center;
        color: #333;
        margin-top: 20px;
        font-size: 24px;
    }

    .form-container {
        width: 50%;
        margin: 20px auto;
        padding: 30px;
        background-color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        font-size: 16px;
    }

    .form-container label {
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
        color: #555;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        box-sizing: border-box;
        transition: border 0.3s ease;
    }

    .input-field:focus {
        border-color: #3498db;
        outline: none;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #2980b9;
    }

    .btn-cancel {
        width: 100%;
        padding: 12px;
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-cancel:hover {
        background-color: #c0392b;
    }

    @media (max-width: 768px) {
        .form-container {
            width: 90%;
            padding: 20px;
        }

        h3 {
            font-size: 22px;
        }
    }
</style>
