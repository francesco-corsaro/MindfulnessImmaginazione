<?php

function Inserisci_id($tabel, $nome, $cognome, $eta, $genere, $peso, $altezza, $pwd, $email) {
    

require 'ConnectDataBase.php';

$sql = "INSERT INTO $tabel (nome, cognome, eta, genere, peso, altezza, pwd, email  )
        VALUES ( '$nome', '$cognome', '$eta', '$genere', '$peso', '$altezza', '$pwd', '$email' )";
if ($conn->query($sql) === TRUE) {
    global $stato;
    $stato= " | Anagrafica Caricata | ";
    
} else {
    global $stato;
    $stato="Error: " . $sql . "<br>" . $conn->error;
   
}
$conn->close();
}
function Insert_cod_date($tabel,$codice, $data) {
    
    
    require 'ConnectDataBase.php';
    
    $sql = "INSERT INTO $tabel (codice, data )
        VALUES ( $codice, '$data' )";
    if ($conn->query($sql) === TRUE) {
        global $stato;
        $stato= " | Codice e data Caricati | ";
        
    } else {
        global $stato;
        $stato="Error: " . $sql . "<br>" . $conn->error;
        
    }
    $conn->close();
}
?>
