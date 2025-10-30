<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Produk</title>
</head>
<body>
    <h1>Create Produk</h1>
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
        include "koneksi.php";

        $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jk = mysqli_real_escape_string($koneksi, $_POST['jk']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $nohp = mysqli_real_escape_string($koneksi, $_POST['nohp']);

        $foto = $_FILES['foto'];

        if($foto['size'] < 3000000){
            $file_name = basename($foto['name']);
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_file_name = uniqid()."_".time().".".$file_extension;
            if(move_uploaded_file($foto['tmp_name'], 'Foto/'.$new_file_name)){
                $sql = "INSERT INTO siswa VALUES ('$nisn','$nama','$jk','$alamat','$nohp','$new_file_name')";
            }else{
                $sql = "INSERT INTO siswa VALUES ('$nisn','$nama','$jk','$alamat','$nohp','-')";
            }

            $query = mysqli_query($koneksi,$sql);
            if($query){
                echo "data berhasil disimpan";
                ?>
                <a href="siswa.php">Lihat Data</a>
                <?php
            }
        }else{
            echo"ukuran terlalu besar";
        }
    }
    ?>
</body>
</html>