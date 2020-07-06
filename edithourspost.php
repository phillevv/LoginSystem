<?php
session_start();
if(!isset($_SESSION['pnummer'])){
    header('location: logincompany.php');
}
require_once('db.php');
?>

<?php

require_once('db.php');



$sql = "UPDATE person SET datumin='$_POST[nytidin]', datumut='$_POST[nytidut]' , NytidBesk='$_POST[nytidBesk]' ,tidin='$_POST[nytidin]', tidut='$_POST[nytidut]' WHERE id ='$_POST[id]' ";

if ($conn->query($sql) === TRUE) {
    header("location:edithours.php?id=$_POST[id] ");
} else {
  echo "Error updating record: " . $conn->error;
}

?>