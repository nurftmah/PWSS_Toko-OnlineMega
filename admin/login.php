<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type="text" name="username" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="password" id="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="LOGIN" name="login">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['login'])){
        include "../koneksi.php";
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, sha1($_POST['password']));

        $sql = "SELECT*FROM admin WHERE username='$username' AND password='$password'";
        $query = mysqli_query($koneksi, $sql);
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_array($query);
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            header("location:dashbord.php");   
        }else{
            echo 'Login Anda gagal';
        }
    }
    ?>
</body>
</html>