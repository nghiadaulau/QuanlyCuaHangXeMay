<?php
include 'admin/db.php';
session_start();

if (isset($_SESSION['type'])) {
    if($_SESSION['type'] == 1){
        header("Location: admin.php");
    }else if($_SESSION['type'] == 2){
        header("Location: manager.php");
    }else if($_SESSION['type'] == 3){
        header("Location: staff.php");
    }
}

$error = '';
$username = '';
$password = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); 
    if (empty($username)) {
        $error = 'Vui lòng nhập tên đăng nhập';
    }
    else if (empty($password)) {
        $error = 'Vui lòng nhập mật khẩu';
    }else{
        $sql = "SELECT * FROM account WHERE username= '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['type'] = $row['type'];
                if($row['type'] == 1){
                    header("Location: admin.php");
                }else if($row['type'] == 2){
                    header("Location: manager.php");
                }else{
                    header("Location: staff.php");
                }
            }else{
                $error = 'Sai mật khẩu';
            }   
        }
        
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
    <div class="wrapper">
        <div class="logo">
            <img src="images/logo1.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Quản lý cửa hàng xe máy
        </div>
        <div class="form-group">
            <?php
                    if (!empty($error)) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    ?>
        </div>
        <form method="post" action="" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input value="<?= $username ?>" name="username" id="username" type="text" class="form-control"
                    placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input name="password" value="<?= $password ?>" id="password" type="password" class="form-control"
                    placeholder="Password">

            </div>
            <button id="submitLogin" class="btn mt-3">Login</button>
        </form>
    </div>
</body>

</html>