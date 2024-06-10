<?php
session_start();
include 'connect_user.php';
$uname = $_POST["unamein"];
$passwd = $_POST["passwdin"];
$sql = "SELECT * FROM adm WHERE name='$uname'";
$resultin = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultin);
if($row['passwords'] == $passwd && $uname!='' && $passwd != ''){
    $_SESSION["aID"] = $row["a_id"];
    $_SESSION["login"] = true;
    $_SESSION["aname"] = $row["name"];
    $_SESSION["city"] = $row["city"];
    $_SESSION["gender"] = $row["gender"];
    $_SESSION["adpassword"] = $row["passwords"];
    header("location:ADMpage.php");
}
else{
    header("location:throw_error_adwrongnameorpassw.php");
}

?>