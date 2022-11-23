<?php  
include_once "connection.php";
$id  = $_GET ["id"];

$sql = "DELETE from collection where id = $id";
$req = mysqli_query($con,$sql);
header("location:collection.php")

?>