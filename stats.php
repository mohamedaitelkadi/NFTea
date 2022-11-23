<?php 
include "connection.php";

        $req_total = mysqli_query($con,"SELECT COUNT(*) as total from nft");
        $req_total_collection = mysqli_query($con,"SELECT COUNT(*) as total from collection");

        $sql_max = "SELECT * FROM nft WHERE price in (SELECT MAX(price) FROM nft)";
        $req_max = mysqli_query($con,$sql_max);

        $sql_min = "SELECT * FROM nft WHERE price in (SELECT MIN(price) FROM nft)";
        $req_min = mysqli_query($con,$sql_min);

        $total = mysqli_fetch_assoc($req_total);
        $total_collection = mysqli_fetch_assoc($req_total_collection);

        $max = mysqli_fetch_assoc($req_max);
        $min = mysqli_fetch_assoc($req_min);


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
<body>
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
    <div class="all">
        <div class="stats-page">
            <img class="rocket" src="img/stats1.png" alt="">
            <div>
                <h1>Statistics</h1>
                <div class="main-stats">
                    <div class="nfts-total">
                        <p class="total">Total NFTs</p>
                        <p class="pieces" id="nbr"><?=$total["total"]?></p>
                    </div>
                    <div class="users-total">
                        <p class="total">Total ollection</p>
                        <p class="pieces" id="nbr"><?=$total_collection["total"]?></p>
                </div>
                </div>
            </div>
        </div>
    <div class="container-bottom">
        <div class="stats-bar">
            <!-- <div class="left">
                <ul>
                    <li><a href="#">NFTs <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown">
                      <li><a href="#">NFTs</a></li>
                      <li><a href="#">Collections</a></li>
                      <li><a href="#">Users</a></li>
                    </ul>
                    </li>
                </ul>
            </div> -->
            <div class="right"></div>
        </div>
        
        <div class="statistic-by-nfts">
            <div class="by-price" style="background-color: rgb(160, 37, 37);">
                <img src="apload_img/<?=$min["nft_image"]?>" alt="">
                <div class="nft-rank">
                    <p>most cheap</p>
                    <p class="name"><?=$min["nft_name"]?></p>
                    <p class="owner"><?=$min["artist_name"]?></p>
                    <p><?=$min["price"]?>$</p>
                </div>
            </div>

            <div class="by-price" style="background-color: rgb(37, 160, 37);">
                <img src="apload_img/<?=$max["nft_image"]?>" alt="">
                <div class="nft-rank">
                    <p>most expensive</p>
                    <p class="name"><?=$max["nft_name"]?></p>
                    <p class="owner"><?=$max["artist_name"]?></p>
                    <p><?=$max["price"]?>$</p>
                </div>
            </div>
            <?php 
            
            $x = 2;

            $sql_order = "SELECT * FROM `nft` ORDER BY price DESC LIMIT 9 OFFSET 1";
            $req_order = mysqli_query($con,$sql_order);
            while ($row= mysqli_fetch_assoc($req_order)){
            
            ?>
            <div class="by-price">
                <img src="apload_img/<?=$row["nft_image"]?>" alt="">
                <div class="nft-rank">
                    <p><?=$x?></p>
                    <p class="name"><?=$row["nft_name"]?></p>
                    <p class="owner"><?=$row["artist_name"]?></p>
                    <p><?=$row["price"]?>$</p>
                </div>
            </div>
            <?php $x++;} ?>
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