<?php

if(!isset($_SESSION['ftagnamn'])){
    header('location: logincompany.php');
}
require_once('db.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">
    </head>

<body>
    <div id="loggedin" class="text-center">
<div class="badge badge-dark p-1" id="p1"><h2 class="p-1"></h2>

        <?php 
        
         
           
        $sql = "SELECT users.pnummer, person.pnummer, users.Ftag,person.tidin,person.tidut,person.dag,person.datumin,person.datumut,person.fnamn,person.enamn,person.monad
FROM users
INNER JOIN person
ON users.pnummer=person.pnummer where Ftag = '".$_SESSION['ftagnamn']."' AND monad BETWEEN 1 AND 12 AND tidut = '0'";
$result = mysqli_query($conn, $sql);
            

    $new = date("d M H:i:s");
   echo "<h3><span class='badge badge-info p-2 mb-2'> $new </span></h3>";

    
            echo "<table border='1' id='myTable' class='table table-striped table-dark'>
           
<tr>
<th>Namn</th>
<th>Personnummer</th>
<th>Tid in</th>
<th><i class='far fa-clock'></i></th>
<th><i class='fas fa-user-check'></i></th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    
$start_date = new DateTime($row['datumin']);
$since_start = $start_date->diff(new DateTime(date("d-m-Y H:i:s")));
    
    
echo "<tr>";
echo "<td id='fnamn'>" . $row['fnamn'] ." " .  $row['enamn'] . "</td>";
echo "<td>" . $row['pnummer'] . "</td>";
echo "<td>" . $row['tidin'] . "</td>";
echo "<td>". $since_start->h.'.' .  $since_start->i.'' . "</td>";
echo "<td>" . '<div id="dot" ><i class="fas fa-circle"></i></div>'. "</td>";
echo "</tr>";
  
    
}
            
echo "</table>";

    
?>
 </div>   
    
</div>

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>