<?php

include 'db.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$birth=date('Y-m-d', strtotime($_POST['birth']));
        $sex=$_POST['sex'];
		$phone=$_POST['phone'];
		$position=$_POST['position'];
        $salary=$_POST['salary'];
		$address=$_POST['address'];
		$sql = "INSERT INTO `nhanvien`(`id`, `name`, `birth`, `sex`, `phone`, `position`, `salary`, `address`)  VALUES ('$id', '$name', '$birth', '$sex', '$phone', '$position', '$salary', '$address')";
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
		$birth=date('Y-m-d', strtotime($_POST['birth']));
        $sex=$_POST['sex'];
		$phone=$_POST['phone'];
		$position=$_POST['position'];
        $salary=$_POST['salary'];
		$address=$_POST['address'];
		$sql = "UPDATE `nhanvien` SET `id`='$id',`name`='$name',`birth`='$birth',`sex`='$sex',`phone`='$phone',`position`='$position',`salary`='$salary',`address`='$address' WHERE id= '$id'";
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
		$sql = "DELETE FROM `nhanvien` WHERE id='$id' ";
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