<?php
session_start();
include 'connect_user.php';

if(isset($_SESSION["aname"]) && isset($_SESSION["adpassword"]) && $_SESSION["aname"] && $_SESSION["adpassword"]){

?>

<html>
<style media="screen">
    h1 {

        width: 300px;

        height: 150px;

    }

    .c1 {


        border: solid;
        background: #F8F8FF;
    }

    .c0 {
        border: solid;
        background-color: linen;
    }
</style>

</html>
<?php
echo "<div class='c0'>";
// $status = '';
include "03_connectDB.php";
echo "<h2 align='center'>Administrator PAGE</h2>";
//alert-information------------------------------------------------------------------------------------------------------
echo "<a href='editNews.php?'>EditNews</a>";
echo "<br>";

echo "<a href='Aanimal.php'><input type='button' value='animal'></a>&emsp;";
echo "<a href='Aarea.php'><input type='button' value='area'></a>&emsp;";
echo "<a href='Arelic.php'><input type='button' value='relic'></a>&emsp;";
echo "<a href='Aplant.php'><input type='button' value='plant'></a>&emsp;";
echo "<a href='Aindividual.php'><input type='button' value='individual'></a>&emsp;";
echo "</div>";

echo "<br>";

}else{
    header("location:throw_error_adloginfirst.php");
}
?>
