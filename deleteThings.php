<?php

include "03_connectDB.php";

$b_id = $_GET['b_id'];

//FIXME: Complete the sql for updating the status to disabled
switch ($_GET['table']) {
    case 1:
        $sql = "DELETE FROM animal WHERE b_id='$b_id'";
        break;
    case 2:
        $sql = "DELETE FROM plant WHERE b_id='$b_id'";
        break;
    case 3:
        $sql = "DELETE FROM individual WHERE b_id='$b_id'";
        break;
    case 4:
        $sql = "DELETE FROM area WHERE b_id='$b_id'";
        break;
    case 5:
        $sql = "DELETE FROM relic WHERE b_id='$b_id'";
        break;
}


$result = mysqli_query($conn, $sql);

$url = "ADMpage.php";
if($result>0){
    switch ($_GET['table']) {
        case 1:
            header('Location:Aanimal.php');
            break;
        case 2:
            header('Location:Aplant.php');
            break;
        case 3:
            header('Location:Aindividual.php');
            break;
        case 4:
            header('Location:Aarea.php');
            break;
        case 5:
            header('Location:Arelic.php');
            break;
    }
}else{
    echo "<script> alert('update failed.') </script> ";
    header('Location:'.$url);
}


?>