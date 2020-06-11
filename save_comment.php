<?php
require("connection.php");
$name = mysqli_real_escape_string($db,$_POST['name']);
$comment = mysqli_real_escape_string($link,$_POST['comment']);
$date = date('Y-m-d H:i:s');

$q = "INSERT INTO comments (name,comment,date) VALUES('".$name."','".$comment."','".$date."')";
mysqli_query($link,$q);
?>