<?php
include './includes/config.php';
$s = intval($_GET['s']); 
$con = mysqli_connect('vcg.isti.cnr.it','cignoni',$dbpassword,'archive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

    mysqli_select_db($con,"archive");
$sql="SELECT * FROM tab_utenti WHERE tab_utenti.id_utente=".$s.";"; 
//echo "query is".$sql;
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
echo "<form id=\"updateUserForm\">
                        <div class=\"form-group\">
                            <label for=\"cognome\" class=\"control-label\">Cognome</label>
                            <input class=\"form-control\" type=\"text\" id=\"cognome1\" name=\"cognome\"  value=\"" .$row['cognome']."\">
                            <label for=\"nome\" class=\"control-label\">Nome</label>
                            <input class=\"form-control\" type=\"text\" id=\"nome1\" name=\"nome\" value=\"" .$row['nome']."\">
                        </div>

                        <div class=\"form-group\">
                            <label for=\"residenza\" class=\"control-label\">Residenza</label>
                            <input class=\"form-control\" type=\"text\" id=\"indirizzo1\" placeholder=\"Indirizzo\" name=\"indirizzo\"  value=\"" .$row['indirizzo']."\">
                             <input class=\"form-control\" type=\"text\" id=\"citta1\" placeholder=\"Città\" name=\"citta\"  value=\"" .$row['citta']."\">
                            <input class=\"form-control\" type=\"text\" id=\"CAP1\" placeholder=\"CAP\" name=\"CAP\" value=\"" .$row['CAP']."\">
                        </div>

                        <div class=\"form-group\">
                            <label for=\"recapito\" class=\"control-label\">Recapito</label>
                            <div class=\"has-feedback\">
                                <input class=\"form-control\" type=\"text\" id=\"email1\" placeholder=\"Email\" name=\"email\" value=\"" .$row['email']."\">
                                <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
                            </div>
                            <div class=\"has-feedback\">
                                <input class=\"form-control\" type=\"text\" id=\"telefono1\" placeholder=\"Numero Fisso\" name=\"telefono\" value=\"" .$row['telefono']."\">
                                <span class=\"glyphicon glyphicon-phone-alt form-control-feedback\"></span>
                            </div>
                            <div class=\"has-feedback\">
                                <input class=\"form-control\" type=\"text\" id=\"cellulare1\" placeholder=\"Numero Cell.\" name=\"cellulare\" value=\"" .$row['cellulare']."\">
                                <span class=\"glyphicon glyphicon-phone form-control-feedback\"></span>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"idFam\" class=\"control-label\">ID Familiare</label>
                            <input class=\"form-control\" type=\"text\" id=\"id_coabita1\" name=\"id_coabita\" value=\"" .$row['id_coabita']."\">
                        </div>
                        <div class=\"form-group\">
                            <button type=\"button\" class=\"btn btn-primary\" onclick=\"updateUser(" .$s. ")\" data-dismiss=\"modal\">Salva</button>
                            <button type=\"button\" class=\"btn btn-default btn-sm\" data-dismiss=\"modal\">Annulla</button>
                            <button type=\"button\" class=\"btn btn-danger btn-lg\" data-dismiss=\"modal\" onclick=\"deleteUser(" .$s. ")\">Elimina abbonato</button>
                        </div>
                        <div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            <strong>Attenzione!</strong><br><u>Non inserire apostrofi o virgolette</u>
                        </div>
                    </form>";
mysqli_close($con);
?>