<?php
 
    $host = 'localhost'; // tên mysql server
    $user = 'root';
    $pass = '';
    $db = 'quanlycuahangxemay'; // tên databse

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die('Không thể kết nối database: ' . $conn->connect_error);
    }
	
?>