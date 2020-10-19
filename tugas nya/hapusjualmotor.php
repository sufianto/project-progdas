<?php
include 'koneksi.php';

if (isset($_GET['id'])){
    heder('Location: tampilcustomer.php');
}
$nama_brg =$_GET['nama_barang'];

$sql = "DELETE FROM jualmotor where nama_barang='$nama_brg'";
$query =mysqli_query($connect,$sql);
if ($query){
    header('Location: tampiljualmotor.php');
    }else{
        header('location: simpanjualmotor.php?status=gagal');
    }

?>