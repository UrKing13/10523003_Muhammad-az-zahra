<?php
include "../koneksi/koneksi.php";

$queryNilai = "SELECT 
    m.nim, 
    m.nama, 
    n.nl_tugas, 
    n.nl_uts, 
    n.nl_uas,
    (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas) AS nilai_akhir,
    d.nip, 
    d.nama AS nama_dosen
FROM nilai n
LEFT JOIN mahasiswa m ON n.nim = m.nim
LEFT JOIN dosen d ON n.nip = d.nip";

$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>

<h3><b>DATA NILAI</b></h3>
<hr/><br />
<a href="nilaiAdd.php"><button class="buttonadm"><b>TAMBAH DATA NILAI</b></button></a>
<br><br>

<table class="data-table">
    <thead>
        <tr>
            <th><b>NIM</b></th>
            <th><b>NAMA</b></th>
            <th><b>TUGAS</b></th>
            <th><b>UTS</b></th>
            <th><b>UAS</b></th>
            <th><b>NILAI AKHIR</b></th>
            <th><b>DOSEN</b></th>
            <th><b>AKSI</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($countNilai > 0) {
            while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM)) {
                ?>
                <tr>
                    <td><b><?php echo $dataNilai[0]; ?></b></td>
                    <td><b><?php echo $dataNilai[1]; ?></b></td>
                    <td><b><?php echo $dataNilai[2]; ?></b></td>
                    <td><b><?php echo $dataNilai[3]; ?></b></td>
                    <td><b><?php echo $dataNilai[4]; ?></b></td>
                    <td><b><?php echo number_format($dataNilai[5], 2); ?></b></td>
                    <td><b><?php echo $dataNilai[7]; ?></b></td>
                    <td>
                        <a href="nilaiEdit.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>" class="btn-edit"><b>Edit</b></a> |
                        <a href="nilaiHapus.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>" class="btn-delete"><b>Hapus</b></a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "
            <tr>
                <td colspan='8' align='center' height='20'>
                    <div><b>Belum ada Data Nilai</b></div>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    h3 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .buttonadm {
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .buttonadm:hover {
        background-color: #2980b9;
    }

    .data-table {
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .data-table th,
    .data-table td {
        padding: 12px 15px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .data-table th {
        background-color: #3498db;
        color: white;
    }

    .data-table tr:nth-child(even) {
        background-color: #f4f4f4;
    }

    .data-table tr:hover {
        background-color: #ecf0f1;
    }

    .btn-edit, .btn-delete {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
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

    td .btn-edit, td .btn-delete {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .data-table {
            width: 100%;
        }

        .data-table th, .data-table td {
            padding: 8px;
        }

        .buttonadm {
            width: 100%;
            margin-bottom: 20px;
        }
    }
</style>
