<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $nama_brg = $_POST['nama_brg'];
    $hrg = $_POST['hrg'];
    $dc = $_POST['dc'];
    $ppn = $_POST['ppn'];
    $total_byr = $_POST['total_byr'];
    
    $sql = "UPDATE jualmotor SET harga='$hrg', discount='$dc',ppn='$ppn',total_bayar='$total_byr' WHERE nama_barang='$nama_brg'";
    $query =mysqli_query($connect,$sql);
    if ($query) {
    header('Location: tampiljualmotor.php');
    }else{
    header('location: editjualmotor.php?status=gagal');
    }
}
?>