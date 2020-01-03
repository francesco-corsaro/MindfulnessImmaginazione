<?php
session_start();/*
//prendo la variabile Nome
$_SESSION['Name']= $_POST['Name'];
if (!preg_match("/^[a-zA-Z0-9 ]*$/",$_SESSION['Name'])) {
    $_SESSION['nameErr'] = '<div class="col-12 errore">Sono consentiti solo lettere e numeri</div>';
    header("location: /MBSR/Inizio.php");
}

//Creo dei permessi per bypassare il reuired
if ($_SESSION['Name']!== 'kalimero') {
   $Controllo='required' ;
}
if ($_SESSION['Name']!== 'kalimero' && array_key_exists("1",$_POST['ffmq'])){
    //Assegno una variabile SESSION al form FFMQ
    $_SESSION['ffmq']=array();
    array_push($_SESSION['ffmq'],$_POST['ffmq']);
    //Mando alla pagina successiva
    header("location: /MBSR/PGWBI.php") ;
}
if (array_key_exists("38",$_POST['ffmq'])) {
    //Assegno una variabile SESSION al form FFMQ
    $_SESSION['ffmq']=array();
    array_push($_SESSION['ffmq'],$_POST['ffmq']);
    //Mando alla pagina successiva
    header("location: /MBSR/PGWBI.php") ;
}
*/
$colonneFFMQ=array('Q1i1','Q1i2','Q1i3','Q1i4','Q1i5','Q1i6','Q1i7','Q1i8','Q1i9','Q1i10','Q1i11','Q1i12','Q1i13','Q1i14','Q1i15','Q1i16','Q1i17','Q1i18','Q1i19','Q1i20','Q1i21','Q1i22','Q1i23','Q1i24','Q1i25','Q1i26','Q1i27','Q1i28','Q1i29','Q1i30','Q1i31','Q1i32','Q1i33','Q1i34','Q1i35','Q1i36','Q1i37','Q1i38','Q1i39');
/*require 'backend/DataBase/InsertRegistrazione.php';
require 'backend/DataBase/SelezionaId.php';
require 'backend/DataBase/AggiornaDataBase.php';
if (!empty($_POST[ffmq])) {
    
    //creo una variabile contenente la data
    $oggi=strtotime("now");
    $oggconv=date("Y/m/d", $oggi);
    //inserirsco il codice e la data
    Insert_cod_date('ffmq', $_SESSION['codice'], $oggconv);
   
    //aggiorno la tabella in corrispondenza della data e del codice
    Carica_risp($colonneFFMQ,$_POST[ffmq] , 'ffmq','codice', $_SESSION['codice'],'data',$oggconv);
    
}*/
if ($_SESSION['bypass']!=='b1p4ss') {
        $_SESSION['denied']=" 1 " ;
        header("location: /Coco/frontend/pagine/Login.php");
}
require 'backend/DataBase/UpLoadAnswersBot.php';
if (!empty($_POST[ffmq])) {
    Upload_answersbot('ffmq', $colonneFFMQ, $_POST[ffmq], $_SESSION['codice']);
    header("location: /Coco/frontend/pagine/provastiky.php");
}

