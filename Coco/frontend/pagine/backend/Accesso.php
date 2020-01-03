<?php
require 'backend/SicurezzaForm/SicurezzaForm.php';

test_input_email($_POST[email]);
test_input_nome($_POST[nome]);
pwd_match($_POST[pwd]);


require 'DataBase/ConnectDataBase.php';//serve a connettersi al database

$sql = "SELECT email, pwd FROM Anagrafica";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while(   $row = $result->fetch_assoc()) {
        if ($row['email'] == $email && password_verify($pasword, $row['pwd'])) {
            $_SESSION['bypass']='b1p4ss';
            $_SESSION['nickName']=$email;
           
            $_SESSION['codice']= $row["codice"]  ;
            header("location:/Coco/frontend/pagine/FFMQ.php");
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


