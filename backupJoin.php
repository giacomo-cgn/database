 <?php
    $today = getdate();
    $mday = strval($today['mday']);
    $month = strval($today['mon']);
    $year = strval($today['year']);
    header('Content-Disposition: attachment; filename="backupJoin'.$year.$month.$mday.'.csv"');
    
   $con = mysqli_connect('vcg.isti.cnr.it','cignoni','passwordfaite','archive');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"archive");
     $sql="SELECT * FROM tab_join";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    echo "ID_JOIN;ID_UTENTE;ID_INTERESSE\n";
    while($row = mysqli_fetch_array($result)) {
        echo $row['id_join'].";".$row['id_utente'].";".$row['id_interesse']."\n"; 
    }
?>