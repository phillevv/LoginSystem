<!-- Registrerings formulär -->


<?php 

require_once("db.php");

session_start();  
 if(isset($_SESSION["fnamn"]))  
 {  
      header("location:welcome.php");  
 }  
 if(isset($_POST["fnamn"]))  
 {  
      if(empty($_POST["fnamn"]) || empty($_POST["password"]) )  
      {  
            
               header("location:register.php");  
           
      }  
      else  
      {  
           $username = mysqli_real_escape_string($conn, ucfirst($_POST["fnamn"]));
           $enamn = mysqli_real_escape_string($conn, ucfirst($_POST["enamn"]));  
           $pnummer = mysqli_real_escape_string($conn, $_POST["pnummer"]);  
           $email = mysqli_real_escape_string($conn, $_POST["email"]);  
            $ftag = mysqli_real_escape_string($conn, ucfirst($_POST["foretag"]));  
          
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $password = password_hash($password, PASSWORD_DEFAULT);  
           $query = "INSERT INTO `users`(`fnamn`, `password`, `enamn`, `pnummer`, `email`,`ftag`) VALUES ('$username','$password','$enamn','$pnummer','$email','$ftag')";
           if(mysqli_query($conn, $query))  
           {  
                
                header("location:welcome.php");  
           }  
      }  
 }  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["fnamn"]) || empty($_POST["password"]) || ($_POST["password"]) !== ($_POST["password2"]))  
      {  
            header("location:register.php");  
          
      
      }  
      else  
      {  
           $username = mysqli_real_escape_string($conn, $_POST["fnamn"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $query = "SELECT * FROM users WHERE fnamn = '$username'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          
                          $_SESSION["fnamn"] = $username;  
                          header("location:welcome.php");  
                     }  
                     else  
                     {  
                          header("location:register.php");  
                     }  
                }  
           }  
       
      }  
 }  
 ?>  