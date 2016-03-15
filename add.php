<?php
// sql to add a record
include 'connect.php';
$todir = "pilt/";
move_uploaded_file( $_FILES['pilt']['tmp_name'], $todir . basename($_FILES['pilt']['name'] ) );

$sql = "INSERT INTO user (eesnimi, perenimi, email, pilt)
VALUES ('".$_POST['enimi']."', '".$_POST['pnimi']."', '".$_POST['email']."', '".$_FILES['pilt']['name']."')";

$conn->query($sql);

header("Location: index.php");
die();
?>