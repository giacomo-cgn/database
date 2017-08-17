<?php
include './includes/config.php';
$r = intval($_GET['r']); 
$con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

   mysqli_select_db($con,"archive");
$sql="SELECT tab_interessi.interesse FROM tab_join
INNER JOIN tab_utenti
ON tab_utenti.id_utente=tab_join.id_utente
INNER JOIN tab_interessi
ON tab_interessi.id_interesse=tab_join.id_interesse
 WHERE tab_utenti.id_utente=".$r." ORDER BY anno DESC;";
 $result = mysqli_query($con,$sql);
 echo "<ul class=\"list-group\">";
while($row = mysqli_fetch_array($result)) {
    echo "<li class=\"list-group-item\"><strong>" .$row['interesse']. "</strong></li>";
};
echo "</ul>";
mysqli_close($con);

?>