<?php

include "03_connectDB.php";

$n_id = $_GET['n_id'];

//FIXME: Complete the sql for updating the status to disabled

        $sql = "DELETE FROM news WHERE n_id='$n_id'";



$result = mysqli_query($conn, $sql);

$url = "editNews.php";
if($result>0){
	header('Location:'.$url);
}else{
    echo "<script> alert('update failed.') </script> ";
    header('Location:'.$url);
}


?>