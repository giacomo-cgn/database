 <?php
    $today = getdate();
    $mday = strval($today['mday']);
    $month = strval($today['mon']);
    $year = strval($today['year']);
    header('Content-Disposition: attachment; filename="backupUtenti'.$year.$month.$mday.'.csv"');
    
   $con = mysqli_connect('vcg.isti.cnr.it','cignoni','passwordfaite','archive');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"archive");
     $sql="SELECT * FROM tab_utenti";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    echo "ID;COGNOME;NOME;EMAIL;CELLULARE;TELEFONO;CAP;INDIRIZZO;ID_COABITA\n";
    while($row = mysqli_fetch_array($result)) {
        echo $row['id_utente'].";".$row['cognome'].";".$row['nome'].";".$row['email'].";".$row['cellulare'].";".$row['telefono'].";".$row['CAP'].";".$row['indirizzo'].";".$row['id_coabita']."\n"; 
    }
?>