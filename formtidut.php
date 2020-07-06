                        <form method="post" id="myForm2" style="display:" action="">
                                            
                            
                                <?php 
            
$sql = "SELECT * FROM person where pnummer = ".$_SESSION['username']." order by tidin desc LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   
  }
};
?>
                
                  <h1 class="text-center m-4"><span class="badge badge-danger">Stämpla ut</span></h1>
                
          <h1 class="text-center">
              <input type="text" value="
                                        
                 <?php 
            
$sql = "SELECT fnamn FROM users where pnummer = ".$_SESSION['username']."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo $row["fnamn"];
  }
};
?>" name="namn" hidden>
              
              
                  <input type="text" value="
                                        
                 <?php 
            
$sql = "SELECT pnummer FROM users where pnummer = ".$_SESSION['username']."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo $row["pnummer"];
  }
};
?>" name="pnummer" hidden>
              
              
                  <input type="text" value="
                                        
                 <?php 
            
$sql = "SELECT enamn FROM users where pnummer = ".$_SESSION['username']."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo $row["enamn"];
  }
};
?>" name="enamn" hidden>
              
    <button class="btn btn-outline-danger" id="submitbtn2" type="submit">Tid ut</button>
              </h1>
                </form>

