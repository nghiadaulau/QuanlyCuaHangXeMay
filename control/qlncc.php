<?php

include 'db.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
        $email=$_POST['email'];
		$sql = "INSERT INTO `nhacungcap`(`id`, `name`, `phone`, `address`, `email`)  VALUES ('$id', '$name', '$phone', '$address', '$email')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
        $email=$_POST['email'];
		$sql = "UPDATE `nhacungcap` SET `id`='$id',`name`='$name',`phone`='$phone',`address`='$address',`email`='$email'  WHERE id= '$id'";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `nhacungcap` WHERE id='$id' ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
?>