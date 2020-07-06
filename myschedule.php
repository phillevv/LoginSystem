<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
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
    
    <?php include('headerloggedin.php'); ?>
    
        <div id="formToggle" class="container shadow p-5 mb-2 bg-light rounded">
            
                        <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="calendaremployees.php?timeStamp=">Kalender</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active"  href="scheduletable.php">Tabell</a>
  </li>
</ul>
            
            

            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            
                    <?php 
             $day= date("d");
      $month = date("m");
            
               $year = date("Y");
    
        
      
           
        $sql = "SELECT * FROM pschema where monad >= '$month' and dag >= '$day' and year >= '$year' and pnummer = ".$_SESSION['username']." ORDER BY monad,dag ASC LIMIT 1";
$result = mysqli_query($conn, $sql);
            
    date_default_timezone_set("Europe/Stockholm");
            
            
            $today = date("d-m-Y");
             $tomorrow = date("d-m-Y", strtotime("+1 day"));
               $everyotherday = date("d", strtotime("+2 day"));
        
           
          
           


while($row = mysqli_fetch_array($result))
{
    
    $dates = $row['dag'] . "-". $row['monad']. "-" .$row['year'];
    
$datetime1 = new DateTime(date("d-m-Y"));
$datetime2 = new DateTime($dates);
$interval = $datetime1->diff($datetime2);


    
    if( $row['dag'] . "-"  .$row['monad'] . "-" . $row['year'] == $today) {

          echo "<div class='text-center'><h4 class='text-dark '>Nästa Arbetsdag</h4><h5 class='text-dark'>Idag</h5> <p>" . $row['dag'] . "-". $row['monad'] . "</p></div>";
        
    }
    
       else if ($row['dag'] . "-"  .$row['monad'] . "-" . $row['year'] == $tomorrow) {
           echo "<div class='text-center'><h4 class='text-dark '>Nästa Arbetsdag</h4><h5 class='text-dark'>Imorgon</h5> <p>" . $row['dag'] . "-". $row['monad'] . "</p></div>";
       }
    
    else {
           echo "<div class='text-center'><h4 class='text-dark '>Nästa Arbetsdag</h4><h5 class='text-dark'>om</h5><h5 class='text-dark'>" . $interval->format('%a dagar') . "</h5> <p>" . $row['dag'] . "-". $row['monad'] . "</p></div>";
    }


    
}
           

?>
    

            


        <?php 
            
            date_default_timezone_set("Europe/Stockholm");
            
                       $date= date("m-d-Y");
    

           
        $sql = "SELECT * FROM pschema where Fulldate >= '$date' and pnummer = ".$_SESSION['username']." ORDER BY Fulldate ASC";
$result = mysqli_query($conn, $sql);
            

            echo "<table border='1' id='myTable' class='table table-striped table-dark'>
           
<tr>
<th>Förnamn</th>
<th>Efternamn</th>
<th>Datum</th>
<th>Tid in</th>
</tr>";

while($row = mysqli_fetch_array($result))
{

    
echo "<tr>";
echo "<td>" . $row['fnamn'] . "</td>";
echo "<td>" . $row['enamn'] . "</td>";
echo "<td>" . $row['dag'] ."-". $row['monad']  ."-". $row['year'] . "</td>";
echo "<td>" . $row['tidin'] . "</td>";
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