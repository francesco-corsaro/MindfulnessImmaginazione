<?php
require 'backend/SicurezzaForm/SicurezzaForm.php';

test_input_email($_POST[email]);
test_input_nome($_POST[nome]);
pwd_match($_POST[pwd]);

function insert_3val($tabel,$colonna1,$val1,$colonna2,$val2,$colonna3,$val3) {
    
    
    require 'DataBase/ConnectDataBase.php';
    
    $sql = "INSERT INTO $tabel ($colonna1, $colonna2,$colonna3)
        VALUES ( '$val1', '$val2' , '$val3')";
    if ($conn->query($sql) === TRUE) {
        global $stato;
        $stato= " | Dati Caricati | ";
        
    } else {
        global $stato;
        $stato="Error: " . $sql . "<br>" . $conn->error;
        
    }
    $conn->close();
}

require 'DataBase/ConnectDataBase.php';//serve a connettersi al database

$sql = "SELECT email, pwd, codice, nome, cognome FROM Anagrafica";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['email'] == $email && password_verify($pasword, $row['pwd'])) {
            $_SESSION['bypass']='b1p4ss';
            $_SESSION['nickName']=$email;
            $_SESSION['codice']= $row["codice"]  ;
            $cogn=$row["cognome"];
            $nom=$row["nome"];
            $conn->close();
            insert_3val(Presenze,nome,$nom,cognome,$cogn,codice,$_SESSION['codice']);
    /*  var_dump($row);
        $meccanico="<br>Login effettuato<br>";*/
            header("location:/Coco/pagine/FFMQ.php");
        }else{
            $_SESSION['denied']=1;
        
        }
    }
    
}
  /*  }
} elseif ($result==FALSE){
    $_SESSION['denied']=1;
    
}
else {
    $_SESSION['denied']=1;
    
}*/
$conn->close();
/*$_SESSION['denied']=" 1 " ;
header("location: /Login/Frontend/LogForm.php");*/
?>


