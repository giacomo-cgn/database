<?php
include './includes/config.php';
$con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

   mysqli_select_db($con,"archive");

$sql="DELETE FROM tab_join WHERE tab_join.id_utente=". $_POST['id_utente'] .";";
if (mysqli_query($con, $sql)) {
} else {
    echo "Errore nella cancellazione: " .$sql. mysqli_error($con);
}
$arrayInterests=json_decode($_POST['arrayInteressi']);
foreach ($arrayInterests as $id_interesse){
    $sql="INSERT INTO tab_join (id_utente,id_interesse) VALUES (". $_POST['id_utente'] .",".$id_interesse.");";
    
    if (mysqli_query($con, $sql)) {
    } else {
        echo "Errore nella modifica: " .$sql. mysqli_error($con);
    }
}

mysqli_close($con);
?>