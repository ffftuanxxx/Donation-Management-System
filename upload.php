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
  <style>
    input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button { 
            -webkit-appearance: none; 
        }
        input[type="number"]{ 
            -moz-appearance: textfield; 
    }
  </style>
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
        <h1 style="font-size:40px">Upload</h1>
        <p style="font-size:20px">You can upload your beneficinary here!</p>
      </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
    <div id="footer" style="background-color:white; padding-bottom: 50px;">
      <div class="col-lg-4 col-md-6 footer-newsletter">
        <form action="upload_action.php" method="POST" style="position:absolute; left:35%; border:none" enctype="multipart/form-data">
        <div>
        <i style="font-size:30px;">Title:  </i>
        <input type="text" name="title" style=" width: 300px; height: 40px; background:white; border: 2px solid grey; border-radius: 17px;">
        </div>
        <div style="position:relative; top: 40px;">
        <i style="font-size:30px;">Detail information: </i>
        <textarea name="information" rows="10" cols="20" style=" width: 400px; height: 40px; background:white; border: 2px solid grey; border-radius: 17px;"></textarea>
        </div>
        <div style="position:relative; top: 80px;">
        <i style="font-size:30px;">Total money: </i>
        <input type="number" name="total_money" style=" width: 400px; height: 40px; background:white; border: 2px solid grey; border-radius: 17px;">
        </div>
        <div style="position:relative; top: 120px;">
        <p style="font-size:30px;"><i>Type:</i></p>
        <select style="position: relative; left:120px; top:-48px; width:200px; height: 35px; border: 2px solid grey; border-radius: 17px;" name="category" id="category" value="">
                    <option value="individual">People</option>
                    <option value="animal">Animal</option>
                    <option value="plant">Plant</option>
                    <option value="relic">Relic</option>
                    <option value="area">Area</option>
                    </select><br>
        </div>
        <div style="position:relative; top: 120px;">
            <i style="font-size:30px;">Cover: &nbsp</i>
            <input type="file" name="cover" style=""><br>
        </div>  
        <div style="position:relative; top: 160px;">
            <i style="font-size:30px;">QR_code: &nbsp</i>
            <input type="file" name="QR_code"><br>
        </div>
          <input type="submit" value="Submit" style="position:relative; top: 200px; width: 110px; height: 48px; font-size:18px; margin-top:3px">
        </form>
      </div>
    </div>

    </section><!-- End Events Section -->

  </main><!-- End #main -->
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