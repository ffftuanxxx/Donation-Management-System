<?php
    session_start();
    include 'connect_user.php';
    $num = $_POST['fundnumber'];
    $id = $_GET['id'];
    $type = $_GET['type'];
        $userID = $_SESSION["ID"];
        // $userID = $_SESSION["ID"];
        $sql = "update users set funds=$num+(select funds from users where u_id = $userID) where u_id = $userID";
        $result = mysqli_query($conn,$sql);     
        $sql = "update $type set donor_number=$num+(select donor_number from $type where b_id = $id) where b_id = $id";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Thanks for your kindess');location='details_detail.php?b_id=$id&type=$type';</script>";
?>


