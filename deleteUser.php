<?php
include './includes/config.php';
$t = intval($_GET['t']); 
$con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    mysqli_select_db($con,"archive");
$sql="DELETE FROM tab_utenti WHERE tab_utenti.id_utente=".$t.";";
//echo $sql;
if (mysqli_query($con, $sql)) {
    echo "Utente cancellato con successo.";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>