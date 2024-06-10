<?php
   $b_id = $_GET['b_id'];
   $type = $_GET['type'];
    header("content-type:text/html;charset=utf-8");
	session_start();
    require_once "connet.php";
    require_once 'mysqlconfig.php';
    $ma1=new DB();
    $link=$ma1->connect();
	$id = $_GET['id'];
	//session_start();
    //$id=$_SESSION["uid"];
    if($link){
       $sql="delete from comment where c_id =$id and b_id = '$b_id'";
	   //echo "$sql";
       $que=mysqli_query($link,$sql);
	   //echo $que;
		if($que){
		   echo "<script>alert('Delete successfully, return to the home page');location='details_detail_show.php?b_id=$b_id&type=$type';</script>";
		}else{
		   echo "<script>alert('Delete failed');location='details_detail_show.php?b_id=$b_id&type=$type'</script>";
		   exit;
		}
      }
    ?>