<?php  
include_once "connection.php";
$id  = $_GET ["id"];
$collection_id = $_GET["collection_id"];

$sql = "DELETE from nft where id = $id";
$req = mysqli_query($con,$sql);
header("location:nft.php?id=$collection_id")

?>