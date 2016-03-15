<?php
include 'connect.php';
// sql to delete a record
$sql = "SELECT * FROM user WHERE id=".$_POST['hidden']."";
$result = $conn->query($sql);
$oneuser = $result->fetch_assoc();
unlink ("pilt/".$oneuser['pilt']);
$sql = "DELETE FROM user WHERE id=".$_POST['hidden']."";
$conn->query($sql);
header("Location: index.php");
die();
?>