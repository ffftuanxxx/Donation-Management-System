<?php

include "03_connectDB.php";

$b_id = $_GET['b_id'];


switch ($_GET['table']) {
    case 1:
        $sql = "UPDATE animal SET display=1 WHERE b_id=" . $b_id;
        break;
    case 2:
        $sql = "UPDATE plant SET display=1 WHERE b_id=" . $b_id;
        break;
    case 3:
        $sql = "UPDATE individual SET display=1 WHERE b_id=" . $b_id;
        break;
    case 4:
        $sql = "UPDATE area SET display=1 WHERE b_id=" . $b_id;
        break;
    case 5:
        $sql = "UPDATE relic SET display=1 WHERE b_id=" . $b_id;
        break;
}

//FIXME: Complete the sql for updating the status to enabled


$result = mysqli_query($conn, $sql);

$url = "ADMpage.php";
if ($result > 0) {
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
} else {
    echo "<script> alert('update failed.') </script> ";
    header('Location:' . $url);
}
