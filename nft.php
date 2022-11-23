<?php 
$id = $_GET["id"];
$artist = $_GET["artist"];

include "connection.php" ;
                        
$sqll = "SELECT  * FROM collection where id  = $id ";
$reqq =mysqli_query($con,$sqll) ;
$collecttion_row = mysqli_fetch_assoc($reqq);
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
<body>
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
    </div>
    </header>
    <div class="all">
        <div>
            <div class="management">
                <h1><?=$collecttion_row["collection_name"]?></h1>
                <h2></h2>
                <div style="display: flex; align-items: center; justify-content: center; margin-top: 40px; gap: 10px;">
                    <i class="bi bi-arrow-right" style="color:white; font-size: 30px;"></i>
                <a href="nft-form.php?id=<?=$id?>&artist=<?=$artist?>"><p class="add" >Add new NFT</p></a>
                </div>
                    <div class="cards-of-nft">
                        <?php 
                        $sql = "SELECT  * FROM nft where collection_id  = $id ";
                        $req =mysqli_query($con,$sql) ;

                        while ($row = mysqli_fetch_assoc($req)){
                        ?>
                        <div class="carda" >
                            <img src="apload_img/<?=$row["nft_image"]?>" alt="">
                            <p class="cname"><?=$row["nft_name"]?></p>
                            <p class="uname"><?=$row["artist_name"]?></p>
                            <p class="nprice"><?=$row["price"]?>$</p>
                            <p class="desc"><?=$row["nft_description"]?></p>
                            <div class="options">
                                
                                <a href="update_nft.php?id=<?=$row["id"]?>&collection_id=<?=$id?>">Update</a>
                                <a href="delete.nft.php?id=<?=$row["id"]?>&collection_id=<?=$id?>">Delete</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
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