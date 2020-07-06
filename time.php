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

<body class="bg-dark">
    
    
        <?php

require_once('db.php');


$sql = "INSERT INTO person (id,pnummer, fnamn, enamn, tidin, tidut, dag)
VALUES ('1',".$_SESSION['username'].", '1', '1','1','1','1')";

if ($conn->query($sql) === TRUE) {
 
} else {
  
}

?>
    
    
    
    <?php include('headerloggedin.php'); ?>
    
        <div class="container shadow p-5 bg-light rounded">
            
            
                            <?php 
            
$sql = "SELECT * FROM person where pnummer = ".$_SESSION['username']." ORDER BY tidut ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      
      if($row['tidut'] == 0)  {
    
          require_once('formtidut.php');
      }
      
      else if($row['tidut'] !== 0 ) {
           require_once('formtidin.php');
      
      }
      
      else {
        return true;
      }
  
  }
};
?>
    
            
            
            
  </div>
    
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                  
    
    <script>
      $(function () {

        $('#myForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'timelog.php',
            data: $('#myForm').serialize(),
            success: function () {
          
            }
          });

        });

      });
    </script>
    
                <script>
      $(function () {

        $('#myForm2').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'timeout.php',
            data: $('#myForm2').serialize(),
            success: function () {
          
            }
          });

        });

      });
                         
                         
    </script>
    
    
    
    <script>
  $(document).ajaxStop(function() {
        setInterval(function() {
            location.reload();
        }, 100);
    });
    
    
    </script>

    
    <script>
        
$(document).ready(function(){
  $("#submitbtn1").click(function(){
    $("#myForm").hide();
  });
  $("#submitbtn1").click(function(){
    $("#myForm2").show();
  });
});
</script>
    
    
        <script>
        
$(document).ready(function(){
  $("#submitbtn2").click(function(){
    $("#myForm").show();
  });
  $("#submitbtn2").click(function(){
    $("#myForm2").hide();
  });
});
</script>
    </body>
    </html>