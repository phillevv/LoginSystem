<?php
session_start();
if(!isset($_SESSION['ftagnamn'])){
    header('location: logincompany.php');
}
require_once('db.php');
?>

    <head>
        
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
              <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">
    </head>


   
    <?php include('headercompany.php'); ?>

      <div id="formToggle" class="container shadow p-5 mb-2 bg-light rounded">

    
              
                    <?php 
            
$sql = "SELECT * FROM person WHERE id = '$_GET[id]' ";
$result = mysqli_query($conn, $sql);

                 echo "<table border='1' id='myTable' class='table table-striped table-dark table-responsive-md'>
           
<tr>
<th>Förnamn</th>
<th>Efternamn</th>
<th>Datum</th>
<th>Tidin</th>
<th>Tidut</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $start_date = new DateTime($row['datumin']);
$since_start = $start_date->diff(new DateTime($row['datumut']));
    
echo "<tr>";
echo "<td id='fnamn'>" . $row['fnamn'] . "</td>";
    
echo "<td>" .  "<form method='post' action='edithourspost.php' > <input type='text' name='id' value='$row[id]' hidden>" . $row['enamn'] . "</td>";
echo "<td>" . $row['dag']."/".$row['monad']  . "</td>";
echo "<td>" . "<input type='text' name='nytidin' value='$row[datumin]' >"  . "</td>";
echo "<td>" . "<input type='text' name='nytidut' value='$row[datumut]' >"  . "</td>";

echo "</tr>";


          echo "<td>" . "<h6 class='text-white'>Anledning till redigering</h6>" . " <div class='input-group'>
           
  <input type='text' value='$row[NytidBesk]'  name='nytidBesk' class='form-control' placeholder='Fel tid' required>
  <div class='input-group-append'>

  </div>
</div>"  . "</td>";
                
 echo "<td>" . " <button type='submit' class='btn btn-primary m-3 p-3'>
 <i class='fas fa-edit'></i>Ändra
</button>" . "</td>";
    echo "</form>";
}
          
          
            
echo "</table>";
          

    
?>
              
          
</div>




<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
          
          
