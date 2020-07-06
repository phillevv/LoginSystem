<?php
session_start();
if(!isset($_SESSION['ftagnamn'])){
    header('location: logincompany.php');
}
require_once('db.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">
    </head>

<body>
    
    <?php include('headercompany.php'); ?>
    
        <div class="container shadow p-5 mb-2 bg-white rounded">


        <?php 
            
        $sql = "SELECT * FROM person where pnummer = '$_GET[pnummer]' and fnamn = '$_GET[fnamn]'";
$result = mysqli_query($conn, $sql);

            echo "<table border='1' class='table table-striped table-dark'>
            
           
<tr>
<th>Förnamn</th>
<th>Efternamn</th>
<th>Datum</th>
<th>Tid in</th>
<th>Tid ut</th>
<th>Totalt</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    
        $start_date = new DateTime($row['datumin']);
$since_start = $start_date->diff(new DateTime($row['datumut']));

    
echo "<tr>";

echo "<td>" . $row['fnamn'] . "</td>";
echo "<td>" . $row['enamn'] . "</td>";
echo "<td>" . $row['dag']."/" . $row['monad']  . "</td>";
echo "<td>" . $row['tidin'] . "</td>";
echo "<td>" . $row['tidut'] . "</td>";
    echo "<td>". $since_start->h.'.' .  $since_start->i.'' . "</td>";  

echo "</tr>";
  
    
    
}
            
echo "</table>";
?>


    </div>



<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>