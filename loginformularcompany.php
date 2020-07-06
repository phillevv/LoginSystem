<?php 

require_once ('db.php');
session_start();

//kontrollerar att användarnamn och lösenord är ok
if( ($_POST['ftagnamn'] && $_POST['password']) ) {
 $username = trim($_POST['ftagnamn']);
 $password = trim($_POST['password']);
                  
                  
                  
                  
        $sql = "select * from ftagusers where ftagnamn = '".$username."'";
        $rs = mysqli_query($conn,$sql);
        $numRows = mysqli_num_rows($rs);
                  
            if( $numRows == 1) {
                $row = mysqli_fetch_assoc($rs);
                  if(password_verify($password, $row['pass'])) {
                   header('location:welcomecompany.php');   
                                       // Session
                      $_SESSION["ftagnamn"] = $_POST["ftagnamn"]; 
                  }
                  
                  else if ( $numRows < 0) {
                   header('location:logincompany.php');   
                  }
       
            }
                 else {
                header('location:logincompany.php');   
            }      
    
} 


echo "Användaren finns inte";
echo "<a href='login.php'>Tillbaka</a>";
        header('location:logincompany.php');  

?>