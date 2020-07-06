 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

<nav id="navloggedin" class="navbar navbar-expand-lg navbar-light shadow-sm p-3 mb-5 bg-dark rounded sticky-top">
  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
           <form class="form-inline my-lg-0">
     <a href="welcome.php" class=""><img src="icons/icon.png" class="rounded shadow-sm float-left" style="width:50px"></a>
    </form> 

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto  mt-lg-0">
  
         <form class="form-inline my-lg-0">
     <a href="time.php" id="left"  class="text-white">Tid</a>
    </form>  
         <form class="form-inline my-lg-0">
     <a href="myschedule.php" class="text-white">Schema</a>
    </form> 
                <form class="form-inline my-lg-0">
     <a href="myhours.php" class="text-white">Mina tider</a>
    </form> 

    </ul>
      
    <form class="form-inline my-2 my-lg-0 mr-4 text-white">
  <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   
          <?php 
            
       $sql = "SELECT * FROM users where pnummer = '".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo $row["fnamn"];
  }
} else {
  echo "0 results";
}?>
             <svg class="bi bi-person-fill text-success" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
        </button>
  <div class="dropdown-menu dropdown-menu-lg-right">
    <a href="myprofile.php" class="text-decoration-none"><button class="dropdown-item" type="button">Mitt konto</button></a>
    <a href="logout.php" class="text-decoration-none"><button class="dropdown-item" type="button">Logga ut</button></a>
  </div>
    </form>
  </div>
</nav>