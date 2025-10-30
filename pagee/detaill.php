<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamplate</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <!-- membuat header -->
    <div class="header">
        <div class="container">
        <h1>TOKO SEMBAKO</h1>
    </div>
    </div>
 <!-- menu -->
    <div class="nav">
        <div class="container">
             <ul>
            <li>Beranda</li>
            <li>Profil</li>
            <li>Produk</li>
            <li>Keranjang</li>
            </ul>
        </div>
    </div>
     <div class="contain">
        <div class="container">
            <div class="row">
                
                <!-- // include "../koneksi.php";
                // $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                // $sql = "SELECT*FROM produk WHERE id='$id'";
                // $query = mysqli_query($koneksi, $sql);
                // $data = mysqli_fetch_array($query); -->
                
                <?php
                include "../koneksi.php";
                $id = mysqli_real_escape_string($koneksi, $_GET['id']);
                $sql = "SELECT * FROM produk WHERE id_produk='$id'";
                $query = mysqli_query($koneksi, $sql);
                $data = mysqli_fetch_array($query);
                ?>

                <div class="detail-product">
                    <div class="img-product">
                      <img src="../image/<?= $data['gambar'] ?>" alt="">
                    </div>
                    <div class="desc-product">
                        <h3><?= $data['nama']?></h3>
                        <hr>
                        <h5>Rp. <?= number_format($data['harga'],0,',','.')?></h5>
                        <br>
                        Deskripsi:
                        <p>
                            <?= $data['deskripsi']?>
                        </p>
                        <br>
                        <button>Check Out</button>
                    </div>
                </div>
             </div>
         </div>
    </div>