<?php
 include 'connect_user.php';
 $sql = "SELECT information FROM news";
 $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
  	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="description">
		<meta content="" name="keywords">
		<link href="assets/img/favicon.png" rel="icon">
		<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
		<link href="assets/vendor/aos/aos.css" rel="stylesheet">
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
		<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<script>
		window.onload=function(){
			var btn = document.getElementById("closebutton"); 
			btn.onclick = function(){
				document.getElementById("xuanfudiv").style.display ="none";    
			}
		}
		</script>  
	</head>
<body>

<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Donate</a></h1>
      <!-- use an image logo -->
      <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
      <a href="index.php" class="logo me-auto"><img src="head/<?php echo $head?>" alt="" class="img-fluid"></a>
      <?php } ?>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="notification.php">Notification</a></li>
          <li><a href="about.php">About</a></li>
		  <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
          <li><a href="upload.php">Upload</a></li>
          <?php }else{ ?>
          <li><a href="throw_error_loginfirst.php">Upload</a></li>
          <?php } ?>
          <li class="dropdown"><a href="details.php"><span>Details</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="details_people.php">People</a></li>
              <li><a href="details_religion.php">Religion</a></li>
              <li><a href="details_relic.php">Relic</a></li>
              <li><a href="details_animal.php">Animal</a></li>
              <li><a href="details_plant.php">Plant</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
        <a href="logout.php" class="get-started-btn">Logout</a>
      <?php }else{ ?>
        <a href="login.php" class="get-started-btn">Get Started</a>
        <?php } ?>
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h1 style="font-size:40px">Notification</h1>
      </div>
    </div>

	<div class="card" style="position: absolute; left:19.5%; width:60%; min-height:60%; height:auto; margin-top: 80px;box-shadow: 1px 4px 2px 1px rgba(0, 0, 0, 0.2), -10px 6px 20px 2px rgba(0, 0, 0, 0.19);">
        <div class="card-body">
			<div id="xuanfudiv" style="position: relative; background-color: white; z-index: 3;margin: auto; width: 70%;height: 90%;">	
				<div style="margin:0; padding: 0; ">
					<!--关闭按钮-->
					<input id="closebutton" type ="button" style="position: absolute; top: 2px;right: 2px; border: none; border-radius: 30px; background-color: white;"value="X" hover="background-color: grey" onclick="javascript:JihuaShowObj('jihuaFrame','jihuaContent')"/>
				</div>
				<div style="text-align: center; padding-top: 40px;;">
						<!--公告-->
					<div>
						<h3>Attention!</h3>
					</div>
						<!--内容-->
					<div style="text-align: left;text-indent:30px;padding-top: 15px;">
              <?php
                $code = 1;
                while($row=mysqli_fetch_array($result)){
              ?>   
              <?php
                  echo "<p>";
                  echo $code++."、";
                  echo $row['information']; 
                  echo "</p>";
                }               
              ?>                   
					</div>

				</div>
			</div>
        </div>
    </div>
</main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
