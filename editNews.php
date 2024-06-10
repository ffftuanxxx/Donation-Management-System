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
?>
<html>

<a href='ADMpage.php?'>EditDonations</a>
</div>
<br>
<div class='c1'>
    <h2>Input News</h2>
    <form><textarea id='News' rows=10 cols=100></textarea><br><input type='button' value='Add to News'
            onclick="add()" /></form>

    <script>

        function add() {
            var content = document.getElementById("News").value;
            window.location.href = "addNews.php?News=" + content;
        }
    </script>

</html>
<?php
//news--------------------------------------------------------------------------------------------------------------------
$sql = "select * from news ORDER BY `news`.`n_id` ASC";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    echo "<h2>All News </h2>";
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
            echo "<td>" . $row[$f] . "</td>";
        }
        //a button to delete the book
        echo "<td><a href='deleteNews.php?n_id=$row[0]'> Delete it </td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<br>" . mysqli_num_rows($result) . " found";
} else {
    echo "0 results";
}
echo "</div>";
mysqli_close($conn);
}else{
    header("location:throw_error_adloginfirst.php");
}
?>