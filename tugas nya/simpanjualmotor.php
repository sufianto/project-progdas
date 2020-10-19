<?php
    include 'koneksi.php';
    if (isset($_POST['simpan'])) {
        $nama_brg = $_POST['nama_brg'];
        $hrg = $_POST['hrg'];
        $dc = $_POST['dc'];
        $ppn = $_POST['ppn'];
        $total_byr = $_POST['total_byr'];
        $sql = "INSERT INTO jualmotor (nama_barang,harga,discount,ppn,total_bayar) VALUES ('$nama_brg','$hrg','$dc','$ppn','$total_byr')";
        $query = mysqli_query($connect, $sql);
        if ($query){
            header('Location: tampiljualmotor.php');
        }else{
            header('location: simpanjualmotor.php?status=gagal');
        }
}
?>