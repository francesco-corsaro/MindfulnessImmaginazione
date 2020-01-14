<?php
session_start();
require 'backend/DataBase/SelezionaId.php';
if (!empty($_POST[email])) {
   // Associa_Id($_POST[email], $_POST[pwd]);
    //$_SESSION['codice']=$id;
   // header("location: /Coco/frontend/pagine/FFMQ.php");
    require 'backend/Accesso.php';
}
if ($_POST['out']==1) {
    $_SESSION['bypass']=0;
}
?>

<html>
    <head>
    	<title>Login</title>
    	
    	<?php require 'frontend/css/login/Style.php'; ?>
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
    </head>

	<body>
		<h1>Ricerca MindFulness<?php echo $stato ;?></h1>
		
		<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		<?php 
		if ($_SESSION['denied']== 1) {
		    echo "<div>Utentente non trovato</div>";
		    $_SESSION['denied']== 0;
		}?>
		<div class="col-9 tenda">
    				<div class="titolo">Login</div>
    					<div class="col-11">
    						<div class="roi"><?php echo $meccanico;?> <?php if ($_SESSION['cambiopwd']==1) {echo '<div>Password modificata</div>';} ?>
    							Inserisci Username e password
    						</div>
        				</div>
        				
                    		<div class="col-6">	
                    			<?php echo $emailErr;?>
                    			<input name="email" type="TEXT" placeholder="Username" required>
                    		</div>
                    		<div class="col-12">
                        		<div class="col-6">
                        			<input name="pwd" type="password"  maxlength="8" id="myInput" placeholder="Password" required  >
                        		</div>
                        		<div class=" consegna">
                        			<input type="checkbox" onclick="myFunction()">Mostra Password
                        		</div>
                			</div>
                			<div class="col-12 collegamento">
                				<a href="/Coco/pagine/NewPwd.php" >Hai dimenticato la password? Clicca qui</a>
                			</div>
						<div class="col-12">
                    		<input type="submit" id="myBtn" value="Accedi" disabled/>
                    		<script src="/Coco/pagine/frontend/css/DisabilitaSubmit.js"> </script>
                    	</div>
                    	<div class="col-12 consegna">
                    		Oppure <b><a href="/Coco/pagine/Registrazione.php">Registrati</a></b>
                    	</div>
		</div>
		</form>
	</body>
</html>