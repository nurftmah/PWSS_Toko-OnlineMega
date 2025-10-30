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
    <title>Dashbord</title>
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
                <ul>
                    <li><i class="fa-regular fa-circle-user"></i></li>
                </ul>
             </div>
        </div>
    </div>

    <div class="contain">
        <div class="container">
                <h3>Selamat Datang Administator</h3>
        </div>
    </div>