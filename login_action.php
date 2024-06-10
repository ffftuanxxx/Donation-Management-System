<?php
session_start();
include 'connect_user.php';
$uname = $_POST["unamein"];
$passwd = $_POST["passwdin"];
$sql = "SELECT * FROM users WHERE name='$uname'";
$resultin = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultin);
if($row['passwords'] == $passwd && $uname!='' && $passwd != ''){
    $_SESSION["ID"] = $row["u_id"];
    $_SESSION["login"] = true;
    $_SESSION["username"] = $row["name"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["city"] = $row["city"];
    $_SESSION["gender"] = $row["gender"];
    $_SESSION["funds"] = $row["funds"];
    $urlmain = "index.php";
    $_SESSION["password"] = $row["passwords"];
    header("location:".$urlmain);
}
else{
    header("location:throw_error_wrongnameorpassw.php");
}

?>