<?php
    $b_id = $_GET['id'];
    $type = $_GET['type'];
	session_start();
    $id=$_SESSION["username"];
    $title = $_POST["title"];  
    $content = $_POST["content"];  
    $ip = $_SERVER["REMOTE_ADDR"];
	require_once "connet.php";
    require_once 'mysqlconfig.php';
    $ma1=new DB();
    $link=$ma1->connect();
    $sql = "insert into comment (b_id,name,title,ip,date,message) values('$b_id','$id','$title','$ip',now(),'$content')";
//	echo $sql;die;
    if($title!=null){
		    $res = $ma1->insertl($link,$sql);
            echo "<script>location='details_detail_show.php?b_id=$b_id&type=$type';</script>"; 
	};
	if($title==null){
	    echo "<script>alert('Please enter the subject of your message!');location='details_detail_show.php?b_id=$b_id&type=$type';</script>";
	};
    ?>
