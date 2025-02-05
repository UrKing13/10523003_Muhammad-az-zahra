<?php
include "../koneksi/koneksi.php";

$queryMhs = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);
?>

<h3>DATA MAHASISWA</h3>
<br/><br/>
<a href="mahasiswaAdd.php"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA MAHASISWA"/></a>

<!-- TABEL MASTER MAHASISWA -->
<table class="table-mahasiswa">
    <thead>
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>JURUSAN</th>
            <th>PASSWORD</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
<?php
if ($countMhs > 0) {
    while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
        echo "<tr class='add'>";
        echo "<td class='value'>" . $dataMhs[0] . "</td>";
        echo "<td class='value'>" . $dataMhs[1] . "</td>";
        echo "<td class='value'>" . $dataMhs[2] . "</td>";
        echo "<td class='value'>" . $dataMhs[3] . "</td>";
        echo "<td class='value'>" . $dataMhs[4] . "</td>";
        echo "<td class='value'>
                <div class='aksi-buttons'>
                    <a href='mahasiswaEdit.php?nim=" . $dataMhs[0] . "' class='btn-edit'>Edit</a> 
                    <a href='mahasiswaDelete.php?nim=" . $dataMhs[0] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                </div>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='6' align='center' height='20'>";
    echo "<div>Belum ada Data Mahasiswa</div>";
    echo "</td>";
    echo "</tr>";
}
echo "</tbody></table>";
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h3 {
        color: #333;
        font-size: 24px;
        text-align: center;
    }

    .buttonadm {
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        display: block;
        margin: 0 auto;
    }

    .buttonadm:hover {
        background-color: #2980b9;
    }

    .table-mahasiswa {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .table-mahasiswa th, .table-mahasiswa td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .table-mahasiswa th {
        background-color: #3498db;
        color: white;
    }

    .table-mahasiswa tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table-mahasiswa tr:hover {
        background-color: #e0e0e0;
    }

    .value {
        font-size: 16px;
    }

    .aksi-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-edit, .btn-delete {
        padding: 6px 12px;
        font-size: 14px;
        text-decoration: none;
        color: white;
        border-radius: 4px;
        transition: all 0.3s ease;
        display: inline-block;
        text-align: center;
    }

    .btn-edit {
        background-color: #27ae60;
    }

    .btn-delete {
        background-color: #e74c3c;
    }

    .btn-edit:hover {
        background-color: #2ecc71;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }

    .btn-edit:active, .btn-delete:active {
        transform: scale(0.95);
    }
</style>
