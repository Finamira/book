<?php /* Yao, cette page s'appelle la dashboard. c'est ici que l'utilisateur va faire toutes les actions avec la base de données. Pour expliquer ça simplement, c'est comme si la page admin était la partie invisible et la page dashboard la partie visible pour l'interaction avec la base de donnée. */

	?>
	<?php
		//Traitemants des formulaires
			if($_POST){
				//Ajout d'article
					if(isset($_POST['addArticle'])){
						$title = $_POST['title'];
						$text = $_POST['text'];
						$date = date("Y-m-d");
						$user = $_SESSION['id_utilisateur'];
						insertART($user,$date,$text,$title);
						$i = 0;
						foreach($_POST['categorie'] as $cat)
						{
							addCatArt($cat);
						}					
					}
				
				//Gestion des catégories
					elseif(isset($_POST['addCat'])){
						$nom = $_POST['nom'];
						echo $nom; 
						echo " a été insérée";
						addCat($nom);
					}
					elseif(isset($_POST['deleteCat'])){
						$del = $_POST['del'];
						echo $del;
						echo " a été supprimé";
						deleteCat($del);
						}
					elseif(isset($_POST['updateCat'])){
						$id = $_POST['upd'];
						$nom = $_POST['nom'];
						if($nom != NULL){
						updateCat($id, $nom);
						}
						else{
							echo '<p class ="erreur"> Aucun nom </p>';
						}
					}
				//Suppression d'articles
					elseif(isset($_POST['delArt'])){
						$delART = $_POST['delArticle'];
						deleteART($delART);
					}
				//Gestion des utilisateurs
					elseif(isset($_POST['deleteUser'])){
						$del = $_POST['delUsr'];
						delUser($del);
					}
					//gestion des changements utilisateurs
					elseif(isset($_POST['updPasswd'])){
						$passwd = $_POST['password'];
						if($passwd = $_SESSION['password']){
							$newPasswd = $_POST['newPassword'];
							$confirm = $_POST['confirm'];
							if($newPasswd == $confirm){
								updatePWD($idUser,$newPasswd);
							}
							else{echo"erreur";}
						}
						else{
						echo "erreur";
						}
					}
					elseif(isset($_POST['updEmail'])){
					$passwd = $_POST['password'];
						if($passwd = $_SESSION['password']){
							$email = $_POST['newMail'];
							updateMail($idUser, $email);
						}
						else{
						echo "erreur";
						}
					}
			} ?>
		<?php include_once "includes/function.php";
	include_once "menu.php";
	include_once "admin.php";
?>