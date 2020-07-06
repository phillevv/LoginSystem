<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
require_once('db.php');
?>

<?php

require_once('db.php');

$time = date("H:i:s"); 

$dateout = date("d-m-Y H:i:s"); 
$tidut = date("Y-m-d H:i:s"); 

$sql = "UPDATE person SET tidut='$tidut', datumut='$dateout' WHERE tidut = '0' AND pnummer = ".$_SESSION['username']."";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

?>