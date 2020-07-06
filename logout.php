
    <?php
// Start Session
session_start();
 
$_SESSION = array();
 
// Tar bort sessionen
session_destroy();
 
// Går till vald sida
header("location: login.php");
exit;
?>

