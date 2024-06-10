<?php
session_start();
include 'connect_user.php';

if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
  $username = $_SESSION["username"];
  $sql = "SELECT * FROM users WHERE name='$username'";
  $result = mysqli_query($conn,$sql);
  $rowu = mysqli_fetch_assoc($result);
  $head = $rowu['head'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Donating details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.9.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>

  <!-- ======= Header ======= -->
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
        <h1 style="font-size:40px">Donation</h1>
        <p style="font-size:20px">You can see details here !</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- 搜索框 -->
    <div id="footer" style="background-color:white; padding-bottom: 50px;">
      <div class="col-lg-4 col-md-6 footer-newsletter">
        <form action="search.php" role="search" method="POST" style="position:absolute; left:40%; border:none">
        <div>
        <input type="text" name="keywords" style=" width: 500px; height: 40px; background:white; border: 3px solid grey; border-radius: 17px;">
        </div>
          <input type="submit" value="Search" style="right: 570px; width: 110px; height: 48px; font-size:18px; margin-top:3px">
        </form>
      </div>
    </div>


    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="row">
          
        <?php 
        $sqlbenificial = "SELECT * FROM individual WHERE display=1 UNION SELECT * FROM plant WHERE display=1 UNION SELECT * FROM relic WHERE display=1 UNION SELECT * FROM area WHERE display=1 UNION SELECT * FROM animal WHERE display=1;";
        $result = mysqli_query($conn,$sqlbenificial);
        while ($row=mysqli_fetch_array($result)){
        ?>
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">

              <div class="card-img">
                <img src="./donate/cover/<?php echo $row['cover'] ?>" style="height:400px; width:630px">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="<?php echo"details_detail.php?b_id=".$row['b_id'] ?><?php echo"&type=".$row['type']?>"><?php echo $row['title'] ?></a></h5>
                <p class="fst-italic text-center">Bailout Fund: <?php echo $row['total_money']?>￥</p>
                <p class="fst-italic text-center">Category:<?php echo $row['type'] ?></p>
                <p class="card-text"><?php echo $row['information'] ?></p>
              </div>
              <?php $_SESSION['id'] = $row['b_id'];?>
            </div>
          </div>
      <?php } ?>

    </section><!-- End Events Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Donate</h3>
            <p>
              UIC <br>
              Zhuhai, Guangdong<br>
              China <br><br>
              <strong>Phone:</strong> +86 17783210471<br>
              <strong>Email:</strong> r130026037@uic.edu.cn<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Donate Group</h4>
            <p>donation website for poverty-stricken and disaster religion</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Donate</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://uic.edu.cn/">UIC COMP3013 Donate Group</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>