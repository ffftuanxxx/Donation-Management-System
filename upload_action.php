<?php
session_start();
include 'connect_user.php';
if(isset($_SESSION["username"]) && isset($_SESSION["password"]) && $_SESSION["username"] && $_SESSION["password"]){
    $usernameu = $_SESSION["username"];
    $passwordu = $_SESSION["password"];
    $title = $_POST["title"];
    $information = $_POST["information"];
    $total_money = $_POST["total_money"];
    $category = $_POST["category"];

    if(($title=="" || $information=="" || $total_money=="" || $category=="")){
        header("location:throw_error_uploadempty.php");
    }
    else{
        if (isset($_FILES['cover'])) {
    $errors = array();
    $file_name = $_FILES['cover']['name']; // actual file name
    $file_size = $_FILES['cover']['size']; // file byte size
    $file_tmp = $_FILES['cover']['tmp_name']; // temp file
    $file_type = $_FILES['cover']['type']; // file MIME type
 
    $tagArr = explode('.', $_FILES['cover']['name']);
    $file_ext = strtolower(end($tagArr));
    $extensions = array("jpeg", "jpg", "png");
 
    if (in_array($file_ext, $extensions) == false) {
       $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
   }
   if ($file_size > 6291456) {
    $errors[] = 'File size must be excately < 6 MB';
 }
 if (empty($errors) == true){
    $cover = strtolower(reset($tagArr)."_".time().".".strtolower(end($tagArr)));
    move_uploaded_file($file_tmp,"donate/cover/".$cover);
 }
  }
  if($cover==NULL){
    header("location:throw_error_uploadempty.php");
}

  if (isset($_FILES['QR_code'])) {

    $errors = array();
    $file_name = $_FILES['QR_code']['name']; // actual file name
    $file_size = $_FILES['QR_code']['size']; // file byte size
    $file_tmp = $_FILES['QR_code']['tmp_name']; // temp file
    $file_type = $_FILES['QR_code']['type']; // file MIME type
 
    $tagArr = explode('.', $_FILES['QR_code']['name']);
    $file_ext = strtolower(end($tagArr));
    $extensions = array("jpeg", "jpg", "png");
 
    if (in_array($file_ext, $extensions) == false) {
       $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
   }
   if ($file_size > 6291456) {
    $errors[] = 'File size must be excately < 6 MB';
 }
 if (empty($errors) == true){
    $QR_code = strtolower(reset($tagArr)."_".time().".".strtolower(end($tagArr)));
    move_uploaded_file($file_tmp,"donate/QR/".$QR_code);
 }
  }
  if($QR_code==NULL){
    header("location:throw_error_uploadempty.php");
}

    $sql = "insert into $category (donor_number,QR_code,cover,information,total_money,display,title,type)
    values (0,'$QR_code','$cover','$information','$total_money',0,'$title','$category')";
    $result = mysqli_query($conn,$sql);
    if ($result)
    echo "<script>alert('Added Successfully!')</script>";
    else echo "Failed to add, back to add again.<br>";
    ?>
<a href="upload.php">back to continue upload</a> or <a href="index.php">back to homepage</a>

<?php  } ?>

<?php   
}else{
    header("location:throw_error_loginfirst.php");
}
?>
