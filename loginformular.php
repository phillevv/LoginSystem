<?php 

require_once ('db.php');
session_start();

//kontrollerar att användarnamn och lösenord är ok
if( ($_POST['username'] && $_POST['password']) ) {
 $username = trim($_POST['username']);
 $password = trim($_POST['password']);
                  
                  
                  
                  
        $sql = "select * from users where pnummer = '".$username."'";
        $rs = mysqli_query($conn,$sql);
        $numRows = mysqli_num_rows($rs);
                  
            if( $numRows == 1) {
                $row = mysqli_fetch_assoc($rs);
                  if(password_verify($password, $row['password'])) {
                   header('location:welcome.php');   
                                       // Session
$_SESSION["username"] = $_POST["username"]; 
                  }
                  
                  else if ( $numRows < 0) {
                   header('location:login.php');   
                  }
       
            }
                 else {
                header('location:login.php');   
            }      
    
} 


echo "Användaren finns inte";
echo "<a href='login.php'>Tillbaka</a>";
        header('location:login.php');  

?>