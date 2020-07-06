<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
require_once('db.php');
?>    

<head>
                 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">
    </head>


<!-- Modal -->
<div class="modal hide" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">      <h3 class="badge-secondary m-2 p-2"><?php echo $_GET['day']; echo " " . $_GET['month']; echo " " . $_GET['year'];  ?></h3></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-group">
     

    <input type="text" class="form-control" name="date" hidden value="<?php echo $_GET['day']; ?>">
      <input type="text" class="form-control" name="date" hidden value="<?php echo $_GET['day']; ?>">
      
            
                            <?php 
            
$sql = "SELECT pschema.pnummer,users.pnummer,pschema.fnamn,users.fnamn,pschema.dag as day,pschema.monad as monad,pschema.year as year,pschema.tidin as tidin,users.Ftag as Ftag
FROM pschema
INNER JOIN users
ON users.pnummer=pschema.pnummer WHERE users.pnummer = '".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);
       
     echo "Jobbar: " ."<br>";

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      
      if($row['day'] ==  $_GET['day'] && $row['monad'] == $_GET['month'])  {
    
          echo "<button type='button' class='btn btn-primary'><i class='fas fa-user-check'></i>" . " " . $row['fnamn'] . "</button>"." ";
      }
  
  }
};
?>
      
    
  </div>
  <button type="submit" class="btn btn-success" onclick="goBack()">Klar</button>

      </div>

    </div>
  </div>
</div>
   <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#exampleModal').modal('show');
});
</script>

<script>
function goBack() {
  window.history.go(-1);
}
</script>


<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>