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
    <a class="nav-link" href="register.php">Registrera personal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="registercompany.php">Registrera företag</a>
  </li>
</ul>


                  <div id="Login" class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Registrera företag</h1>
  <p class="lead">Har du redan ett konto? Logga in <a href="logincompany.php" >här</a></p>
                        <small id="username" class="form-text text-muted">Dina uppgifter är alltid privata</small>
</div>
        
        
<form id="myForm" class="needs-validation" method="post" action="regformcompany.php" novalidate onsubmit="return validateForm()">
    
    <div class="form-row">
            <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Företagsnamn</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">
            <svg class="bi bi-building" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15.285.089A.5.5 0 0 1 15.5.5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5H1a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .418-.493l5.582-.93V3.5a.5.5 0 0 1 .324-.468l8-3a.5.5 0 0 1 .46.057zM7.5 3.846V8.5a.5.5 0 0 1-.418.493l-5.582.93V15h8v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.222l-7 2.624z"/>
  <path fill-rule="evenodd" d="M6.5 15.5v-7h1v7h-1z"/>
  <path d="M2.5 11h1v1h-1v-1zm2 0h1v1h-1v-1zm-2 2h1v1h-1v-1zm2 0h1v1h-1v-1zm6-10h1v1h-1V3zm2 0h1v1h-1V3zm-4 2h1v1h-1V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm-2 2h1v1h-1V7zm2 0h1v1h-1V7zm-4 0h1v1h-1V7zm0 2h1v1h-1V9zm2 0h1v1h-1V9zm2 0h1v1h-1V9zm-4 2h1v1h-1v-1zm2 0h1v1h-1v-1zm2 0h1v1h-1v-1z"/>
</svg>
            </span>
        </div>
        <input type="text" class="form-control" id="ftagnamn" name="ftagnamn" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Fyll i ditt företag, arbetsplats
        </div>
           <div class="valid-feedback">
        Ok!
      </div>
      </div>
    </div>
 
            
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Organisationsnummer</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"></span>
        </div>
        <input type="text" class="form-control" id="orgnr" name="orgnr" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Fyll i Organisationsnummer
        </div>
           <div class="valid-feedback">
        Ok!
      </div>
      </div>
    </div>
  </div>
    
      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Fyll i din email, använd @
        </div>
           <div class="valid-feedback">
        Ok!
      </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Lösenord</label>
      <input type="password" class="form-control" id="pass" name="pass" required>
      <div class="valid-feedback">
        Ok!
      </div>
             <div class="invalid-feedback">
        Skriv ett lösenord
        </div>
    </div>
        <div class="col-md-4 mb-3">
      <label for="validationCustom02">Upprepa lösenord</label>
      <input type="password" class="form-control" id="password2" required>
      <div class="valid-feedback">
             Ok!
      </div>
             <div class="invalid-feedback">
          Upprepa lösenordet
        </div>
    </div>
  </div>

    
  <button class="btn btn-primary" type="submit">Registrera</button>
</form>
    </div>
<script>
         var pass1 = document.forms["myForm"]["pass"].value;
        var pass2 = document.forms["myForm"]["password2"].value;
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
    
    
    
          function validateForm() {
        var pass1 = document.forms["myForm"]["pass"].value;
        var pass2 = document.forms["myForm"]["password2"].value;
    

    
        if (pass1 != pass2 ){
            document.getElementById('password2').value = '';
            return false;
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