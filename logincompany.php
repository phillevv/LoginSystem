<?php
session_start();
if(isset($_SESSION['ftagnamn'])){
    header('location: welcomecompany.php');
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

       <?php include ('header.php'); ?>
    
<div id="products" class="album py-5 bg-light">
    
    <div class="container shadow p-3 mb-5 bg-white rounded">
        
        <ul class="nav nav-tabs">

  <li class="nav-item">
    <a class="nav-link" href="login.php">Logga in personal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="logincompany.php">Logga in företag</a>
  </li>
</ul>
        


                  <div id="Login" class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Logga in företag</h1>
  <p class="lead">Har du inget konto? Registrera <a href="registercompany.php" >här</a></p>
                        <small id="username" class="form-text text-muted">Dina uppgifter är alltid privata</small>
</div>
        <form id="myForm" method="post" action="loginformularcompany.php">
  <div class="form-group m-4">
    <label for="username">Företagsnamn</label>
    <input type="username" class="form-control" id="ftagnamn" aria-describedby="username" name="ftagnamn">
  </div>
  <div class="form-group m-4">
    <label for="password1">Lösenord</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <button type="submit" class="btn btn-primary m-4">Logga in</button>
</form>
        

        
        
        </div>
        </div>
    
    
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>