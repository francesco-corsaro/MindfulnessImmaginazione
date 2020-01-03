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
    	
    	<?php require 'backend/css/ffmq/Style.php'; ?>
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
		<h1>Ricerca MindFulness <?php echo ' '.$_SESSION['codice'].' '.$stato1;?></h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  >
		<?php 
		if ($_SESSION['denied']== 1) {
		    echo "<div>Utentente non trovato</div>";
		    $_SESSION['denied']== 0;
		}?>
		<div class="col-9 tenda">
    				
    					<div class="col-11">
    						<div class="roi"><?php echo $meccanico;?>
    							Inserisci Username e password
    						</div>
        				</div>
        				
                    		<div class="col-6">	
                    			<?php echo $emailErr;?>
                    			<input name="email" type="TEXT" placeholder="Username" required>
                    		</div>
                    		<div class="col-12">
                        		<div class="col-7">
                        			<input name="pwd" type="password"  maxlength="8" id="myInput" placeholder="Password" required  >
                        		</div>
                        		<div class=" consegna">
                        			<input type="checkbox" onclick="myFunction()">Mostra Password
                        		</div>
                			</div>
						<div class="col-12">
                    		<input type="submit" value="Invia"/>
                    	</div>
		</div>
		</form>
	</body>
</html>