<?php
session_start();
include 'connect_user.php';
 $username = $_POST["uname"];
 $pwd = $_POST["passwd"];
 $pwd2 = $_POST["passwd2"];
 $address = $_POST["address"];
 $gender = $_POST["gender"];

 if($pwd != $pwd2){
   $_SESSION["uname"] = $_POST["uname"];
    $url = "throw_error_wrongtwopass.php";
    header("location:".$url);
 }
 else if($username=='' || $pwd=='' || $gender =='' || $address=''){
    header("location:throw_error_emptysignupinfor.php");
 }
 else{
   if (isset($_FILES['head'])) {
      $errors = array();
      $file_name = $_FILES['head']['name']; // actual file name
      $file_size = $_FILES['head']['size']; // file byte size
      $file_tmp = $_FILES['head']['tmp_name']; // temp file
      $file_type = $_FILES['head']['type']; // file MIME type
   
      $tagArr = explode('.', $_FILES['head']['name']);
      $file_ext = strtolower(end($tagArr));
      $extensions = array("jpeg", "jpg", "png");
   
      if (in_array($file_ext, $extensions) === false) {
         $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
     }
     if ($file_size > 6291456) {
      $errors[] = 'File size must be excately < 6 MB';
   }
   if (empty($errors) == true){
      $newhead = strtolower(reset($tagArr)."_".time().".".strtolower(end($tagArr)));
      move_uploaded_file($file_tmp,"head/".$newhead);
   }
    }

    $sql = "INSERT INTO users (city,gender,name,passwords,head) VALUES ('$address','$gender','$username','$pwd','$newhead')";
    $result = mysqli_query($conn, $sql);

    $urlmain = "login.php";
    header("location:".$urlmain);
 }
 
if(!$result){
	echo("fail to insert data");
}else{
	echo("sucess in insert data");
}
?>