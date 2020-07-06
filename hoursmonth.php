
            



        <?php 
            
$sql = "SELECT person.pnummer,users.pnummer,person.fnamn,users.fnamn,person.enamn as enamn,person.dag as dag,person.monad as monad,person.tidin as tidin,person.tidut as tidut,users.Ftag as Ftag
FROM person
INNER JOIN users
ON users.pnummer=person.pnummer WHERE users.Ftag = '".$_SESSION['ftagnamn']."' AND monad = 06 ORDER BY datumin desc LIMIT 1";
$result = mysqli_query($conn, $sql);



while($row = mysqli_fetch_array($result))
{

    
echo '

<form action="gotomonth.php" method="get">

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <button class="nav-link active" name="Januari" type="submit">Januari</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" name="Februari" type="submit">Februari</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="Mars"  type="submit">Mars</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="April" type="submit">April</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="Maj" type="submit">Maj</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="Juni" type="submit">Juni</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="Juli" type="submit">Juli</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="Augusti" type="submit">Augusti</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="September" type="submit">September</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="Oktober" type="submit">Oktober</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="November" type="submit">November</button>
      </li>
            <li class="nav-item">
        <button class="nav-link" name="December" type="submit">December</button>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>

  </div>
</div>

</form>

';
  
    
    
}

?>


