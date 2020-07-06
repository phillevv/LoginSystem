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
    
    
        <div class="container shadow p-5 mb-2 bg-light rounded">
            
                    
            <div class="form-group">
               <form class="form-inline pb-5 my-2 my-lg-0">
      <input class="form-control shadow" id="myInput" onkeyup="myFunction()" type="search" placeholder="Personnummer" aria-label="Sök">
    
  </form></div>
            <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2]
  
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
                
    
</script>


        <?php 
            
        $sql = "SELECT * FROM users where Ftag = '".$_SESSION['ftagnamn']."'";
$result = mysqli_query($conn, $sql);

            echo "<table border='1' id='myTable' class='table table-striped table-dark table-responsive-sm'>
            
           
<tr>
<th>Förnamn</th>
<th>Efternamn</th>
<th>Person</th>
</tr>";

while($row = mysqli_fetch_array($result))
{

    
echo "<tr>";
    echo "<form method='get' action='getdatahours.php'>";
echo "<td>" . "<button class='btn btn-info' type='submit'>". $row['fnamn'] ."</button>" .  "<input type='text' value='$row[fnamn]' name='fnamn' hidden>"."</td>";
echo "<td>" . $row['enamn'] . "</td>";
echo "<td>" . $row['pnummer'] ."<input type='text' value='$row[pnummer]' name='pnummer' hidden>" . "</td>";
      echo "</form>";

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