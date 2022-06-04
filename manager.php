<?php
include 'admin/db.php';
session_start();

if (isset($_SESSION['type'])) {
    if($_SESSION['type'] != 2){
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

</head>

<body>
    <div class="wrapper center">
        <div class="logo">
            <img src="images/logo1.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Chào mừng manager đăng nhập thành công!
        </div>
        <a href="logout.php"><button class="btn mt-3">Đăng xuất</button></a>
    </div>
</body>

</html>