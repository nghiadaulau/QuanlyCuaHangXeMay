<?php 
session_start();
if (isset($_SESSION['type'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}else{
    header("Location: index.php");
}
?>