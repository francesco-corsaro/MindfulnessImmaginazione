<?php
session_start();
if ($_SESSION['bypass']!=='b1p4ss') {
    $_SESSION['denied']=" 1 " ;
    header("location: /Coco/frontend/pagine/Login.php");
}
$colonneVivi=array('Q2i1','Q2i2','Q2i3','Q2i4','Q2i5','Q2i6','Q2i7','Q2i8','Q2i9','Q2i10','Q2i11','Q2i12','Q2i13','Q2i14','Q2i15','Q2i16');
//inserisco le risposte nel test
require 'backend/DataBase/UpLoadAnswersBot.php';
if (!empty($_POST[vividezza])) {
    Upload_answersbot('Vividezza', $colonneVivi, $_POST[vividezza], $_SESSION['codice']);
    header("location: /Coco/frontend/pagine/MSP.php");
}

$stiky=array( 
    'Nel rispondere alle domande da 1 a 4 pensi a qualche persona cara che vede spesso (ma che ora non è qui con Lei) e consideri attentamente l\'immagine che compare al suo occhio della mente',
    "Immagini un sole nascente. Consideri attentamente l'immagine che compare al suo occhio della mente.",
    "Pensi alla facciata di un negozio nel quale si reca spesso. Consideri l'immagine che si presenta al suo occhio della mente.",
    "Per finire pensi ad un'immagine di campagna con alberi, montagne e un lago. Consideri l'immagine che compare dinanzi al suo occhio della mente."
);
$domande=array(
    "L'esatto contorno della faccia, testa, spalle e corpo.",
    "Posizioni caratteristiche della testa, atteggiamento del corpo ecc",
    "L'andatura precisa, la lunghezza dei passi, ecc.",
    "I differenti colori dei vestiti di solito indossati.",
    "Il sole sta sorgendo all'orizzonte in un cielo nebbioso.",
    "Il blu di un cielo chiaro fa da sfondo al sole.",
    "Nuvole. Si avvicina un temporale con lampi.",
    "Appare l'arcobaleno.",
    "Come appare nel complesso il negozio visto dal lato opposto della strada.",
    "Una visione più particolare che includa forme, colori e dettagli degli oggetti in vendita.",
    "Siete vicino alla porta: colore, forma e particolari della porta.",
    "Entrate nel negozio e rivolgetevi alla commessa che vi serve. Poi la pagate.",
    "I contorni del paesaggio.",
    "Colore e forma degli alberi.",
    "Colore e forma del lago.",
    "Un forte vento scuote gli alberi e nel lago si increspano le onde."
);

$risposte=array(
    "Nessuna immagine",
    "Immagine vaga ed offuscata",
    "Immagine mediamente chiara e vivida",
    "Immagine chiara e abbastanza vivida",
    "Immagine perfettamente chiara e vivida come una normale visione"
    
);
?>
<html>
	<head>
<title>VividezzaDellImmagine</title>

