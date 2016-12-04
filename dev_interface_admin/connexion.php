<?php include_once "includes/function.php" ?>
	<?php
		//traitement du formulaire.
			if($_POST){
				if(isset($_POST['connect'])){
				$login = $_POST['login'];
				$password = $_POST['password'];
				$user = ConnexionUser($login, $password);
				if($user){
					$_SESSION['login'] = $login;
					$_SESSION['password'] = $password;
					$log = selectOneUser($user[0]);
					include_once "dashboard.php";
				}
				elseif($user == NULL){ ?>
				<form name="connect" method="POST" action="connexion.php">
					<input type="text" name="login" placeholder="login" value ="<?php if (isset($_POST['login'])){echo $_POST['login'];} ?>"><br>
					<input type="password" name="password" placeholder="mot de passe"><p class="error">Login ou mot de passe incorrect</p><br>
					<input type="submit" value="envoyer">
				</form>
			<?php }
			}
			elseif(isset($_POST['addUser'])){
						$login = $_POST['login'];
						$password = $_POST['password'];
						$confirm = $_POST['confirm'];
						$mail = $_POST['mail'];
						$role = 2;
						if($password == $confirm){
							$add = addUser($login,$password,$mail,$role);
						}
						else{
							echo "mdp incorrect";
						}
					}}else{ ?>
	<form name="connect" method="POST" action="connexion.php">
					<input type="text" name="login" placeholder="login" value ="<?php if (isset($_POST['login'])){echo $_POST['login'];} ?>"><br>
					<input type="password" name="password" placeholder="mot de passe"><br>
					<input type="submit" value="envoyer" name="connect">
	</form>
	<button>S'inscrire</button>
	<form name="insertUser" method="POST" action="connexion.php">
							<label for="log">Login :</label>
							<input type="text" name="login" id="log">
							<br>
							<label for="passwd">Mot de passe :</label>
							<input type="password" name="password" id="passwd">
							<br>
							<label for="confirm">Confirmation :</label>
							<input type="password" name="confirm" id="confirm">
							<br>
							<label for="mail">e-mail :</label>
							<input type="text" name="mail" id="mail">
							<br>
							<input type="submit" name="addUser" value="envoyer">
						</form>
	<?php } ?>