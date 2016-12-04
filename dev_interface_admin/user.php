<?php include_once "includes/function.php" ?>
	<?php
		//traitement du formulaire.
			if($_POST){
				$passwd = $_POST['password'];
				if($passwd = $_SESSION['password']){
					if(isset($_POST['updPasswd'])){
						
					}
					elseif(isset($_POST['updEmail'])){
					
					}
				}else{
					echo "erreur";
				}
			}
		?>
		<form name="updateUser" method="POST" action="user.php">
					<label for="passwd">Mot de passe :</label>
					<input type="password" name="password" id="passwd"> <br>
					
					<label for="newPasswd">Nouveau mot de passe :</label>
					<input type="password" name="newPassword" id="newPasswd"> <br>
					<label for="confirm">Confirmation :</label>
					<input type="password" name="confirm" id="confirm">
					<input type="submit" name="updPasswd" value="envoyer"> <br>
					
					<label for="newMail">Nouvel e-mail :</label>
					<input type="text" name="newMail" id="newMail">
					<input type="submit" name="updEmail" value="envoyer"> <br>
		</form>