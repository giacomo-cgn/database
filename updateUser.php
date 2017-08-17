<?php
include './includes/config.php';
$con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

   mysqli_select_db($con,"archive");

$sql = "UPDATE tab_utenti SET cognome='". $_POST['cognome'] ."', nome='". $_POST['nome'] ."', indirizzo='". $_POST['indirizzo'] ."', citta='". $_POST['citta'] ."', CAP='". $_POST['CAP'] ."', email='". $_POST['email'] ."', telefono='". $_POST['telefono'] ."', cellulare='". $_POST['cellulare'] ."', id_coabita='". $_POST['id_coabita'] ."' WHERE id_utente='". $_POST['id'] ."';";

if (mysqli_query($con, $sql)) {
    echo "Abbonato modificato con successo";
} else {
    echo "Errore nella modifica: " . mysqli_error($con);
}

mysqli_close($con);
?>