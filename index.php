<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shikshak Finder</title>
	<link rel="stylesheet" type="text/css" href="css/Navbar.css">
	<link rel="stylesheet" type="text/css" href="css/nfeed.css">
</head>
<body style="  background:fixed url(./image/bg1.jpg);background-size: 100%;">
<?php
 include ( "inc/connection.inc.php" );
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
	$utype_db = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = $con->query("SELECT * FROM user WHERE id='$user'");
		$get_user_name = $result->fetch_assoc();
			$uname_db = $get_user_name['fullname'];
			$utype_db = $get_user_name['type'];
}

//time ago convert
include_once("inc/timeago.php");
$time = new timeago();
?>
    <header>
<nav>
		  <div class="logo">
            <img src="./Image/logO.png" alt="Logo Image">
        </div>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <li><a href="home.php" >Students</a></li>
            <li><a href="search.php">Search Tutor</a></li>
			<?php 
			if($utype_db == "teacher")
				{

				}else {
					echo '<li><a class=" navlink" href="postform.php">Post</a></li>';
				}
			 ?>
						<?php
							if($user != ""){
								$resultnoti = $con->query("SELECT * FROM applied_post WHERE post_by='$user' AND student_ck='no'");
								$resultnoti_cnt = $resultnoti->num_rows;
								if($resultnoti_cnt == 0){
									$resultnoti_cnt = "";
								}else{
									$resultnoti_cnt = '('.$resultnoti_cnt.')';
								}
								echo '<div class="btn"><li><a href="notification.php"><button class="join-button">Notification'.$resultnoti_cnt.'</button></a>
								<a  href="profile.php?uid='.$user.'"><button class="join-button">'.$uname_db.'</button></a>
								<a  href="logout.php"><button class="join-button" >Logout</button></a>';
							}else{
								echo '<a href="login.php"><button class="join-button">Login</button></a>
								<a href="registration.php"><button class="join-button">Register</button></a></div></li>';
							}
						?>
			</div>
			</ul>
	</nav>
</header>
<div class="container" style="min-height: 30.8vw;">
        <div class="nbody">
            <div class="nfeedleft" >
                   
            </div>
        </div>
    </div>
<div class="footer">
    <footer>
        <center>
            <h2>Developed by : Team KAShI</h2><br>
            <a href="./contact.php">Contact Us</a>
        </center>
    </footer>
</div>
    </div>
<script src="./js/script.js"></script>
</body>
</html>
