<?php
function searchIntrestPartialList($partialInterest, $interest){
   mysqli_data_seek ($partialInterest , 0 );
    while ($rowPartial = mysqli_fetch_array($partialInterest)){
        if ($interest==$rowPartial['interesse']){
           return true; 
        }
    }
    return false;
}
    
    
$t = intval($_GET['t']); 
$con = mysqli_connect('vcg.isti.cnr.it','cignoni','passwordfaite','archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    mysqli_select_db($con,"archive");


$sqlPartial="SELECT tab_interessi.interesse FROM tab_join
    INNER JOIN tab_utenti
    ON tab_utenti.id_utente=tab_join.id_utente
    INNER JOIN tab_interessi
    ON tab_interessi.id_interesse=tab_join.id_interesse
    WHERE tab_utenti.id_utente=".$t.";";
$resultPartial = mysqli_query($con,$sqlPartial);

$sqlTotal="SELECT * FROM tab_interessi ORDER BY anno DESC;";
$resultTotal = mysqli_query($con,$sqlTotal);


echo "  <button type=\"button\" class=\"btn btn-primary\" onclick=\"updateIntrests(".$t.")\" data-dismiss=\"modal\">Salva modifica</button>
        <ul class=\"list-group\" id=\"interestList\">";


while($row = mysqli_fetch_array($resultTotal)) {
    if(searchIntrestPartialList($resultPartial,$row['interesse'])==true){
         echo "<li class=\"list-group-item\"><div class=\"checkbox\" idInteresse=\"".$row['id_interesse']."\">
                    <label><input type=\"checkbox\" checked>".$row['interesse']. "</label>
                </div></li>";
    }
    else{
        echo "<li class=\"list-group-item\"><div class=\"checkbox\" idInteresse=\"".$row['id_interesse']."\">
                <label><input type=\"checkbox\">".$row['interesse']. "</label>
            </div></li>";
    }
};

echo "</ul>";


mysqli_close($con);
?>