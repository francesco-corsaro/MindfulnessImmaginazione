<?php
session_start();
if ($_SESSION['bypass']!=='b1p4ss') {
        $_SESSION['denied']=" 1 " ;
        header("location: /Coco/frontend/pagine/Login.php");
}
        /*
//Creo dei permessi per bypassare il reuired
if ($_SESSION['Name']!== 'kalimero') {
    $Controllo='required' ;
}
if ($_SESSION['Name']== 'kalimero' &&  array_key_exists("1",$_POST['msp'])) {
    /* TEST MSP
    $_SESSION['msp']=array();
    array_push($_SESSION['msp'],$_POST['msp']);
    //Mando alla pagina successiva
    header("location: /MBSR/STAY.php") ;
}

if (array_key_exists("48",$_POST['msp'])) {
    /* TEST MSP*/
/*    $_SESSION['msp']=array();
    array_push($_SESSION['msp'],$_POST['msp']);
    //Mando alla pagina successiva
    header("location: /MBSR/STAY.php") ;
*/
$colonneMSP=array('Q3i1','Q3i2','Q3i3','Q3i4','Q3i5','Q3i6','Q3i7','Q3i8','Q3i9','Q3i10','Q3i11','Q3i12','Q3i13','Q3i14','Q3i15','Q3i16','Q3i17','Q3i18','Q3i19','Q3i20','Q3i21','Q3i22','Q3i23','Q3i24','Q3i25','Q3i26','Q3i27','Q3i28','Q3i29','Q3i30','Q3i31','Q3i32','Q3i33','Q3i34','Q3i35','Q3i36','Q3i37','Q3i38','Q3i39','Q3i40','Q3i41','Q3i42','Q3i43','Q3i44','Q3i45','Q3i46','Q3i47','Q3i48','Q3i49');

require 'backend/DataBase/UpLoadAnswersBot.php';
if (!empty($_POST[msp])) {
    Upload_answersbot('msp', $colonneMSP, $_POST[msp], $_SESSION['codice']);
    header("location: /Coco/frontend/pagine/Immaginazione.php");
}
$msp=array(
    "Sento di stare in continua tensione",
    "Mi sento la gola stretta o la bocca secca",
    "Sento la pressione del tempo, mi manca il tempo",
    "Tendo a saltare i pasti o a dimenticare di mangiare",
"Riesamino le stesse idee più volte, rimugino, ho gli stessi pensieri che si ripetono, sento la testa piena di pensieri",
"Provo un senso di isolamento e incomprensione",
"Mi sento sopraffatto/a, sovraccaricato/a",
"Mi preoccupo di ciò che può succedere il giorno dopo",
"Ho il viso (fronte, sopracciglia o labbra) contratto, corrugato",
"Presto continuamente attenzione all'orario, guardo spesso il mio orologio o chiedo l'ora",
"Sono irritabile, ho i nervi a fior di pelle, perdo la pazienza con le persone e le cose",
"Ho difficoltà a digerire, mal di stomaco, mi sento un nodo allo stomaco",
"Sento scoraggiamento e senso di abbattimento",
"Ho dei dolori fisici: mal di schiena, mal di testa, male al collo, mal di pancia",
"Sento preoccupazione o fastidio",
"Ho improvvise variazioni della temperatura corporea (molto caldo o molto freddo)",
"Mi mangio le unghie o la pelle intorno alle dita, o mi mordo le labbra e l'interno delle guance",
"Dimentico appuntamenti, oggetti o cose da fare",
"Piango facilmente",
"Sono affaticato/affaticata",
"Ho le mascelle serrate",
"Riesco a mantenere la calma",
'Ho le mani sudate o sudo molto (le ascelle, i piedi, ecc..)',
"Vedo la vita semplice e facile",
"Mi sento il cuore che batte velocemente o irregolarmente",
"Cammino velocemente",
"Faccio lunghi sospiri o riprendo di colpo la respirazione",
"Ho diarrea o crampi intestinali o stitichezza",
"Provo inquietudine o angoscia",
"Ho soprassalti per situazioni inattese o rumori improvvisi",
"Impiego più di mezz'ora per addormentarmi",
"Ho comportamenti bruschi, mi muovo rapidamente e a scatti",
"Provo una sensazione di inefficienza, inadeguatezza",
"Ho i muscoli tesi o che tremano, ho crampi",
"Ho l'impressione di perdere il controllo",
"Ho scatti di aggressività",
"Provo confusione, non ho le idee chiare, manco di attenzione e di concentrazione",
"Ho i lineamenti tirati o le occhiaie",
"Evito i contatti sociali o non frequento più attività culturali, non ho più hobbies, non esco, mi isolo",
"Ho il respiro corto, a scatti, limitato, rapido",
"Sento un gran peso sulle spalle" ,
"Ho l'impressione che ogni cosa mi comporti uno sforzo notevole",
"Ho molta energia, mi sento in forma",
"Provo irrequietezza, ho sempre bisogno di muovermi, non riesco a stare fermo",
"Mangio velocemente, finisco di pranzare in meno di 15 minuti",
"Controllo male le mie reazioni, l'umore, i gesti",
"Sono stressato /stressata",
"Faccio gaffes, inciampo, perdo le cose, ho incidenti di vario tipo",
"Riesco a rilassarmi");

$risposte=array('Per nulla','Poco','Abbastanza','Molto');
?>
<html>
	<head>

		<title>MSP</title>
		
		<?php require 'backend/css/ffmq/Style.php'; ?>
	</head>
	<body>
		
		<h1>MSP</h1>
		
		<div class="col-9 consegna">	
			E' qui di seguito riportata una lista di affermazioni che possono essere più o meno vere per lei. Dopo aver letto ciascuna frase, contrassegni con una crocetta il numero che indica il grado in cui l'affermazione le sembra descrivere meglio la sua situazione recente, vale a dire <em>negli ultimi quattro o cinque giorni</em>:
		</div>
		
		
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
				
				<?php
				foreach ($msp as $chiave => $domanda) {
				    echo '<div class="row"><div class="col-12 tenda">
                                <div class="color">
                                     '.$domanda.'
                                </div>
                                <div class="col-12">';
				    $value=0;
				    foreach ($risposte as $risposta) {
				        echo ' <div class="col-12">
				                    <label class="contenitore" id="'.$risposta.'  ">

				                        <input  name="msp['.$chiave.']" type="radio" id="'.$risposta.'" value="'.$value.'" '.$controllo.'/>
				                        <span class="buttondo" id="'.$risposta.'" ></span>
				                        '.$risposta.'
                                    </label>
                                </div>';
				        $value++ ;
				    } echo '  </div>
                          </div></div>';
				}
				?>
					<br>
					<p><input type="submit" value="Invia"/></p>
			</form>
		
	</body>
</html>
				
				
				
				
				
				
				
				