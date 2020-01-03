<?php
session_start();
if ($_SESSION['bypass']!=='b1p4ss') {
    $_SESSION['denied']=" 1 " ;
    header("location: /Coco/frontend/pagine/Login.php");
}
$colonne=array('Q4i1','Q4i2','Q4i3','Q4i4','Q4i5','Q4i6','Q4i7','Q4i8','Q4i9','Q4i10','Q4i11','Q4i12');
require 'backend/DataBase/UpLoadAnswersBot.php';
if (!empty($_POST[ime])) {
    Upload_answersbot('ImViEs', $colonne, $_POST[ime], $_SESSION['codice']);
    header("location: /Coco/frontend/pagine/ImmaginazioneInt.php");
}
$sezioni=array(
    "Guardi te stesso dall'esterno eseguire il movimento(Immaginazione Visiva Esterna)",
    "Ti vedi attraverso i tuoi occhi mentre esegui il movimento (Immaginazione visiva interna)",
    "Senti, percepisci te stesso fare il movimento (Immaginazione Cinestesica)"
);

$domande=array("Camminare",
    "Correre",
    "Calciare una pietra ",
    "Chinarsi a raccogliere una moneta ",
    "Correre su per le scale ",
    "Saltare lateralmente ",
    "Lanciare una pietra in acqua",
    "Calciare una palla in aria ",
    "Correre in di scesa ",
    "Andare in bicicletta ",
    "Oscillare su una fune ",
    "Saltare giù da un muro alto");

$risposte=array(
    "Perfettamente chiara e vivida (come visione normale o idea di movimento)",
    "Chiara e abbastanza vivida",
    "Moderatamente chiara e vivida",
    "Vaga e offuscata",
    "Non hai assolutamente immagini, tu sai solo che stai pensando all ' abilità)");

?>
<html>
	<head>

		<title>Immaginazione Visiva Esterna</title>
		
		<?php require 'backend/css/ffmq/Style.php'; ?>
	</head>
	<body>
		
		<h1>Immaginazione Visiva Esterna</h1>
		<div class="col-9 consegna">
			Pensa ad ognuna delle seguenti azioni che appaiono nelle tabelle sottostanti. Classifica le immagini secondo il grado di chiarezza e vividezza come mostrato nella SCALA DI VALUTAZIONE.
		
		<?php 
		foreach ($risposte as $valo=>$risposta) {
		    echo'<p>'.$valo.') '.$risposta.'</p>' ;
		}
		?>
		</div>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		
		<?php 
		
		    
		    foreach ($domande as $num=>$domanda) {
		        echo '<div class="row"><div class="col-10 tenda">
                            <div class="col-12 color">
                                '.$sezioni[0].': 
                            </div>
                            <div class="col-12 color"
                                <em><b class="joy">'.$domanda.'</b></em> 
                            </div>
                            <div class="col-12">';
		        $value=0;
		        foreach ($risposte as $risposta) {
		            echo ' <div class="col-12">
				                <label class="contenitore" id="'.$risposta.'  ">
                                    <input  name="ime['.$num.']" type="radio" id="'.$risposta.'" value="'.$value.'" '.$controllo.'/>
                                    <span class="buttondo" id="'.$risposta.'" ></span>
                                    '.$risposta.'
                                  </label>
                             </div>';
		            $value++ ;
		        }
		        echo '</div>
                    </div></div>';
		    }
	
		?>
			<div class="col-12">
              	<input type="submit" value="Invia"/>
             </div>
         </form>
         
	</body>
</html>
		
		
		
