<?php /*le fichier admin concerne toutes les modifications pouvant être apportées par un utilisateur en fonction de son rôle. L'accessibilité aux fonctions est limitées en fonction du rôle via des conditions. 
*/?>
	<?php
	include_once "includes/function.php";
	$log = selectOneUser($_SESSION['id_utilisateur']);
	$idUser = $_SESSION['id_utilisateur'];
	?>
		<html lang="en">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="keywords" content="Pierre, Alberti, système, partide, jdr">
			<meta name="Partide" content="système de jeu inventé par pierre Alberti">
			<title>Intégration web S3</title>
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			<script src="js/main.js"></script>
		</head>	<?php
				// définition des pouvoirs en fonction du rôle
				// Pouvoirs communs à tous les utilisateurs connectés, peu importe leur rôle.
				if($log[1] == 3 || $log[1] == 2){ ?>
				<!-- Gestion des articles -->
				<div class="insérer">
					<h2>Insérer un article</h2>
					<form name="insertArticle" method="POST" action="dashboard.php">
						<label for="title">Titre :</label>
						<input type="text" name="title" id="title">
						<br>
						<label for="ajoutTe">Texte</label>
						<textarea name="text" id="ajoutTe" rows="12" cols="70"></textarea>
						<br>
						<?php
					$tri = selectAllCategories();
					while ($tab = mysqli_fetch_array($tri)) { ?>
							<input type="checkbox" name="categorie[]" value="<?php echo $tab['id_categorie'] ?>">
							<?php echo $tab['nom']; ?>
								<br>
								<?php } ?>
									<input type="submit" name="addArticle" value="envoyer">
					</form>
				</div>
				<div class="user">
					<form name="updateUser" method="POST" action="dashboard.php">
						<label for="passwd">Mot de passe :</label>
						<input type="password" name="password" id="passwd">
						<br>

						<label for="newPasswd">Nouveau mot de passe :</label>
						<input type="password" name="newPassword" id="newPasswd">
						<br>
						<label for="confirm">Confirmation :</label>
						<input type="password" name="confirm" id="confirm">
						<input type="submit" name="updPasswd" value="envoyer">
						<br>

						<label for="newMail">Nouvel e-mail :</label>
						<input type="text" name="newMail" id="newMail">
						<input type="submit" name="updEmail" value="envoyer">
						<br>
					</form>
				</div>
				<?php
				// Pouvoirs disponibles seulement pour l'administrateur
				}elseif($log[1] == 1){ ?>
					<!-- Gestion des catégories -->
					<div id="admintab">
						<h2>Insérer une catégorie</h2>
						<form name="addcat" method="POST" action="dashboard.php">
							<label for="ajout">Créer une catégorie</label>
							<input type="text" name="nom" id="ajout">
							<input type="submit" name="add" id="send" value="ajouter">
						</form>
						<form name="delCat" method="POST" action="admin.php">
							<select name="del">
								<?php $tri = selectAllCategories(); 
					while ($tab = mysqli_fetch_array($tri)) { 
						echo '<option value="';
						echo $tab['id_categorie'];
						echo '">';
						echo $tab['nom'];
						echo "</option>";
					} ?>
							</select>
							<input type="submit" name="deleteCat" id="supprimer" value="supprimer">
						</form>
						<form name="upd-cat" method="POST" action="admin.php">
							<select name="upd">
								<?php $tri = selectAllCategories(); 
				while ($tab = mysqli_fetch_array($tri)) { 
					echo '<option value="';
					echo $tab['id_categorie'];
					echo '">';
					echo $tab['nom'];
					echo "</option>";
				} ?>
							</select>
							<label for="modif">Rennomer la catégorie :</label>
							<input type="text" name="nom" id="modifier">
							<input type="submit" name="update" value="modifier" id="mod">
						</form>
						<!-- suppression des articles -->
						<form name="del-art" method="POST" action="dashboard.php">
							<select name="delArticle">
								<?php $tri = SelectAllART();
								while($tab= mysqli_fetch_array($tri)){
										echo '<option value="';
										echo $tab['id_article'];
										echo '">';
										echo $tab['title'];
										echo " - ";
										echo $tab['date'];
										echo "</option>";
									} ?>
								</select>
								<input type="submit" name="delArt" value="supprimer">
						</form>						
						<form name="delUser" method="POST" action="dashboard.php">
							<select name="delUsr">
								<?php $tri = selectAllUser();
					while ($tab = mysqli_fetch_array($tri)) { 
						echo '<option value="';
						echo $tab['id_utilisateur'];
						echo '">';
						echo $tab['login'];
						echo "</option>";
					} ?>
							</select>
							<input type="submit" name="deleteUser" id="supprimer" value="supprimer">
						</form>
					</div>
					<?php }
				else{ ?>
						<?php } ?>