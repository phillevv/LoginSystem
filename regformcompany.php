<!-- Registrerings formulär -->


<?php 

require_once("db.php");

session_start();  
 if(isset($_SESSION["ftagsnamn"]))  
 {  
      header("location:welcomecompany.php");  
 }  
 if(isset($_POST["ftagnamn"]))  
 {  
      if(empty($_POST["ftagnamn"]) || empty($_POST["pass"]) )  
      {  
            
               header("location:registercompany.php");  
           
      }  
      else  
      {  
           $compname = mysqli_real_escape_string($conn, ucfirst($_POST["ftagnamn"]));
          $organr = mysqli_real_escape_string($conn, $_POST["orgnr"]);
          $email = mysqli_real_escape_string($conn, $_POST["email"]);
 
          
           $password = mysqli_real_escape_string($conn, $_POST["pass"]);  
           $password = password_hash($password, PASSWORD_DEFAULT);  
           $query = "INSERT INTO `ftagusers`(`ftagnamn`, `orgnr`, `email`, `pass`) VALUES ('$compname','$organr','$email','$password')";
           if(mysqli_query($conn, $query))  
           {  
                
                header("location:welcomecompany.php");  
           }  
      }  
 }  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["ftagnamn"]) || empty($_POST["pass"]) || ($_POST["pass"]) !== ($_POST["password2"]))  
      {  
            header("location:registercompany.php");  
          
      
      }  
      else  
      {  
           $compname = mysqli_real_escape_string($conn, $_POST["ftagnamn"]);  
           $password = mysqli_real_escape_string($conn, $_POST["pass"]);  
           $query = "SELECT * FROM ftagusers WHERE ftagnamn = '$compname'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["pass"]))  
                     {  
                          
                          $_SESSION["ftagsnamn"] = $compname;  
                          header("location:welcomecompany.php");  
                     }  
                     else  
                     {  
                          header("location:registercompany.php");  
                     }  
                }  
           }  
       
      }  
 }  
 ?>  