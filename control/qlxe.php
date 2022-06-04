<?php

include 'db.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$id=$_POST['id'];
		$name=$_POST['name'];
        $producer=$_POST['producer'];
		$color=$_POST['color'];
		$amount=$_POST['amount'];
        $price=$_POST['price'];
		$guaran=date('Y-m-d', strtotime($_POST['guaran']));
		$sql = "INSERT INTO `xe`(`id`, `name`, `producer`, `color`, `amount`, `price`, `guaran`)  VALUES ('$id', '$name', '$producer', '$color', '$amount', '$price', '$guaran')";
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
        $producer=$_POST['producer'];
		$color=$_POST['color'];
		$amount=$_POST['amount'];
        $price=$_POST['price'];
		$guaran=date('Y-m-d', strtotime($_POST['guaran']));
		$sql = "UPDATE `xe` SET `id`='$id',`name`='$name',`producer`='$producer',`color`='$color',`amount`='$amount',`price`='$price',`guaran`='$guaran' WHERE id= '$id'";
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
		$sql = "DELETE FROM `xe` WHERE id='$id' ";
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