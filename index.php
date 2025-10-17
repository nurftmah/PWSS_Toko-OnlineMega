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
        <h1>Toko Sembako</h1>
    </div>
    </div>

    <!-- membuat menu -->
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
                <li>Login</li>
              </ul>
            </div>
        </div>
    </div>

    <div class="contain">
        <div class="container">
            <div class="row">
                <div class="banner">
                    <img class="img-banner" src="image/promo.jpeg">
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
                            <a href="pagee/detail.php?id=<?= $data['id_produk']?>">
                                <img src="image/<? $data['gambar']?>" alt="">
                                <div class="name-product"><?= $data['nama']?></div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
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