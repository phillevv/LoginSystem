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
        
   <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- CSS only -->
             <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
<link rel="stylesheet" type="text/css" href="style.css">
    </head>

<body>
    
    <?php include('headercompany.php'); ?>
    
        <div id="formToggle" class="container shadow p-5 mb-2 bg-light rounded">
        
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
        
            
           
        $sql = "SELECT users.pnummer, person.pnummer, users.Ftag,person.tidin,person.tidut,person.dag,person.datumin,person.datumut,person.fnamn,person.enamn,person.monad,person.NytidBesk,person.id
FROM users
INNER JOIN person
ON users.pnummer=person.pnummer where Ftag = '".$_SESSION['ftagnamn']."' AND monad BETWEEN 1 AND 12 ORDER BY tidin desc";
$result = mysqli_query($conn, $sql);
            

            echo "<table border='1' id='myTable' class='table table-striped table-dark table-responsive-lg'>
          
           
<tr>
<th onclick='sortTable(0)'>Förnamn <a href='#' class='ml-2'> <i id='aup' class='fas fa-arrow-up'> </i> </a>  <a href='#'> <i id='adown' class='fas fa-arrow-down'></i> </a></th>
<th onclick='sortTable(1)'>Efternamn <a href='#' class='ml-2'> <i id='aup' class='fas fa-arrow-up'> </i> </a>  <a href='#'> <i id='adown' class='fas fa-arrow-down'></i> </a></th>
<th onclick='sortTable(2)'>Person <a href='#' class='ml-2'> <i id='aup' class='fas fa-arrow-up'> </i> </a>  <a href='#'> <i id='adown' class='fas fa-arrow-down'></i> </a></th>
<th onclick='sortTable(3)'>Datum <a href='#' class='ml-2'> <i id='aup' class='fas fa-arrow-up'> </i> </a>  <a href='#'> <i id='adown' class='fas fa-arrow-down'></i> </a></th>
<th onclick='sortTable(4)'>Tid in <a href='#' class='ml-2'> <i id='aup' class='fas fa-arrow-up'> </i> </a>  <a href='#'> <i id='adown' class='fas fa-arrow-down'></i> </a></th>
<th onclick='sortTable(5)'>Tid ut <a href='#' class='ml-2'> <i id='aup' class='fas fa-arrow-up'> </i> </a>  <a href='#'> <i id='adown' class='fas fa-arrow-down'></i> </a></th>
<th onclick='sortTable(6)'>Totalt <a href='#' class='ml-2'> <i id='aup' class='fas fa-arrow-up'> </i> </a>  <a href='#'> <i id='adown' class='fas fa-arrow-down'></i> </a> </th>
<th>Redigerad</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    $start_date = new DateTime($row['datumin']);
$since_start = $start_date->diff(new DateTime($row['datumut']));
    
echo "<tr>";
    echo  " <form method='get' action='gotohours.php'> ";
echo "<td id='fnamn'>" . "<button type='submit' class='btn btn-primary'>
 <i class='fas fa-user-clock'></i> " . $row['fnamn'] ."</button>" ."<input type'text' name='id' value='$row[id]' hidden>" . "</td>";
echo "<td>"  . $row['enamn'] . "</td>";
echo "<td>" . $row['pnummer'] . "</td>";
echo "<td>" . $row['dag']."/" . $row['monad']  . "</td>";
echo "<td>" . $row['tidin'] .  "</td>";
echo "<td>" . $row['tidut'] . "</td>";
echo "<td>". $since_start->h.'.' .  $since_start->i.'' . "</td>";
  if($row['NytidBesk'] == NULL) { echo "<td>" . "". "</td>"; } else { echo "<td>" . "Ja". "</td>"; }
echo "</tr>";
  
echo "</form>";    
    
}
            
echo "</table>";

    
?>
            
            
            <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
            



    </div>


<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>