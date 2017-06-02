<?php
    $con = mysqli_connect('vcg.isti.cnr.it','cignoni','passwordfaite','archive');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"archive");
    
    if($_POST['cellulare']=="+39"){
        $_POST['cellulare']="";
    }
    
    $sql = "INSERT INTO tab_utenti (cognome, nome, indirizzo, citta, CAP, email, telefono, cellulare, id_coabita)
    VALUES ('". $_POST['cognome'] ."', '". $_POST['nome'] ."', '". $_POST['indirizzo'] ."', '". $_POST['citta'] ."', '". $_POST['CAP'] ."', '". $_POST['email'] ."', '". $_POST['telefono'] ."', '". $_POST['cellulare'] ."', '". $_POST['id_coabita'] ."')";
    
    if(mysqli_query($con,$sql)){
        $lastId=mysqli_insert_id($con); 
        echo "Utente aggiunto con successo! w". $lastId . "w";
    }
    else
    {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    

mysqli_close($con);
?>