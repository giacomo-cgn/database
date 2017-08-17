<?php
	include './includes/config.php';
    $today = getdate();
    $mday = strval($today['mday']);
    $month = strval($today['mon']);
    $year = strval($today['year']);
    header('Content-Disposition: attachment; filename="esporta'.$year.$month.$mday.'.csv"');
    
   $con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
	mysqli_select_db($con,"archive");


    $arrayInterests=json_decode($_POST["data"]);
	$exportListSql ="id_interesse=". $arrayInterests[0];
	$arraylenght=count($arrayInterests);
 
	if ($arraylenght>1){
		for($i = 1; $i <= $arraylenght-1; $i++){
			$exportListSql =$exportListSql . " OR id_interesse=".$arrayInterests[$i];
		}
	}

   $sql="SELECT * FROM tab_utenti
   INNER JOIN tab_join
   ON tab_join.id_utente=tab_utenti.id_utente
   WHERE (".$exportListSql.");";

	

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
	
	
    echo "COGNOME;NOME;EMAIL;CELLULARE;TELEFONO;CAP;CITTA';INDIRIZZO;COABITA\n";
    while($row = mysqli_fetch_array($result)) {
		
		$coabita=$row['id_coabita'];
	if ($row['id_coabita']=="0"){
		$sql2="SELECT * FROM tab_utenti WHERE tab_utenti.id_coabita=".$row['id_utente'].";";
		$result2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_array($result2);
		$coabitante="(".$row2['cognome']." " .$row2['nome'].")";
	
	}
	else{
		$sql2="SELECT * FROM tab_utenti WHERE tab_utenti.id_utente=".$coabita.";"; 
		$result2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_array($result2);
		$coabitante=$row2['cognome']." " .$row2['nome'];
	}
		
        echo $row['cognome'].";".$row['nome'].";".$row['email'].";".$row['cellulare'].";".$row['telefono'].";".$row['CAP'].";".$row['citta'].";".$row['indirizzo'].";".$coabitante."\n"; 
    }

?>
