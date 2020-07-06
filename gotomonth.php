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
            
               <form method="get" action="gotomonth.php">
                       
                
                   
                                   <ul id="navtabs" class="nav nav-tabs">
                                       <input name="pnummer" value="<?php echo $_GET['pnummer']; ?>" hidden>
  <li class="nav-item">
    <button class="nav-link" name="monad" value="1" type="submit">Januari</button>
  </li>
  <li class="nav-item">
    <button  class="nav-link" name="monad" value="2" type="submit">Februari </button>
  </li>
                    <li class="nav-item">
    <button class="nav-link" name="monad" value="3" type="submit">Mars</button>
  </li>
                    <li class="nav-item">
    <button class="nav-link" name="monad" value="4" type="submit">April</button>
  </li>
                        <li class="nav-item">
    <button class="nav-link" name="monad" value="5" type="submit">Maj</button>
  </li>
                        <li class="nav-item">
    <button class="nav-link" name="monad" value="6" type="submit">Juni</button>
  </li>
                        <li class="nav-item">
    <button class="nav-link" name="monad" value="7" type="submit">Juli</button>
  </li>
                        <li class="nav-item">
    <button class="nav-link" name="monad" value="8" type="submit">Augusti</button>
  </li>
                                    <li class="nav-item">
    <button class="nav-link" name="monad" value="9" type="submit">September</button>
  </li>
                                                           <li class="nav-item">
    <button class="nav-link" name="monad" value="10" type="submit">Oktober</button>
  </li>
                                <li class="nav-item">
    <button class="nav-link" name="monad" value="11" type="submit">November</button>
  </li>
                                    <li class="nav-item">
    <button class="nav-link" name="monad" value="12" type="submit">December</button>
  </li>
</ul>
          </form>         <br>
            
            
                       <?php 
            

            
        $sql = "SELECT * FROM person where pnummer = '$_GET[pnummer]' and monad = '$_GET[monad]' LIMIT 1";
$result = mysqli_query($conn, $sql);

            echo "<table border='1' class='table table-striped table-dark'>

           
<tr>
<th>Person</th>
<th>Totalt</th>
</tr>";
            
$b = 0;
while($row = mysqli_fetch_array($result))
{
    
$start_date = new DateTime($row['datumin']);
$since_start = $start_date->diff(new DateTime($row['datumut']));

    
echo "<tr>";

echo "<td>" . $row['fnamn'] ." " . $row['enamn']. " " . $row['pnummer']. " " . "</td>";
echo "<td>" .    "<div id='result'></div>" . "</td>";

    
    
    
    $b += $since_start->h;

echo "</tr>";
    
    
}

$sampleArray = array( $b );
            
echo "</table>";
            
            
            
            
        ?>
                    <?php 
            

            
        $sql = "SELECT * FROM person where pnummer = '$_GET[pnummer]' and monad = '$_GET[monad]' ORDER BY tidin desc";
$result = mysqli_query($conn, $sql);

            echo "<table border='1' class='table table-striped table-dark'>

           
<tr>
<th>Person</th>
<th>Datum</th>
<th>Timmar</th>
</tr>";
            
$b = 0;
while($row = mysqli_fetch_array($result))
{
    
$start_date = new DateTime($row['datumin']);
$since_start = $start_date->diff(new DateTime($row['datumut']));

    
echo "<tr>";

echo "<td>" . $row['fnamn'] ." " . $row['enamn']. " " . $row['pnummer']. " " . "</td>";
echo "<td>" . $row['dag'] . "/" .  $row['monad'] . "</td>";
echo "<td>". $since_start->h.'.' .  $since_start->i.'' . "</td>";  
    
    
    
    $b += $since_start->h;

echo "</tr>";
    
    
}

$sampleArray = array( $b );
            
echo "</table>";
?>
<script>
    
    var passedArray =  
    <?php echo json_encode($sampleArray); ?>; 
    
    
const sum = [passedArray].reduce(add);

function add(accumulator, a) {
    return accumulator + a;
}

console.log(sum);
    
      document.getElementById("result").innerHTML = sum;
            
            </script>



    </div>
    




<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>