<?php

include "03_connectDB.php";

$News = $_GET['News'];


$sql = "insert into news(information) values ('".$News."');";


//FIXME: Complete the sql for updating the status to enabled


$result = mysqli_query($conn, $sql);

$url = "editNews.php";
if ($result > 0) {
    header('Location:' . $url);
} else {
    echo "<script> alert('update failed.') </script> ";
    header('Location:' . $url);
}
?>
