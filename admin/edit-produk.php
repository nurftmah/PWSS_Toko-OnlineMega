<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <?php 
    if(!isset($_GET['id'])){
        header("location:edit-produk.php");
    }
    include "../koneksi.php";
    if(isset($_POST['submit'])){

        $id_p = mysqli_real_escape_string($koneksi, $_POST['id_produk']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
        $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
        $old_foto_name = mysqli_real_escape_string($koneksi, $_POST['old_foto_name']);

        $foto = $_FILES['gambar'];

        if($foto['size'] < 3000000){

            $file_name = basename($foto['name']);
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_file_name = uniqid()."_".time().".".$file_extension;
            if(move_uploaded_file($foto['tmp_name'], 'gambar/'.$new_file_name)){
               if(file_exists('gambar/'.$old_foto_name)){
                unlink('gambar/'.$old_foto_name);
               }
               $sql = "UPDATE produk SET nama='$nama', harga='$harga', stok='$stok', gambar='$new_file_name' WHERE id_produk='$id_p'";
            }else{
               $sql = "UPDATE produk SET nama='$nama',  harga='$harga', stok='$stok' WHERE id_produk='$id_p'";
            }
             $query = mysqli_query($koneksi, $sql);
         }
    }

    $id_p = $_GET['id'];
    $sql = "SELECT*FROM produk WHERE id_produk='$id_p'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);

    ?>
    <h1>Edit Produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID_PRODUK</td>
                <td><input type="text" name="id_produk" value="<?= $data['id_produk']; ?>"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama" value="<?= $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td>HARGA</td>
                <td>
                    <textarea name="harga" id=""><?=$data['harga']?></textarea>
                </td>
            </tr>
            <tr>
                <td>STOK</td>
                <td><input type="text" name="stok" id="" value="<?= $data['stok']; ?>"></td>
            </tr>
            <tr>
                <td>GAMBAR</td>
                <td>
                    <img src="<?= '..image/'.$data['gambar'] ?>" alt="" style="width: 50px; height:50px;">
                    <br>
                    <input type="file" name="gambar" id="" accept="image/*">
                    <input type="hidden" name="old_foto_name" value="<?= $data['gambar'] ?>">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Update" name="submit"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['submit'])){
        if($query){
            echo "Data Berhasil Diupdate";
            ?>
            <a href="produk.php">Lihat Data</a>
            <?php
        }
    } 
    ?>
</body>
</html>