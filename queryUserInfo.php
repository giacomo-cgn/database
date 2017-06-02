<?php
$p = intval($_GET['p']); 
$con = mysqli_connect('vcg.isti.cnr.it','cignoni','passwordfaite','archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    mysqli_select_db($con,"archive");
$sql="SELECT * FROM tab_utenti WHERE tab_utenti.id_utente=".$p.";"; 
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$coabita=$row['id_coabita'];
if ($row['id_coabita']=="0"){
	$sql2="SELECT * FROM tab_utenti WHERE tab_utenti.id_coabita=".$p.";";
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

echo "<table class=\"table\">";
    echo "<tr><td><strong>Cognome</strong></td><td>" .$row['cognome']."</td></tr>";
    echo "<tr><td><strong>Nome</strong></td><td>" .$row['nome']."</td></tr>";
    echo "<tr><td><strong>Indirizzo</strong></td><td>" .$row['indirizzo']."</td></tr>";
 	echo "<tr><td><strong>Città</strong></td><td>" .$row['citta']."</td></tr>";
    echo "<tr><td><strong>CAP</strong></td><td>" .$row['CAP']."</td></tr>";
    echo "<tr><td><strong>Email</strong></td><td>" .$row['email']."</td></tr>";
    echo "<tr><td><strong>Telefono</strong></td><td>" .$row['telefono']."</td></tr>";
    echo "<tr><td><strong>Cellulare</strong></td><td>" .$row['cellulare']."</td></tr>";
    echo "<tr><td><strong>Coabita ID</strong></td><td>" .$row['id_coabita']."</td></tr>";
	echo "<tr><td><strong>Coabita nome</strong></td><td>" .$coabitante."</td></tr>";
echo "</table>";
mysqli_close($con);
?>