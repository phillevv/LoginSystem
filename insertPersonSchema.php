

    <?php

require_once('db.php');

date_default_timezone_set("Europe/Stockholm");

$name = trim($_POST['fnamn']);
$pnum = trim($_POST['pnummer']);
$ename = trim($_POST['enamn']);
$day = trim($_POST['day']);
$month = trim($_POST['month']);
$year = trim($_POST['year']);

$sql = "INSERT INTO pschema (fnamn,enamn,pnummer,dag,monad,year,tidin,tidut,Fulldate)
VALUES ('$name', '$ename', '$pnum','$day','$month','$year','','','$month-$day-$year')";

if ($conn->query($sql) === TRUE) {
   echo '<body onload="goBack()"></body>';
} else {
  //echo //"Error: " . $sql . "<br>" . $conn->error;
   echo '<body onload="goBack()"></body>';
}

?>

<script>
function goBack() {
  window.history.go(-1);
}
</script>