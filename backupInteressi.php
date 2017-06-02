 <?php
    $today = getdate();
    $mday = strval($today['mday']);
    $month = strval($today['mon']);
    $year = strval($today['year']);
    header('Content-Disposition: attachment; filename="backupInteressi'.$year.$month.$mday.'.csv"');
    
   $con = mysqli_connect('vcg.isti.cnr.it','cignoni','passwordfaite','archive');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"archive");
     $sql="SELECT * FROM tab_interessi";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    echo "ID_INTERESSE;INTERESSE;CATEGORIA;ANNO\n";
    while($row = mysqli_fetch_array($result)) {
        echo $row['id_interesse'].";".$row['interesse'].";".$row['categoria'].";".$row['anno']."\n"; 
    }
?>