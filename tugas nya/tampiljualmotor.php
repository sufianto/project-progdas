<?php
include  'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Jual Barang</title>
    <style>
        .jumbotron{
            height: 400px;
            background-image: url(https://c4.wallpaperflare.com/wallpaper/793/403/700/kawasaki-kawasaki-ninja-motorcycle-motorsport-wallpaper-preview.jpg);
            background-size: cover;
            background-position-y: -300px;
        }
        .judullist{
            height: 50px;
        }
    </style>
    
    
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Fluid jumbotron</h1>
          <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="judullist bg-dark rounded text-center text-white pt-2"> List Item</div>

                 <div class="listkeranjang" id="listkeranjang">
                 
                 </div>   

                    <table width="100%">
                        <tbody>
                            <tr>
                                <td>Discound (5%)</td>
                                <td> Rp.<span id="discount"></span></td>
                            </tr>
                            <tr>
                                <td>PPN (10%)</td>
                                <td> Rp. <span id="pajak"></span></td>
                            </tr>
                            <tr class="bg-dark text-white">
                                <td>Total Bayar (10%) </td>
                                <td> Rp. <span id="totalbayar"></span></td>
                            </tr>
                        </tbody>
                    </table>
                   
                    <!-- <button type="button" class="btn btn-primary mt-3 btn-block ">Bayar</button> -->
                    <a href="jualmotor.html" class="btn btn-primary mt-3 btn-block ">Bayar</a>
                    

                </div>
        
                <div class="col-7" id="listproduk">
 
                </div>
                <div class="col-5">
                <h3>Data Jual Motor</h3>
    <!-- <h4><a href="jualmotor.html">[+] Tambah Baru</a></h4> -->
    <table border="1">
    <thead class="table-dark">
        <tr> 
            <th>nama_barang</th>
            <th>Harga</th>
            <th>discount</th>
            <th>ppn</th>
            <th>total_bayar</th>
            <th>Action</th>
            <tbody id="tampildata">
        </tr>
        <?php
        $sql = "SELECT * FROM jualmotor";
        $query = mysqli_query($connect,$sql);
        
        while ($cus = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$cus['nama_barang']."</td>";
            echo "<td>".$cus['harga']."</td>";
            echo "<td>".$cus['discount']."</td>";
            echo "<td>".$cus['ppn']."</td>";
            echo "<td>".$cus['total_bayar']."</td>";

            echo "<td>";
            echo "<a href='formeditjualmotor.php?nama_barang=".$cus['nama_barang']."'>Edit</a> | ";
            echo "<a href='hapusjualmotor.php?nama_barang=".$cus['nama_barang']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
                </div>
        </div>
    </div>

    <script >
        var namabarang = ['ZX25R','R25','CBR250','GSX R 150'] 
var hargabarang = [60000000,40000000,40000000,20000000]
var gambarbarang = ["https://www.gilamotor.com/wp-content/uploads/2020/02/Kawasaki-Ninja-ZX25R.jpg","https://www.gilamotor.com/wp-content/uploads/2016/08/lead-3.jpg","https://cdn-2.tstatic.net/pontianak/foto/bank/images/honda-cbr-250-rr_20180728_085203.jpg","https://otorider.com/image/load/751/422/gallery/suzuki-gsx-r150-balap3703.jpg"]

var listproduk = document.getElementById('listproduk')
var listkeranjang = document.getElementById('listkeranjang')

var tampildiscount = document.getElementById('discount')
var tampilpajak = document.getElementById('pajak')
var tampiltotalbayar = document.getElementById('totalbayar')

var namabarang_keranjang = []
var hargabarang_keranjang = []

function showlistproduk() {
  listproduk.innerHTML =''
  for (let i = 0; i < namabarang.length; i++) {
    listproduk.innerHTML +='<div class="card float-left mr-3 mb-3" style="width: 12rem;">'+
                  '<img src="'+gambarbarang[i]+'"class="card-img-top" style="width: 100%; height: 110px;" alt="...">'+
                  '<div class="card-body">'+
                    '<h5 class="card-title">'+namabarang[i]+'</h5>'+
                    '<p class="card-text">Rp.'+hargabarang[i]+'</p>'+
                    '<a href="#" class="btn btn-primary" Onclick="addlistitem('+i+')" >Beli</a>'+
                  '</div>'+
                '</div>' 
  }
}
showlistproduk()

function addlistitem(id) {
  namabarang_keranjang.push(namabarang[id])
  hargabarang_keranjang.push(hargabarang[id])


  showlistkeranjang()
}

function showlistkeranjang() {
  listkeranjang.innerHTML=''
  
  var discount = 0
  var pajak = 0
  var hargatotal = 0
  var totalbayar = 0

  for (let i = 0; i < namabarang_keranjang.length; i++) {
   listkeranjang.innerHTML +=' <div class="card mt-3 mb-3" style="width: 21,5rem;">'+
              '<div class="card-body">'+
              '<h5 class="card-title" name="nama_brg">'+namabarang_keranjang[i]+'</h5>'+
              '<p class="card-text" name="hrg">Rp.'+hargabarang_keranjang[i]+'</p>'+
              '<p>Qty: 1</p>'+
              '<a href="#" class="btn btn-danger float-right" Onclick="hapusdata('+i+')" >Hapus</a>'+
             ' </div>'+
          '</div>'
    
    hargatotal = hargabarang_keranjang[i]+hargatotal

    if(totalbayar > 8000){
      discount = totalbayar*0.05
    }else{
     discount = 0
    }
    totalbayar = hargatotal-discount

    pajak = totalbayar*0.1

    var totalbelanja = totalbayar-pajak
    tampilpajak.innerHTML = pajak
    tampildiscount.innerHTML = discount
    tampiltotalbayar.innerHTML = totalbelanja
  }
}
function hapusdata(id) { 
  namabarang_keranjang.splice(id, 1);
  hargabarang.splice(id, 1);
        showlistkeranjang()
  } 


    //   var tampil = document.getElementById('tampildata')
      
    //   function add() {
    //   var namabaru = document.getElementById('namabarang_keranjang').value
    //   var hargabaru = document.getElementById('hargabarang_keranjang').value
    //   var pajakbaru = document.getElementById('pajak').value
    //   var discountbaru = document.getElementById('discount').value
    //   var totalbelanjabaru = document.getElementById('totalbayar').value
    //   if (namabaru == '') {
    //     alert('anda belum memasukan data')
    //   }else{
    //     namabarang_keranjang.push(namabaru)
    //     hargabarang_keranjang.push(hargabaru)
    //     pajak.push(pajakbaru)
    //     discount.push(discountbaru)
    //     totalbelanja.push(totalbelanjabaru)
    //     showData()

    //   }
    // }

    //   function showData() {
    //   tampil.innerHTML = ""

    //     tampil.innerHTML += "<tr>" +
    //       "<th>" + namabarang_keranjang[i] + "</th>" +
    //       "<td>" + hargabarang_keranjang[i] + "</td>" +
    //       "<td>" + pajak[i] + "</td>" +
    //       "<td>" + discount[i] + "</td>" +
    //       "<td>" + totalbelanja[i] + "</td>" +
    //       "<td>" +
    //       "<a href='formeditjualmotor.php?nama_barang=".$cus['nama_barang']."'>Edit</a> | " +
    //       "<a href='hapusjualmotor.php?nama_barang=".$cus['nama_barang']."'>Hapus</a>" +
    //       "</td>" +
    //       "</tr>"

    //   }
    // }      

     
    </script>
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>