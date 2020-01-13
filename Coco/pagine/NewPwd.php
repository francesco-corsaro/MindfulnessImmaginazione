<?php session_start();
require 'backend/SicurezzaForm/SicurezzaForm.php';
if (!empty($_POST[email])){
test_input_email($_POST[email]);
//test_input_nome($_POST[nome]);
//test_input_cognome($_POST[cognome]);
test_input_pwd($_POST[pwd1], $_POST[pwd2]);
//test_input_info( $_POST[eta], 18, 99);
test_input_info($_POST[peso], 30, 150);
test_input_info($_POST[altezza], 110, 250); ;

require 'backend/DataBase/CambiaPwd.php';
// if (!empty($_POST[email])  && $emailStat==1 && $nomeStat==1 && $cognomeStat==1 && $pwdStat && $infoStato!=0) {
    if ($emailStat==1 && $pwdStat && $infoStato!=0){
 
    cambia_pwd(Anagrafica,pwd,$hash,email,$email,peso,$_POST[peso],altezza,$_POST[altezza]);
    $_SESSION['cambiopwd']=1;
    header("location: /Coco/pagine/Login.php");
 }
}
?>
<html>
    <head>
    	<title>Modifica Password </title>
    	
    	
        <?php require 'frontend/css/ffmq/Style.php'; ?>
        
        <script> <!-- con questo script si mostra la password -->
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
         </script>
         <script> <!-- con questo script si mostra la password -->
            function myFunction1() {
              var x = document.getElementById("myInput1");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
         </script>
    </head>

	<body>
		<h1>Ricerca MindFulness</h1>
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
    			
    			<div class="col-9 tenda">
    				
    					<div class="col-11">
    						<div class="roi">
    							Inserisci i tuoi dati e la nuova password <?php echo $mexpwd;?>
    						</div>
        				</div>
                		<div class="col-6">	
                				<?php echo $emailErr;$emailErr='';?>
                				<input name="email" type="TEXT" placeholder="Email" required>
                				
						</div>    			
                		<div class="col-8">
                		
            			<?php echo $infoErr;$infoErr='';?>	
                    	<div class="col-3 sezione">
                    		<input name="peso" type="TEXT"   placeholder="Peso in kg" maxlength="2" required >
                    	</div>
                    	<div class="col-3 sezione">
                    		<input name="altezza" type="TEXT"   placeholder="Altezza in cm" maxlength="3" required >
                    	</div>
                    	<?php echo $pwdErr;?>
                				<div class="col-7">
                				
                					<input name="pwd1" type="password"  maxlength="8" id="myInput" placeholder="Inserire Password" required  >
                				</div>
                				<div class="col-7">
                					<div class=" consegna">
                					<input type="checkbox" onclick="myFunction()">Mostra Password
                				</div>
                					<input name="pwd2" type="password"  maxlength="8" id="myInput1" placeholder="Conferma Password" required  >
                				</div>
                				<div class=" consegna">
                					<input type="checkbox" onclick="myFunction1()">Mostra Password
                				</div>
            			</div>
                    	<div class="col-12">
                    		<input type="submit" value="Invia"/>
                    	</div>
            
            </div>
            
    		</form>
    	
	</body>
</html>