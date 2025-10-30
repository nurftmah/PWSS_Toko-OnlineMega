<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
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
            <input type="checkbox" id="nav-toggle">
            <label for="nav-toggle" class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </label>
            <div class="nav-link">
                <ul>
                    <li>Dashbord</li>
                    <li><a href="produk.php">Produk</a></li>
                </ul>
                <!-- <ul>
                    <li><i class="fa-regular fa-circle-user"></i></li>
                </ul> -->
             </div>
        </div>
    </div>

    <div class="contain">
        <div class="container">
            <div class="row">
                <h3>Data Produk</h3>
                 <table border="1" cellpadding="10" cellpacing="0">
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>STOK</th>
                            <th>GAMBAR</th>
                            <th>AKSI</th>
                        </tr>
                        <?php
                        include "../koneksi.php";

                        if(isset($_GET['Cari'])){
                            $cari = mysqli_real_escape_string($koneksi, $_GET['Cari']);
                            $sql = "SELECT * FROM produk WHERE id_produk='$cari' OR nama='$cari'";
                        } else {
                            $sql = "SELECT * FROM produk";
                        }

                        $query = mysqli_query($koneksi,$sql);
                        $no = 1;
                        while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['harga']; ?></td>
                            <td><?= $data['stok']; ?></td>
                            <td>
                                <?php
                                if(file_exists('../image/'.$data['gambar'])){
                                    ?>
                                    <img src="<?= '../image/'.$data['gambar'] ?>" alt="" style="width: 50px; height:50px;">
                                    <?php
                                }else{
                                    echo "tidak ada foto";
                                }
                                ?>
                            </td>

                            <td>
                               <a href="delete-produk.php?id=<?= $data['id_produk']; ?>">
                                    <button>Hapus</button>
                                </a>
                                <a href="edit-produk.php?id=<?= $data['id_produk']; ?>">
                                    <button>Edit</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                  </table>
            </div>
        </div>
    </div>