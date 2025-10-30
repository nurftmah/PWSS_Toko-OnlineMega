<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamplate</title>
    <link rel="stylesheet" href="styles.css">
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
            <input type="checkbox" id="nav-toggle">
            <label for="nav-toggle" class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </label>
            <div class="nav-link">
            <ul>
            <li>Beranda</li>
            <li>Profil</li>
            <li>Produk</li>
            <li>Keranjang</li>
            </ul>
            <ul>
                <li><a href="admin/login.php">Login</a></li>
            </ul>
             </div>
        </div>
    </div>

    <div class="contain">
        <div class="container">
            <div class="row">
                <div class="banner">
                    <img class="img-banner" src="image promo/promo.jpeg">
                </div>
            </div>
            <div class="row">
                <br />
                <h5>Best Seller</h5>
                <hr>
                <div class="best-seller">
                   <?php
                    include "koneksi.php";
                    $sql = "SELECT*FROM produk"; 
                    $query = mysqli_query($koneksi, $sql);
                    while($data = mysqli_fetch_array($query)){
                   ?>
                    <div class="item-card">
                        <a href="pagee/detaill.php?id=<?= $data['id_produk'] ?>">
                        <img src="image/<?= $data['gambar'] ?>" alt="">
                        <div class="name-product"> <?= $data['nama'] ?></div>
                        </a>
                    </div>
                    <div class="item-card">
                        <img src="image/beras.jpg" alt="">
                        <div class="name-product">Produk 2</div>
                    </div>
                    <div class="item-card">
                        <img src="image/beras.jpg" alt="">
                        <div class="name-product">Produk 3</div>
                    </div>
                    <!-- <div class="item-card">
                        <img src="image/beras.jpg" alt="">
                        <div class="name-product">Produk 4</div>
                    </div>
                    <div class="item-card">
                        <img src="image/beras.jpg" alt="">
                        <div class="name-product">Produk 5</div>
                    </div>
                    <div class="item-card">
                        <img src="image/beras.jpg" alt="">
                        <div class="name-product">Produk 6</div>
                    </div> -->
                    <?php 
                    } 
                    ?>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <!-- <a href="logout.php">Logout</a> -->
        <div class="container">
            Copyright &copy; dea azri 2025
        </div>
    </div>
</body>
</html>