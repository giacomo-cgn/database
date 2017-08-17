<?php
include './includes/config.php';
$con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    mysqli_select_db($con,"archive");
$sql="SELECT * FROM tab_interessi ORDER BY anno DESC;";

echo "  <button type=\"button\" class=\"btn btn-primary\" onclick=\"exportQuery()\" data-dismiss=\"modal\">Conferma Esporta</button>
        <ul class=\"list-group\" id=\"interestExportList\">";

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "<li class=\"list-group-item\"><div class=\"checkbox\" idInteresse=\"" .$row['id_interesse']. "\">
                    <label><input type=\"checkbox\">" .$row['interesse']. "</label>
                </div></li>";
}
    
echo "</ul>"   ; 
mysqli_close($con);
?>