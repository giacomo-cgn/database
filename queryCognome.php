<?php
include './includes/config.php';
$q = $_GET['q']; 
$con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    mysqli_select_db($con,"archive");
$sql="SELECT * FROM tab_utenti WHERE tab_utenti.cognome LIKE '".$q."%' ORDER BY Cognome ASC;";
//$sql="SELECT * FROM tab_utenti WHERE tab_utenti.cognome='Cignoni';";  
$result = mysqli_query($con,$sql);
//echo "query is ".$sql;
echo "
<table class=\"table\" class=\"hoverTable\"> 
<thead>
<tr>
<th>Cognome</th>
<th>Nome</th>
<th>ID</th>
</tr>
</thead>
<tbody>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr class=\"\" onclick=\" $(this).addClass('dbHighlight').siblings().removeClass('dbHighlight'); userInfo(".$row['id_utente']."); \">";
    echo "<td>" . $row['cognome'] . "</td>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['id_utente'] . "</td>";
    echo "</tr>";
}
echo "</tbody></table>";
mysqli_close($con);
?>