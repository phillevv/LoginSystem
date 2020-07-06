    <?php

require_once('db.php');

date_default_timezone_set("Europe/Stockholm");
$datein = date("d-m-Y H:i:s"); 
$dateout = date("d-m-Y H:i:s"); 
$dag = date("j");
$monad = date("n");
$time = date("H:i:s"); 
$name = trim($_POST['namn']);
$pnum = trim($_POST['pnummer']);
$ename = trim($_POST['enamn']);
$tidin = date("Y-m-d H:i:s"); 

$sql = "INSERT INTO person (pnummer, fnamn, enamn, tidin, tidut, dag, monad, datumin, datumut,NytidBesk)
VALUES ('$pnum', '$name', '$ename','$tidin','0','$dag','$monad','$datein','$datein','')";

if ($conn->query($sql) === TRUE) {
  header('location:time.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>