<?php
	require_once '../php/db_connect.php';
	if (isset($_COOKIE["username"])) {
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $sql = "SELECT play_counter FROM users WHERE username = :username ";
        $getUsers = $pdo->prepare($sql);
        $getUsers -> bindParam("username",$_COOKIE['username'],PDO::PARAM_STR);
        $getUsers -> execute();
        $result = $getUsers->fetchALL(PDO::FETCH_COLUMN, 0);
        $_COOKIE['playCounter'] = $result[0];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gamers' Headquarter</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="../img/favicon.png" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/style2.css"/>
</head>

<body class="background2">

	<!-- Header section -->
	<header class="header-section">
		<div>
				<nav class="main-menu">
					<ul>
						<div class="topnav" id="myTopnav">
								<a href="index.php">
									<img class = "picz_logo" src="../img/logo.png" align = "top">
								</a>
								<a href="javascript:void(0);" class="icon" onclick="navbar()">
									<i class="fa fa-bars"></i>
								</a>
								<?php
									if (!isset($_COOKIE['username'])) {
										echo "<a href='../php/reglog.php'><button class='mt medium diagonal'>Sign up</button></a>";
										
									} else {
										echo "<a href='../php/logout.php'><button class='mt medium diagonal'>Logout</button></a>";
										echo "<h3 style='
													color: #fff;
													font-size: 20px;
													float: right;
													padding: 12px;
										'>User: ".$_COOKIE['username']." / Games played: ".$_COOKIE['playCounter']."<h3>";
									}
								?>
						</div>
					</ul>
				</nav>
		</div>
	</header>
	
	<div class="background3">
		<img src="../img/WellcomeBotTR.png"/>
		<div>
		<?php
			if (!isset($_COOKIE['username'])) {} else {
				echo "<h3 style='
							color: #fff;
							font-size: 20px;
							text-align: center;
							padding: 12px;
				'>Games played: ".$_COOKIE['playCounter']."<h3>
				";
			}
		?>
		</div>
		<div>
			<img class="miniBots container2" src="../img/Mini_bots.png">
		</div>
		<div class="container2">
			<canvas id="cvs" width="450" height="450"></canvas>
			<div class="options">
				<img class= "gameTitle"src="../img/TicTacToe.png">
				
				<h2>Play Versus</h2>
				<div class="computer">COMPUTER</div>
				<div class="friend">FRIEND</div>

				<h2>Symbol</h2>
				<div class="x">X</div>
				<div class="o">O</div>

				<div class="play">PLAY</div>
			</div>
			<div class="gameover hide"></div>
		</div>
		<div class="center"><img src="../img/typhon-logo.png"></div>
	</div>
	<div class="background2">
		<img src="../img/bottomBorder.png"/>
	</div>
	
	<!-- GHQ Footer -->
	<div class="background"></div>
	<section class="footer-top-section" align="center">
		<img src="../img/footer-logo.png" alt="" >
		<p><i>" Community, friends & love make the gamer a creator. "<i></p>
			<footer class="footer-top-section">
		<div class="container">
			<div class="footer-left-pic">
				<img src="../img/footer-top-bg.png" alt="">
			</div>
			<div class="footer-right-pic">
				<img src="../img/footer-top-bg2.png" alt="">
			</div>
			<div class="header_social">
				<ul>
					<li><a href="https://www.twitch.tv/g_drianovski"><i class="fa fa-twitch" aria-hidden="true"></i></a></li>
					<li><a href="https://www.instagram.com/g_drianovski/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="https://twitter.com/drianovski"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</footer>
	</section>
	
		<!-- GHQ Footer -->
		<script src="../js/options.js"></script>
		<script src="../js/game.js"></script>
		<script src="../js/javascript.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>