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

  <?php
    $id = $_GET['b_id'];
    $type = $_GET['type'];
    $sql = "select * from $type where b_id = $id;";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $lack = $row['total_money']-$row['donor_number'];
  ?>

    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Detail Information</h2>
        <p>Information for <?php echo $row['title'] ?></p>
      </div>
    </div>

    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="./donate/cover/<?php echo $row['cover'] ?>" class="img-fluid" style:" width:340px; height:650px;">
            <h3>Details<?php ?></h3>
            <p style="width:680px">
              <?php echo $row['information'] ?>
            </p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Type</h5>
              <p><?php echo $row['type'] ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Amount</h5>
              <p><?php echo $row['total_money'] ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Lack</h5>
              <p><?php echo $lack?></p>
            </div>
            
            <center>
            <br><br>
            <p><b style="font-size:20px">Donate Here:&nbsp&nbsp</b> 
            <?php if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){ ?>
            <button onclick = "window.location.href = '<?php echo"./donate.php?id=".$id ?><?php echo"&type=".$type?>'" style="border: 3px solid grey; border-radius: 17px; height:40px; width:80px; background-color: white">Donate</button>
            <?php }else{ ?>
              <button onclick = "window.location.href = 'throw_error_loginfirst.php'" style="border: 3px solid grey; border-radius: 17px; height:40px; width:80px; background-color: white">Donate</button>
            
          <?php } ?>
          </p>
          </center>          
          </div>
        </div><br><br><br>
        <!-- <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=1)" width="80%" color=#987cb9 SIZE=3> -->
      </div>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">


  <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="plugins/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick/slick-theme.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

  <link href="css/style1.css" rel="stylesheet">
<section class="blog section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8" style="left: 220px;">
 
<link rel="stylesheet" type="text/css" href="./css/index1.css">
</head>  
<body style="background-size:cover;" >  
<center>  
<h2>message board</h2> 
<input type = "button" value = "Add a message" onclick="location.href='<?php echo"details_detail_add.php?b_id=".$id ?><?php echo"&type=".$type?>'" class="button"/>
<input type = "button" value = "View your message" onclick="location.href='<?php echo"details_detail_show.php?b_id=".$id ?><?php echo"&type=".$type?>'" class="button"/>
<input type = "button" value = "All message" onclick="location.href='<?php echo"details_detail.php?b_id=".$id ?><?php echo"&type=".$type?>'" class="button"/>
<hr width = "70%"> 
</center>
   <?php  
    $con = @mysqli_connect("127.0.0.1","root","","donate"); 
    if(!$con){  
        die("Database connection error".mysqli_connect_error());  
    }  
    mysqli_query($con,"set names 'utf8'");  
    //显示每页的留言数  
    $pagesize = 8;  
    //确定页数p参数  
    @$p = $_GET['p']?$_GET['p']:1;  
    //数据指针  
    $offset = ($p-1)*$pagesize;  
    //查询本页现实的数据 
    if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $u_id=$_SESSION["username"];
    $query_sql = "select * from comment where name= '$u_id' and b_id = '$id' order by name desc limit $offset,$pagesize ";  
    # echo $query_sql;  
    $result = mysqli_query($con,$query_sql);  
    /*if (!$result) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }*/
    //循环输出  
    echo "<div style='margin-top:55px'>";
    while($res = mysqli_fetch_array($result)){
        echo "<div class='k'>";
        echo "<div class='ds-post-main'>";
        echo "<div class='ds-comment-body'>
        <span>{$res['name']}  on  {$res['date']}  Leave me a message</span>
        <span style='float:right'><a href = 'del.php?id=".$res['c_id']."&b_id=$id&type=$type'><input type='submit' class='button1' value='delete'></input></a></span>
        <p>Message subject : {$res['title']}  Message address : <span>{$res['ip']}</span></p>
        <hr width=450px> 
        <p>{$res['message']}</p></div><br>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    //分页代码  
    //计算留言总数  
    $count_result = mysqli_query($con,"select count(*) as count from comment where name= '$u_id' and b_id = '$id'");  
    $count_array = mysqli_fetch_array($count_result);  
   
    //计算总的页数  
    $pagenum = ceil($count_array['count']/$pagesize);  
    //echo '共',$count_array['count'],'条留言';  
    //echo '共',$pagenum,'页';
    echo "<center>";
    echo "<div style='display: inline-block;margin-right: 15px;margin-left:15px;'>",'total ',$count_array['count'],' message','</div>';  
    echo "<div style='display: inline-block;margin-right: 15px;margin-left:15px;'>",'total ',$pagenum,' page','</div>';  
  
    //循环输出个页数及链接  
    if($pagenum>1){  
        for($i = 1;$i<=$pagenum;$i++){  
            if($i == $p){  
                echo "<div style='background:#e8ffc4;width:25px;display: inline-block;margin-right: 10px;'>",$i,"</div>";
                  
            }else{  
                //echo  '<a href="show.php?p=',$i,'">',$i,'</a>';
                echo '<a href="details_detail_show.php?p=',$i,'&b_id=',$id,'&type=',$type,'">',"<div style='width:25px;display: inline-block;margin-right: 10px;background:#FF9D6F'>",$i,'</div>','</a>';
            }
        }
echo "<div style='display: inline-block;margin-right: 10px;'>",'Currently in ',$p, ' page',"</center></div>";
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "</div>";
?>
<?php }else{   ?>
  <meta   http-equiv = "refresh"  content = "0.1; url=throw_error_loginfirst2.php" >
  <?php } ?>
  

</main>
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