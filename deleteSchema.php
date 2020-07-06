

    <?php

require_once('db.php');

$pnum = trim($_POST['pnummer']);

$date = trim($_POST['day']);

$sql = "DELETE FROM pschema WHERE dag = '$date' AND pnummer = '$pnum'";

if ($conn->query($sql) === TRUE) {
   echo '<body onload="goBack()"></body>';
} else {
  //echo //"Error: " . $sql . "<br>" . $conn->error;
    echo '<br><br><button onClick="goBack()">Tillbaka</button>';
}

?>

<script>
function goBack() {
  window.history.go(-1);
}
</script>