<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

	// Create connection
	global $conn;
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;


//add new
function addnew() {
    $todir = "pilt/";
	move_uploaded_file( $_FILES['pilt']['tmp_name'], $todir . basename($_FILES['pilt']['name'] ) );

	$sql = "INSERT INTO user (eesnimi, perenimi, email, pilt)
	VALUES ('".$_POST['enimi']."', '".$_POST['pnimi']."', '".$_POST['email']."', '".$_FILES['pilt']['name']."')";

	global $conn;
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
	$sql = "SELECT * FROM user WHERE id=".$_POST['mybutton']."";
	global $conn;
	$result = $conn->query($sql);
	$oneuser = $result->fetch_assoc();
	return $oneuser;
}

//del one
function del() {
	$sql = "SELECT * FROM user WHERE id=".$_POST['mybutton1']."";
	global $conn;
	$result = $conn->query($sql);
	$oneuser = $result->fetch_assoc();
	if($oneuser['pilt']){unlink ("pilt/".$oneuser['pilt']);}
	$sql = "DELETE FROM user WHERE id=".$_POST['mybutton1']."";
	global $conn;
	$conn->query($sql);
	header("Location: index.php");
	die();
}

//update exicting
function update() {
	if ( !!$_FILES['pilt']['tmp_name'] ){ // is the file uploaded yet?
	if($oneuser['pilt']){
		$sql = "SELECT * FROM user WHERE id=".$_POST['mybutton']."";
		global $conn;
		$result = $conn->query($sql);
		$oneuser = $result->fetch_assoc();
		unlink ("pilt/".$oneuser['pilt']);
	}
	$todir = "pilt/";
	move_uploaded_file( $_FILES['pilt']['tmp_name'], $todir . basename($_FILES['pilt']['name'] ) );
	$sql = "UPDATE user SET eesnimi='".$_POST['enimi']."', perenimi='".$_POST['pnimi']."', email='".$_POST['email']."', pilt='".$_FILES['pilt']['name']."' WHERE id=".$_POST['hidden']."";
	global $conn;
	$conn->query($sql);
}else{
	$sql = "UPDATE user SET eesnimi='".$_POST['enimi']."', perenimi='".$_POST['pnimi']."', email='".$_POST['email']."' WHERE id=".$_POST['hidden']."";
	global $conn;
	$conn->query($sql);
}

header("Location: index.php");
die();
}

?>