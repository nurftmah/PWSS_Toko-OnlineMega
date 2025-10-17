<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detaill Produk</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <!-- membuat header -->
    <div class="header">
        <div class="container">
        <h1>Toko Sembako</h1>
    </div>
    </div>

    <!-- membuat menu -->
    <div class="nav">
        <div class="container">
             <ul>
            <li>Beranda</li>
            <li>Profil</li>
            <li>Produk</li>
            <li>Keranjang</li>
            <li>Login</li>
            </ul>
        </div>
    </div>

    <!--membuat contain-->
    <div class="contain">
        <div class="container">
            <div class="row">
                <?php
                include "../koneksi.php";
                $id = mysqli_real_escape_string($koneksi,$_GET['id']);
                $sql = "SELECT*FROM produk WHERE id=$id";
                $query = mysqli_query($query, $sql);
                $data = mysqli_fetch_array($query);
                ?>
                <div class="detail-product">
                   <div class="img-product">
                      <img src="../image/<?= $data['gambar'] ?>" alt="" srcset="">
                    </div>
                <div class="desc-product">
                    <h3><?= $data['nama']?></h3>
                    <hr>
                    <h5>Rp. <?= number_format($data['harga'],0,',','.')?></h5>
                    <br>
                    Deskripsi :
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

    <!--membuat footer-->
    <div class="footer">
        <div class="container">
            Copyright &copy; Mega Nur Fatimah 2025
        </div>
    </div>
</body>
</html>