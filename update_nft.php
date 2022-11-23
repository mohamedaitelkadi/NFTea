<?php
include "connection.php";
$id = $_GET["id"];
$collection_id = $_GET["collection_id"];



$sql = "SELECT * FROM nft where id  = '$id'";
$req = mysqli_query($con,$sql);
$row  = mysqli_fetch_assoc($req);

if(isset($_POST["update_nft"])){
    $nft_name = $_POST["nft_name"];
    $nft_price = $_POST["price"];
    $nft_description = $_POST["nft_description"];
    
    $nft_image_name = $_FILES["nft_image"]["name"];
    $nft_image_tmpname = $_FILES["nft_image"]["tmp_name"];
    $nft_image_filepath = "apload_img/".$nft_image_name ;

    $sql = "UPDATE nft set nft_name = '$nft_name',price ='$nft_price',nft_description = '$nft_description' , nft_image ='$nft_image_name'  where id = $id ";
    $req = mysqli_query($con,$sql);
    move_uploaded_file($nft_image_tmpname,$nft_image_filepath);

    header("location:nft.php?id=$collection_id");
    
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>NFTea</title>
    <link rel = "icon" href = "img/logo2.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body style="background-image:url(img/background.gif); background-repeat: no-repeat;background-size: cover;">
    <header>
      <header>
        <div class="navbar">
            <div class="logo">
              <a href="index.php"><img src="img/logo.png" alt=""></a>
                <p>NFTea</p>
            </div>
            <div class="navbar-details">
                <a href="index.php"><p>Explore</p></a>
                <!-- <a href="nft.php"><p>NFTs</p></a> -->
                <a href="collection.php"><p>Collections</p></a>
                <a href="stats.php"><p>Stats</p></a>
                <button class="btn">Log in</button>
            </div>
        
        <nav class="burger" role="navigation">
        <div id="menuToggle">
        <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
      
      
        <ul id="menu">
            <a href="index.php"><li>Explore</li></a>
            <a href="collection.php"><li>Collections</li></a>
            <a href="stats.php"><li>Stats</li></a>
        </ul>
        </div>
    </nav>
    </div>
    </header>
    <div class="cform">
        <div class="form-nft">
            <div class="title">Update NFT</div>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-container ic2">
              <input id="nftname" class="input" type="text" placeholder="NFT name" name ="nft_name" value="<?=$row["nft_name"]?> "/>
              
            </div>
            
            <div class="input-container ic2" style="margin-top: 15px;" >
                <input id="nftprice" class="input" type="number" placeholder="NFT price" name ="price" value =<?=$row["price"]?>  />
                
                
              </div>
              <div class="input-container ic2" style="margin-top: 15px;">
                <input id="description" class="input" type="text" placeholder="Description" name ="nft_description" value="<?=$row["nft_description"]?>" />
                
                
              </div>
              <div class="input-container ic2" style="margin-top: 15px;">
                <input id="imagelink" class="input" type="file" placeholder="Image link" name ="nft_image"  />
              </div>
            
            <a href="nft.php"><button type="submit" class="submit" name = "update_nft">Update</button></a>
            </form>
          </div>
          <a href="nft.php?id=<?=$collection_id?>"><i class="bi bi-arrow-left-circle-fill"></i></a>
    </div>
    <!-- footer -->
    <footer class="site-footer">
		<div class = "container">

			<div class="grid-container">
				

				<div class="grid-item inner-grid-container">
					
					<div class="grid-item"><a href="">About Us</a></div>   
					<div class="grid-item"><a href="">Health and Social Care</a></div>   
					<div class="grid-item"><a href="">Privacy Policy</a></div>   
					<div class="grid-item"><a href="">Blog</a></div>   
					<div class="grid-item"><a href="">Contact us</a></div>   
					<div class="grid-item"><a href="">Finance</a></div>
					<div class="grid-item"><a href="">Cookie Policy</a></div>   
					<div class="grid-item"><a href="">Jobs</a></div>   


				</div>

				<div class="grid-item">
					<div class = "social-buttons">
						<a href= ""><i class="bi bi-instagram"></i></a>
						<a href= ""><i class="bi bi-facebook"></i></a>
						<a href= ""><i class="bi bi-linkedin"></i></a>
						<a href= ""><i class="bi bi-twitter"></i></a>
					</div>
				</div>   
			</div>
			<hr>

			<p>Copyright © 2022 | NFTea all rights reserved</p>

		</div>
	</footer>
    <script src="test.js"></script>
</body>