<?php require 'backend/css/VividezzaImmagine/Style.php';?>
</head>
	<body>
		 <h1>Vividezza Dell'Immagine<?php echo ' '.$_SESSION['codice'].'<br>'.$stato1;?></h1>
		<div class="col-9 consegna">	
    		Per ciascuna delle situazioni seguenti viene proposto di chiudere gli occhi e provare ad
    		immaginare qualcosa. Valutare la vividezza della immagine che si riesce a creare nella mente
    		facendo riferimento alla seguente scala a 5 livelli:
    		<?php 
    		$num=1;
    		foreach ($risposte as $risposta){
    		    echo"<br>".$num.") ".$risposta;
    		    $num++;
    		};
    		?>
    	</div>
    	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		<?php
		for ($i = 0; $i < 4; $i++) {
		    if ($i==0){
		    echo '
            		<div class="col-9 sezione">
            			<div class="adesivo attak col-12">'
            			 .$stiky[$i].'
            			</div>';
            			 
            			     for ($t = 0; $t < 4; $t++) {
            			         echo '
                        <div class="row">   
                            <div class="col-12 tenda">
                                <div class="color">
                                     '.$domande[$t].'
                                </div>
                                <div class="col-12">';
            			         for ($u = 1; $u < 5; $u++) {
            			             echo '
                                     <div class="col-12">
				                            <label class="contenitore" id="'.$risposte[$u].'">
        			                            <input  name="vividezza['.$t.']" type="radio" id="'.$risposte[$u].'" value="'.$u.'" '.$controllo.'/>
				                                <span class="buttondo" id="'.$risposte[$u].'" ></span>
				                                '.$risposte[$u].'
                                            </label>
                                        </div>';
            			         } echo '
                                 </div>
                           </div>
                    </div>';
            			         
            			         
            			     }echo '</div>';
            				
		     
		    }elseif ($i==1){
		        echo '
            		<div class="col-9 sezione">
            			<div class="adesivo attak col-12">'
        .$stiky[$i].'
            			</div>';
        
        for ($t = 4; $t < 8; $t++) {
            echo '
                        <div class="row">
                            <div class="col-12 tenda">
                                <div class="color">
                                     '.$domande[$t].'
                                </div>
                                <div class="col-12">';
            for ($u = 1; $u < 5; $u++) {
                echo '
                                     <div class="col-12">
				                            <label class="contenitore" id="'.$risposte[$u].'  ">
        			                            <input  name="vividezza['.$t.']" type="radio" id="'.$risposte[$u].'" value="'.$u.'" '.$controllo.'/>
				                                <span class="buttondo" id="'.$risposte[$u].'" ></span>
				                                '.$risposte[$u].'
                                            </label>
                                        </div>';
            } echo '
                                 </div>
                           </div>
                    </div>';
            
            
        }echo      '<div>';
		    }elseif ($i==2){
		        echo '
            		<div class="col-9 sezione">
            			<div class="adesivo attak col-12">'
            			         .$stiky[$i].'
            			</div>';
            			         
            			         for ($t = 8; $t < 12 ;$t++) {
            			             echo '
                        <div class="row">
                            <div class="col-12 tenda">
                                <div class="color">
                                     '.$domande[$t].'
                                </div>
                                <div class="col-12">';
            			             for ($u = 1; $u < 5; $u++) {
            			                 echo '
                                     <div class="col-12">
				                            <label class="contenitore" id="'.$risposte[$u].'  ">
        			                            <input  name="vividezza['.$t.']" type="radio" id="'.$risposte[$u].'" value="'.$u.'" '.$controllo.'/>
				                                <span class="buttondo" id="'.$risposte[$u].'" ></span>
				                                '.$risposte[$u].'
                                            </label>
                                        </div>';
            			             } echo '
                                 </div>
                           </div>
                    </div>';
            			             
            			             
            			         }echo '</div>';
            			         
            			         
		    }elseif ($i==3){
		        echo '
            		<div class="col-9 sezione">
            			<div class="adesivo attak col-12">'
                                .$stiky[$i].'
            			</div>';
                                
                                for ($t = 12; $t < 16; $t++) {
                                    echo '
                        <div class="row">
                            <div class="col-12 tenda">
                                <div class="color">
                                     '.$domande[$t].'
                                </div>
                                <div class="col-12">';
                                    for ($u = 1; $u < 5; $u++) {
                                        echo '
                                     <div class="col-12">
				                            <label class="contenitore" id="'.$risposte[$u].'  ">
        			                            <input  name="vividezza['.$t.']" type="radio" id="'.$risposte[$u].'" value="'.$u.'" '.$controllo.'/>
				                                <span class="buttondo" id="'.$risposte[$u].'" ></span>
				                                '.$risposte[$u].'
                                            </label>
                                        </div>';
                                    } echo '
                                 </div>
                           </div>
                    </div>';
                                    
                                    
                                }echo      '<div>';
		    }
		}
		/* foreach ($stiky as $adesivo) {
		     echo '
            		<div class="col-9 sezione">	
            			<div class="adesivo attak col-12">'.$adesivo.'
            			</div>';
		      foreach ($domande as $chiave => $domanda) {
				    echo '<div class="row"><div class="col-12 tenda">
                                <div class="color">
                                     '.$domanda.'
                                </div>
                                <div class="col-12">';
				    $value=0;
				    foreach ($risposte as $risposta) {
				        echo ' <div class="col-12">
				                    <label class="contenitore" id="'.$risposta.'  ">

				                        <input  name="vividezza['.$chiave.']" type="radio" id="'.$risposta.'" value="'.$value.'" '.$controllo.'/>
				                        <span class="buttondo" id="'.$risposta.'" ></span>
				                        '.$risposta.'
                                    </label>
                                </div>';
				        $value++ ;
				    } echo '  </div>
                          </div></div>';
				}
				echo '</div>';
		 }*/
				?>
			
			
					<br>
					<p><input type="submit" value="Invia"/></p>
			</form>
    	
		 
    </body>
 </html>	
    	
    	
    	
    	
    	
    	