<?php
include('../koneksi/koneksi.php'); 

$nim = $_GET["nim"];

$delMhs = "DELETE FROM mahasiswa WHERE nim='$nim'"; 

$resultMhs = mysqli_query($koneksi, $delMhs);

if ($resultMhs) {
    echo "<script>
            setTimeout(function(){
                swal('Data Mahasiswa Berhasil Dihapus!', '', 'success');
            }, 500);
            setTimeout(function(){
                window.location = './?adm=mahasiswa';
            }, 2000);
          </script>";
} else {
    echo "<script>
            setTimeout(function(){
                swal('Data Mahasiswa Gagal Dihapus', '', 'error');
            }, 500);
            setTimeout(function(){
                window.location = './?adm=mahasiswa';
            }, 2000);
          </script>";
}
?>
