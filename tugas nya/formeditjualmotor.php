<?php
include 'koneksi.php';
    
    $nama_brg = $_GET['nama_barang'];
    $sql = "SELECT * FROM jualmotor WHERE nama_barang='$nama_brg'"; 
    $query = mysqli_query($connect, $sql);
    $cus = mysqli_fetch_assoc($query);
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
    <h3>Form Edit Customer</h3>
    <form action="editjualmotor.php" method="POST">
        <input type="hidden" name="nama_brg" value="<?php echo $cus['nama_barang']?>"/>
    <p><label>Harga             : <input type="text" name="hrg" value="<?php echo $cus['harga']?>"></label></p>
    <p><label>Discount          : <input type="text" name="dc" value="<?php echo $cus['discount']?>"></label></p>
    <p><label>PPN               : <input type="text" name="ppn" value="<?php echo $cus['ppn']?>"></label></p>
    <p><label>Total bayar       : <input type="text" name="total_byr" value="<?php echo $cus['total_bayar']?>"></label></p>
        <input type="submit" name="simpan" value="simpan"/>
    </form>
</body>
</html>
