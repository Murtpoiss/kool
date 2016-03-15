<?php
// sql to add a record
include 'connect.php';

if ( !!$_FILES['pilt']['tmp_name'] ){ // is the file uploaded yet?
	if($oneuser['pilt']){
		$sql = "SELECT * FROM user WHERE id=".$_POST['hidden']."";
		$result = $conn->query($sql);
		$oneuser = $result->fetch_assoc();
		unlink ("pilt/".$oneuser['pilt']);
	}
	$todir = "pilt/";
	move_uploaded_file( $_FILES['pilt']['tmp_name'], $todir . basename($_FILES['pilt']['name'] ) );
	$sql = "UPDATE user SET eesnimi='".$_POST['enimi']."', perenimi='".$_POST['pnimi']."', email='".$_POST['email']."', pilt='".$_FILES['pilt']['name']."' WHERE id=".$_POST['hidden']."";
	$conn->query($sql);
}else{
	$sql = "UPDATE user SET eesnimi='".$_POST['enimi']."', perenimi='".$_POST['pnimi']."', email='".$_POST['email']."' WHERE id=".$_POST['hidden']."";
	$conn->query($sql);
}



header("Location: index.php");
die();
?>