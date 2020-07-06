<?php
session_start();
if(!isset($_SESSION['ftagnamn'])){
    header('location: logincompany.php');
}
require_once('db.php');
?>  




    <?php

require_once('db.php');

date_default_timezone_set("Europe/Stockholm");

$name = trim($_POST['fnamn']);
$pnum = trim($_POST['pnummer']);
$ename = trim($_POST['enamn']);
$day = trim($_POST['day']);
$month = trim($_POST['month']);
$year = trim($_POST['year']);

$sql = "INSERT INTO pschema (fnamn,enamn,pnummer,dag,monad,year)
VALUES ('$name', '$ename', '$pnum','$day','$month','$year')";

if ($conn->query($sql) === TRUE) {
   echo '<body onload="goBack()"></body>';
} else {
  //echo //"Error: " . $sql . "<br>" . $conn->error;
   echo '<body onload="goBack()"></body>';
}

?>

<?php


$sql = "UPDATE pschema SET tidin='$_POST[tidin]' WHERE dag = '$_POST[day]' AND monad = '$_POST[month]' AND year = '$_POST[year]' AND pnummer = '$_POST[pnummer]'";

if ($conn->query($sql) === TRUE) {
 echo '<body onload="goBack()"></body>';
} else {
   echo '<body onload="goBack()"></body>';
}

?>

<script>
function goBack() {
  window.history.go(-1);
}
</script>