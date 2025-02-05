<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
?>

<h3>Data Dosen</h3>
<hr/>
<a href="dosenAdd.php"><button class="buttonadm">Tambah Data Dosen</button></a>
<br><br>

<table class="table">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Kode Matkul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($dataDosen = mysqli_fetch_assoc($resultDosen)) {
        ?>
        <tr>
            <td><?php echo $dataDosen['nip']; ?></td>
            <td><?php echo $dataDosen['nama']; ?></td>
            <td><?php echo $dataDosen['kode_mtkul']; ?></td>
            <td>
                <a href="dosenEdit.php?nip=<?php echo $dataDosen['nip']; ?>" class="btn-edit">Edit</a> |
                <a href="dosenHapus.php?nip=<?php echo $dataDosen['nip']; ?>" class="btn-delete">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

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

    .buttonadm {
        background-color: #3498db;
        color: white;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .buttonadm:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table th, table td {
        padding: 12px 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #3498db;
        color: white;
        font-size: 16px;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .btn-edit, .btn-delete {
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 3px;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .btn-edit {
        background-color: #2ecc71;
        color: white;
    }

    .btn-edit:hover {
        background-color: #27ae60;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }

    .table {
        width: 80%;
        margin: 20px auto;
    }

    hr {
        border: 1px solid #ddd;
    }
</style>