$ffmq=array(
1=> 'Mentre cammino, sto attento/a alle sensazioni del mio corpo che si sta muovendo.',
2=> 'Sono bravo/a a trovare le parole che descrivono i miei sentimenti.',
3=> 'Critico me stesso/a per avere emozioni irrazionali o inappropriate.',
4=> 'Percepisco i miei sentimenti e le mie emozioni senza essere costretto/a a reagirvi.',
5=> 'Quando faccio qualcosa la mia mente tende a vagare e mi distraggo facilmente.',
6=> 'Quando faccio il bagno o la doccia, cerco di prestare attenzione alle sensazioni prodotte dall\'acqua sul mio corpo.',
7=> 'Riesco facilmente a trovare le parole per esprimere le mie credenze, le mie opinioni e le mie aspettative.',
8=> 'Non presto attenzione a quello che faccio, perché sogno ad occhi aperti, sono preoccupato/a o distratto/a.',
9=> 'Osservo i miei pensieri senza perdermi in essi.',
10=> 'Dico a me stesso/a che non dovrei sentirmi nel modo in cui mi sento.',
11=> ' Mi accorgo di come i cibi e le bevande influenzano i miei pensieri, le mie sensazioni corporee e le mie emozioni.',
12=> 'Per me è difficile trovare le parole per descrivere quello a cui sto pensando.',
13=> 'Mi distraggo facilmente.',
14=> 'Credo che alcuni dei miei pensieri siano anormali o cattivi e che non dovrei pensarla in questo modo.',
15=> 'Presto attenzione alle sensazioni, come il vento nei capelli o il sole sul viso.',
16=> 'Per me è un problema trovare le parole giuste per descrivere quello che penso.',
17=> 'Tendo a giudicare i miei pensieri come buoni o come cattivi.',
18=> 'Trovo difficile rimanere concentrato/a su quello che accade nel presente.',
19=> 'Quando i miei pensieri mi turbano, faccio un passo indietro e sono consapevole del pensiero o dell\'immagine senza esserne sopraffatto/a.',
20=> 'Presto attenzione ai rumori, come ad esempio al ticchettio dell\'orologio, al cinguettio degli uccelli o al passaggio delle macchine.',
21=> 'Nelle situazioni difficili riesco a fermarmi senza reagire immediatamente.',
22=> 'Quando provo una sensazione sul mio corpo, mi risulta difficile descriverla perché non trovo le parole giuste.',
23=> 'Mi sembra di funzionare in automatico senza troppa consapevolezza di quello che sto facendo.',
24=> 'Quando i miei pensieri o immagini mi turbano, riesco a calmarmi in poco tempo.',
25=> 'Dico a me stesso/a che non dovrei pensare nel modo in cui penso.',
26=> 'Noto gli aromi e gli odori delle cose.',
27=> 'Spesso quando sono sconvolto/a riesco a trovare il modo per esprimerlo a parole.',
28=> 'Svolgo frettolosamente le mie attività senza prestarvi davvero attenzione.',
29=>'Quando i miei pensieri o immagini mi turbano, sono in grado di accorgermene senza reagire.',
30=> 'Ritengo che alcune delle mie emozioni siano cattive o inappropriate e che non dovrei sentirle.',
31=> 'Noto gli aspetti visivi nell\'arte e nella natura, come i colori, le forme, le trame o i giochi di luci e ombre.',
32=> 'La mia inclinazione naturale è quella di tradurre le mie esperienze in parole.',
33=> 'Quando i miei pensieri e immagini mi turbano, li noto soltanto e li lascio andare.',
34=> 'Svolgo dei lavori e dei compiti automaticamente senza essere consapevole di quello che sto facendo.',
35=> 'Quando i miei pensieri o immagini mi turbano, giudico me stesso/a come buono/a o come cattivo/a, a seconda del contenuto del pensiero o dell\'immagine.',
36=> 'Presto attenzione a come le mie emozioni influenzano i miei pensieri e il mio comportamento.',
 37=> 'Di solito sono capace di descrivere abbastanza dettagliatamente come mi sento in un dato momento.',
38=> 'Mi trovo a fare cose senza prestarvi attenzione.',
39=> 'Sono critico/a con me stesso/a quando mi vengono delle idee irrazionali.'
);
$controllo='required';
?>
<html><head>

<title>FFMQ</title>
<?php require 'backend/css/ffmq/Style.php'; ?>
</head>
<body>
	<h1>FFMQ</h1>
	<div class="col-9 consegna">
		Risponda ai seguenti items, indicando per ognuno la risposta che meglio descrive la sua opinione o ciò che è più aderente al suo sentire.
		
	</div>
	<form action="/Coco/frontend/pagine/Login.php" method="post"  >
	<div style="width:25%;float:right">
		Disconetti<input  name="out" type ="radio" value="1">
		<p><input type="submit" value="Invia"/></p>
	</div>
	</form>
	
	<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		
		<?php 

$chiave='1';
 foreach ($ffmq as $chiave=>$testo){
   
     echo  
        '<div class="col-12 tenda">
            <p class="color">'.$testo.'</p>
            <label class="contenitore" ">
                Mai
                <input  name="ffmq['.$chiave.']" type="radio" value="1" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Raramente 
                <input  name="ffmq['.$chiave.']" type="radio" value="2" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Qualche volta
                <input name="ffmq['.$chiave.']" type="radio" value="3" '.$controllo.' />
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
               Spesso
                <input  name="ffmq['.$chiave.']" type="radio" value="4" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            <label class="contenitore" >
                Molto Spesso
                <input  name="ffmq['.$chiave.']" type="radio" value="5" '.$controllo.'/>
                <span class="buttondo"></span>
            </label>
            
          </div>';
    
 }
?>


    	 <br>
     	<p><input type="submit" value="Invia"/></p>
     </form>
	</body>
</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	