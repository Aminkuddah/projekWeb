<?php
include 'koneksi.php';
session_start();
$error = '';

if(!empty($_POST["username"]) || !empty($_POST["password"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $level = $row["level"];

        if($level == 1) {
            $_SESSION["username"] = $username;
            $_SESSION["level"] = $level;
            header("Location: ../index.html");
        } else {
            $_SESSION["username"] = $username;
            $_SESSION["level"] = $level;
            header("Location: ../dasbor.html");
        }
    } else {
        $error = urlencode("Username atau password salah!");
        header("Location: ../index.php?pesan=$error");
    }

    mysqli_close($con);

} else {
    echo "masuk";
    die();
    $error = urlencode("Username atau password kosong!");
    header("Location: ../index.php?pesan=$error");
}
?>

<?php 
include 'koneksi.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if(mysql_num_rows($query) != 0) {
        session_start();
        $row = mysql_fetch_array($query);
        if ($row['level'] == 1) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $row['level'];
            header("location:admin/index.php");
        }else{
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $row['level'];
            header("location:index.php");
        }
    } else {
        // Salah
        header("location:login.php");
    }
}
?>