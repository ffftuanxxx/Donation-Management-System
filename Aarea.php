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
$sql = "select * from area ORDER BY `area`.`b_id` ASC";
echo "<div class='c1'>";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<br>";
    echo "<h2 align='center'>All area </h2>";
    echo "<table class='table'>";
    echo "<table border='1'>";
    //print the heading of table
    echo "<tr>";
    //print each column name
    while ($property = mysqli_fetch_field($result)) { //print all the details
        echo "<th>" . $property->name . "</th>";
    }
    echo "<th> Delete donate</th>";
    //echo "<th> Change donate</th>";
    echo "</tr>";

    //get number of columns
    $fields = mysqli_num_fields($result);

    //Get each row data
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        for ($f = 0; $f < $fields; $f++) {
            if ($f == $fields - 7) {
                if ($row[$f] == null) {
                    //echo"<td>!</td>";
                    $f -= 3;
                    echo "<td>NO picture</td>";
                    $f += 3;
                } else {
                    //echo "<td>" . $row[$f] . "</td>";
                    echo "<td><img src='donate/QR/" . $row[$f] . "' height='90x' width='160px'></td>";
                }
            }else if($f == $fields - 6){
                if ($row[$f] == null) {
                    //echo"<td>!</td>";
                    $f -= 3;
                    echo "<td>NO picture</td>";
                    $f += 3;
                } else {
                    //echo "<td>" . $row[$f] . "</td>";
                    echo "<td><img src='donate/cover/" . $row[$f] . "' height='90x' width='160px'></td>";
                }

            } else {
                if ($f == $fields - 3) {
                    if ($row[$f] == 0) {
                        echo "<td><a href='enableThings.php?b_id=$row[0]&table=4'> enable it </a></td>";
                    } else if ($row[$f] == 1) {
                        echo "<td><a href='disableThings.php?b_id=$row[0]&table=4'style='color:red'> disable it </a></td>";
                    }
                } else {
                    echo "<td>" . $row[$f] . "</td>";
                }

            }
        }
        //a button to delete the book
        echo "<td><a href='deleteThings.php?b_id=$row[0]&table=4'> Delete it </td>";
        //echo "<td><a href='07_change_book.php?BookID=$row[0]'> Change it </td>";
        echo "</tr>";
    }

    echo "<br>" . mysqli_num_rows($result) . " found";
} else {
    echo "0 results";
}
echo "</div>";
echo "<br>";
mysqli_close($conn);
}else{
    header("location:throw_error_adloginfirst.php");
}
?>