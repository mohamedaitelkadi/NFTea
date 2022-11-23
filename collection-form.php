<?php
include "connection.php";

if(isset($_POST["add_collection"])){
    $collection_name = $_POST["collection_name"];
    $artist_name = $_POST["artist_name"];
    $collection_image_name = $_FILES["collection_image"]["name"];
    $collection_image_tmpname = $_FILES["collection_image"]["tmp_name"];
    $collection_image_filepath = "apload_img/".$collection_image_name ;

    $sql = "INSERT INTO collection (collection_image,collection_name,collection_artist) values ('$collection_image_name','$collection_name','$artist_name') ";
    $req = mysqli_query($con,$sql);
    move_uploaded_file($collection_image_tmpname,$collection_image_filepath);
    if($req){
        $msg='successfully added';
    }
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
    <link rel = "icon" href = "/logo2.png" type = "image/x-icon">
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
    </header>
    <div class="cform">
        <div class="form-collection">
            <div class="title">Add new collection</div>
            <div class="subtitle">create a new collection for new NFTs</div>
            <p class="success">  <?php 
                if(isset($msg)){
                echo $msg;
                }
            ?></p>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-container ic2">
              <input id="collectionname" class="input" type="text" placeholder="Collection name" name="collection_name" required/>
            </div>
            <div class="input-container ic2">
              <input id="artistname" class="input" type="text" placeholder="Artist name" name ="artist_name" required />
            </div>
            <div class="input-container ic2" style="margin-top: 15px;">
                <input id="imagelink" class="input" type="file" placeholder="Image link"  name = "collection_image" required>
              </div>
            <a href="collection.php"><button type="submit" class="submit" name="add_collection">Add</button></a>
            </form>
        </div>
          <a href="collection.php"><i class="bi bi-arrow-left-circle-fill"></i></a>
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