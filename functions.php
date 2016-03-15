<?php
include 'connect.php';
date_default_timezone_set('Europe/Tallinn');
$time = date("Y-m-d H:i:s");
$todir = "pilt/";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;


//add new
function addnew() {
	global $conn, $time, $todir;
	$enimi = mysqli_real_escape_string($conn, $_POST['enimi']);
	$pnimi = mysqli_real_escape_string($conn, $_POST['pnimi']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	move_uploaded_file( $_FILES['pilt']['tmp_name'], $todir . basename($_FILES['pilt']['name'] ) );

	$sql = "INSERT INTO user (eesnimi, perenimi, email, pilt, aeg)
	VALUES ('".$enimi."', '".$pnimi."', '".$email."', '".$_FILES['pilt']['name']."', '".$time."')";

	$conn->query($sql);

	header("Location: index.php");
	die();
}

//get all
function get() {
	$sql = "SELECT * FROM user";
	global $conn;
	$result = $conn->query($sql);
	return $result;
}

//get one
function getone() {
	global $conn;
	$id = mysqli_real_escape_string($conn, $_POST['mybutton']);
	$sql = "SELECT * FROM user WHERE id=".$id."";
	$result = $conn->query($sql);
	$oneuser = $result->fetch_assoc();
	return $oneuser;
}

//del one
function del() {
	global $conn, $todir;
	$id = mysqli_real_escape_string($conn, $_POST['mybutton1']);
	$sql = "SELECT * FROM user WHERE id=".$id."";
	$result = $conn->query($sql);
	$oneuser = $result->fetch_assoc();
	if($oneuser['pilt']){unlink ($todir.$oneuser['pilt']);}
	$sql = "DELETE FROM user WHERE id=".$id."";
	global $conn;
	$conn->query($sql);
	header("Location: index.php");
	die();
}

//update exicting
function update() {
	if ( !!$_FILES['pilt']['tmp_name'] ){ // is the file uploaded yet?
	global $todir, $time, $conn;
	$id = mysqli_real_escape_string($conn, $_POST['hidden']);
	$enimi = mysqli_real_escape_string($conn, $_POST['enimi']);
	$pnimi = mysqli_real_escape_string($conn, $_POST['pnimi']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	if($oneuser['pilt']){
		getone();
		unlink ($todir.$oneuser['pilt']);
	}
	move_uploaded_file( $_FILES['pilt']['tmp_name'], $todir . basename($_FILES['pilt']['name'] ) );
	$sql = "UPDATE user SET eesnimi='".$enimi."', perenimi='".$pnimi."', email='".$email."', pilt='".$_FILES['pilt']['name']."', aeg='".$time."' WHERE id=".$id."";
	$conn->query($sql);
}else{
	global $conn, $time;
	$id = mysqli_real_escape_string($conn, $_POST['hidden']);
	$enimi = mysqli_real_escape_string($conn, $_POST['enimi']);
	$pnimi = mysqli_real_escape_string($conn, $_POST['pnimi']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$sql = "UPDATE user SET eesnimi='".$enimi."', perenimi='".$pnimi."', email='".$email."', aeg='".$time."' WHERE id=".$id."";
	$conn->query($sql);
}

header("Location: index.php");
die();
}

$conn->close();
?>