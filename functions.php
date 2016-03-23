<?php
include 'connect.php';
date_default_timezone_set('Europe/Tallinn');
$time = date("Y-m-d H:i:s");
$todir = "pilt/";

	// Create connection
	$connection = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	return $connection;


//add new
function addUser() {
	global $connection, $time, $todir;
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$usertel = mysqli_real_escape_string($connection, $_POST['usertel']);
	$gender = mysqli_real_escape_string($connection, $_POST['gender']);
	move_uploaded_file( $_FILES['userimg']['tmp_name'], $todir . basename($_FILES['userimg']['name'] ) );

	$sql = "INSERT INTO users (name, username, email, usertel, gender, userimg, regdate)
	VALUES ('".$name."', '".$username."', '".$email."', '".$usertel."', '".$gender."', '".$_FILES['userimg']['name']."', '".$time."')";

	$connection->query($sql);

	header("Location: index.php");
	die();
}

//get all
function getUserList() {
	$sql = "SELECT * FROM users";
	global $connection;
	$result = $connection->query($sql);
	return $result;
}

//get one
function getUserData() {
	global $connection;
	$id = mysqli_real_escape_string($connection, $_POST['mybutton']);
	$sql = "SELECT * FROM users WHERE id=".$id."";
	$result = $connection->query($sql);
	$oneuser = $result->fetch_assoc();
	return $oneuser;
}

//del one
function delUser() {
	global $connection, $todir;
	$id = mysqli_real_escape_string($connection, $_POST['mybutton1']);
	$sql = "SELECT * FROM users WHERE id=".$id."";
	$result = $connection->query($sql);
	$oneuser = $result->fetch_assoc();
	if($oneuser['userimg']){unlink ($todir.$oneuser['userimg']);}
	$sql = "DELETE FROM users WHERE id=".$id."";
	global $connection;
	$connection->query($sql);
	header("Location: index.php");
	die();
}

//update exicting
function updUser() {
	if ( !!$_FILES['userimg']['tmp_name'] ){ // is the file uploaded yet?
	global $todir, $time, $connection;
	$id = mysqli_real_escape_string($connection, $_POST['hidden']);
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$usertel = mysqli_real_escape_string($connection, $_POST['usertel']);
	$gender = mysqli_real_escape_string($connection, $_POST['gender']);
	if($oneuser['userimg']){
		getone();
		unlink ($todir.$oneuser['userimg']);
	}
	move_uploaded_file( $_FILES['userimg']['tmp_name'], $todir . basename($_FILES['userimg']['name'] ) );
	$sql = "UPDATE users SET name='".$name."', username='".$username."', email='".$email."', gender='".$gender."', usertel='".$usertel."', userimg='".$_FILES['userimg']['name']."', regdate='".$time."' WHERE id=".$id."";
	$connection->query($sql);
}else{
	global $connection, $time;
	$id = mysqli_real_escape_string($connection, $_POST['hidden']);
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$usertel = mysqli_real_escape_string($connection, $_POST['usertel']);
	$gender = mysqli_real_escape_string($connection, $_POST['gender']);
	$sql = "UPDATE users SET name='".$name."', username='".$username."', gender='".$gender."', usertel='".$usertel."', email='".$email."', regdate='".$time."' WHERE id=".$id."";
	$connection->query($sql);
}

header("Location: index.php");
die();
}

$connection->close();
?>