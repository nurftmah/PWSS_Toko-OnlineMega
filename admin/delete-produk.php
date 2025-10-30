<?php
if(isset($_GET['id'])){
    include "../koneksi.php";
    $id_p =$_GET['id'];
    $sql = "DELETE FROM produk WHERE id_produk = $id_p";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location: ../template.php");
    }else{
        echo "Data gagal dihapus";
    }
}else{
    echo "Not Found";
}