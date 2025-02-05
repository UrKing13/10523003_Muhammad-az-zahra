<?php
include "../koneksi/koneksi.php";

if (isset($_GET['nim']) && isset($_GET['nip'])) {
    $nim = $_GET['nim'];
    $nip = $_GET['nip'];

    $queryHapus = "DELETE FROM nilai WHERE nim = '$nim' AND nip = '$nip'";

    if (mysqli_query($koneksi, $queryHapus)) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'index.php'; // Kembali ke halaman index
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location.href = './?adm=mahasiswa'; // Kembali ke halaman mahasiswa
              </script>"; 
    }
} else {
    echo "<script>
            alert('NIM atau NIP tidak diterima');
            window.location.href = './?adm=mahasiswa'; // Kembali ke halaman mahasiswa
          </script>";
}
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .alert-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        text-align: center;
        width: 300px;
        z-index: 1000;
    }

    .alert-container h3 {
        margin: 0;
        color: #333;
    }

    .alert-container p {
        margin: 20px 0;
        font-size: 16px;
        color: #555;
    }

    .alert-btn {
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .alert-btn:hover {
        background-color: #2980b9;
    }

    .alert-btn.cancel {
        background-color: #e74c3c;
    }

    .alert-btn.cancel:hover {
        background-color: #c0392b;
    }
</style>

<div class="alert-container">
    <h3>Konfirmasi Penghapusan</h3>
    <p>Apakah Anda yakin ingin menghapus data ini?</p>
    <a href="nilaiHapus.php?nim=<?php echo $nim; ?>&nip=<?php echo $nip; ?>">
        <button class="alert-btn">Ya, Hapus</button>
    </a>
    <a href="./?adm=mahasiswa">
        <button class="alert-btn cancel">Batal</button>
    </a>
</div>
