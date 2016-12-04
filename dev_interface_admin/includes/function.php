<minicode="php">
	<?php session_start(); ?>
		</minicode>
		<?php //fichier php créé par Pierre Alberti et Yao Chen


// fonction de connexion à la bdd
function connexionBDD(){
	$host = "localhost";
	$root = "root";
	$user = "";
	$bdd = "tp_mmi";
	$connect = mysqli_connect($host, $root,$user, $bdd) or die ('could not acess database');
	$charset =mysqli_set_charset($connect,'utf8mb4');
	return $connect;
}
function CloseBDD(){
	$connect = connexionBDD();
    $close = mysql_close($connect);
    return $close;
}
//Catégories
	//selection de toutes les catégories
	function selectAllCategories() {
		$myconnexion = connexionBDD();
		$sql = "SELECT id_categorie, nom FROM categories ORDER BY id_categorie";
		$myResult = mysqli_query($myconnexion,$sql);
 		return $myResult;
	}
	//selection d'une catégorie
	function selectOneCategorie($idCategorie){
		$myconnexion = connexionBDD();
		$sql = "SELECT nom,id_categorie FROM categories WHERE id_categorie=$idCategorie";
    	$myResult = mysqli_query($myconnexion,$sql);
    	$myCategorie = mysqli_fetch_array($myResult);
    	return $myCategorie;
	}	
	//suppression d'une catégorie
	function deleteCat($idCategorie){
		$myconnexion = connexionBDD();
		$sql = "DELETE from Categories WHERE id_categorie LIKE '$idCategorie'";
		$myResult = mysqli_query($myconnexion,$sql);
		}
	// modification d'une catégorie
	function updateCat($idCategorie, $nom){
		$myconnexion = connexionBDD();
		$sql = "UPDATE Categories SET nom = '$nom' WHERE id_categorie = $idCategorie";
		$myResult = mysqli_query($myconnexion,$sql);
	}
	// insertion d'une catégorie
	function addCat($nom){
		$myconnexion = connexionBDD();
		$sql = "INSERT INTO `categories`(`id_categorie`, `nom`) VALUES ('', '$nom');";
    	$myResult = mysqli_query($myconnexion,$sql);
	}
//Articles-Catégories
	//Insertion
	function addCatArt($idCat){
		$myconnexion = connexionBDD();
		$sql = "SELECT id_article FROM `articles` ORDER BY id_article DESC LIMIT 1";
		$myResult = mysqli_query($myconnexion,$sql);
		$idArt = mysqli_fetch_array($myResult);
		$sql2 = "INSERT INTO `categorie_article`(`id_art`, `id_cat`) VALUES ('$idArt[0]','$idCat[0]')";
    	$myResult1 = mysqli_query($myconnexion,$sql2);
	}
	//suppression
	function delCatArt($idCat, $idArt){
		$myconnexion = connexionBDD();
		$sql = "DELETE FROM `categorie_article` WHERE `id_art` = '$idArt' AND `id_cat`= '$idCat'";
    	$myResult = mysqli_query($myconnexion,$sql);
	}
	//Modification
	function updCatArt($idArt, $idCat){
		$myconnexion = connexionBDD();
		$sql = "UPDATE `categorie_article` SET `id_cat`= '$idCat' WHERE `id_art` = '$idArt'";
    	$myResult = mysqli_query($myconnexion,$sql);
	}
	//affichage d'une liste d'article par catégorie
	function categorieART($idCategorie){
		$myconnexion = connexionBDD();
		$sql = "SELECT texte,title,date,id_article,id_utilisateur FROM `articles` LEFT JOIN `categorie_article` ON  articles.id_article = categorie_article.id_art WHERE id_cat=$idCategorie ORDER BY date";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
//Articles
	//insertion d'un article
	function insertART($idUser,$date,$text,$title){
		$myconnexion = connexionBDD();
		$sql = "INSERT INTO `articles`(`id_article`, `id_utilisateur`, `date`, `texte`, `title`) VALUES ('','$idUser','$date','".addslashes($text)."','".addslashes($title)."')";
    	$myResult = mysqli_query($myconnexion,$sql);
	}
	//affichage basique d'un article
	function affichageART($idArticle){
		$myconnexion = connexionBDD();
		$sql="SELECT title,texte,date,id_article,id_utilisateur FROM articles WHERE id_article=$idArticle";
		$myResult= mysqli_query($myconnexion,$sql);
		$myArticle = mysqli_fetch_array($myResult);
		return $myArticle;
	}
	//fonction d'affichage des articles sur l'acceuil du site
	function affichageARTac(){
		$myconnexion = connexionBDD();
		$sql="SELECT title,texte,date,id_article FROM articles ORDER BY date LIMIT = 5";
		$myResult= mysqli_query($myconnexion,$sql);
		return $myResult;
	}
	//modification d'article
	function updateART($idArticle, $titre, $text){
		$myconnexion = connexionBDD();
		$sql = "UPDATE `tp_mmi`.`articles` SET `texte` = '".addslashes($text)."', `title` = '".addslashes($titre)."' WHERE `articles`.`id_article` = $idArticle;";
		$myResult = mysqli_query($myconnexion,$sql) or die ('fail');
		echo 'réussi';
		return $myResult;
	}
	//suppression d'article
	function deleteART($idArticle){
		$myconnexion = connexionBDD();
		$sql = "DELETE from articles WHERE id_article LIKE '$idArticle'";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
	//Selections de tous les articles
	function SelectAllART(){
	$myconnexion = connexionBDD();
		$sql = "SELECT * FROM articles ORDER BY date";
		$myResult = mysqli_query($myconnexion,$sql);
 		return $myResult;
	}
	//Selections de tous les articles par utilisateur
	function SelectAllARTUser($idUser){
	$myconnexion = connexionBDD();
		$sql = "SELECT * FROM articles WHERE id_utilisateur LIKE '$idUser' ORDER BY date";
		$myResult = mysqli_query($myconnexion,$sql);
 		return $myResult;
	}
//Médias
	//fonction d'ajout de média
	function addMedia($idArticle, $nom, $type){
		$myconnexion = connexionBDD();
		$sql = "INSERT INTO `medias`( `id_article`, `chemin`, `type`) VALUES ('$idArticle', '$nom', '$type')";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
	//fonction de lecture de média
	function selectMedia($idArticle){
		$myconnexion = connexionBDD();
		$sql = "SELECT `id-medias`,`chemin` FROM medias WHERE id_article = $idArticle";
		$myResult = mysqli_query($myconnexion,$sql);
		$myMedia = mysqli_fetch_array($myResult);
		return $myMedia;
	}
	//fonction de suppression d'un média
	function delMedia($nom){
		$myconnexion = connexionBDD();
		$sql = "DELETE from Categories WHERE $nom LIKE '$nom'";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
//Commentaires
	//fonction d'ajout de commentaire
	function insertCom($iduser, $idarticle, $date, $texte){
		$myconnexion = connexionBDD();
		$sql = "INSERT INTO `commentaires`(`id_commentaire`, `id_utilisateur`, `id_article`, `Date`, `Texte`, `Statut`) VALUES 	('','$id_user','$article','$date','$texte','')";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
	//fonction d'affichage de commentaire par article
	function selectCom($idArticle){
		$myconnexion = connexionBDD();
		$sql = "SELECT `id_commentaire`,`id_utilisateur`,`Date`,`Texte` FROM `commentaires` WHERE id_article = $idArticle ORDER BY 'Date'";
		$myResult = mysqli_query($myconnexion,$sql);
		$myComArt = mysqli_fetch_array($myResult);
		return $myComArt;
	}
	//fonction d'affichage de commentaire par utilisateur
	function selectComUser($idUser){
		$myconnexion = connexionBDD();
		$sql = "SELECT * FROM `commentaire` WHERE id_user = $idUser ORDER BY 'Date'";
		$myResult = mysqli_query($myconnexion,$sql);
		$myComUsr = mysqli_fetch_array($myResult);
	return $myComUsr;
	}
	//modification de commentaire
	//fonction de suppression de commentaire
	function delCom($idCommentaire){
		$myconnexion = connexionBDD();
		$sql = "DELETE from `commentaire` WHERE id_commentaire LIKE '$idCommentaire'";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
//notes
	//ajout d'une note
	function addMark($idArticle,$note){
		$myconnexion = connexionBDD();
		$sql = "INSERT INTO `notes`(`id_note`, `id_article`, `note`) VALUES ('','$idArticle','$note')";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
	//affichage des notes cummulées
	function selectAllMarks(){
		$myconnexion = connexionBDD();
		$sql = "SELECT SUM(note) from `notes`'";
		$myResult = mysqli_query($myconnexion,$sql);
		$myMedia = mysqli_fetch_array($myResult);
	}
	//retrait d'une note
	function retMark($idNote){
		$myconnexion = connexionBDD();
		$sql = "DELETE from `notes` WHERE $idNote LIKE '$idNote'";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
//Utilisateurs
	//ajout d'un utilisateur
	function addUser($login,$pwd,$email,$idRole){
		$myconnexion = connexionBDD();
		$sql = "INSERT INTO `utilisateurs`(`id_utilisateur`, `login`, `password`, `email`, `id_role`) VALUES ('','$login','$pwd','$email','$idRole')";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
	//modification du mot de passe
	function updatePWD($idUser, $pwd){
		$myconnexion = connexionBDD();
		$sql = "UPDATE `utilisateurs` SET password = '$pwd' WHERE id_utilisateur = $idUser";
		$myResult = mysqli_query($myconnexion,$sql);
	}
	//modification de l'e-mail
	function updateMail($idUser, $email){
		$myconnexion = connexionBDD();
		$sql = "UPDATE `utilisateurs` SET email = '$email' WHERE id_utilisateur = $idUser";
		$myResult = mysqli_query($myconnexion,$sql);
	}
	//suppression d'un utilisateur
	function delUser($idUser){
		$myconnexion = connexionBDD();
		$sql = "DELETE from `utilisateurs` WHERE id_utilisateur LIKE '$idUser'";
		$myResult = mysqli_query($myconnexion,$sql);
		return $myResult;
	}
	//selection de tous les utilisateurs
	function selectAllUser() {
		$myconnexion = connexionBDD();
		$sql = "SELECT id_utilisateur, login FROM `utilisateurs` ORDER BY id_utilisateur";
		$myResult = mysqli_query($myconnexion,$sql);
 		return $myResult;
	}
	//selection d'un utilisateur
	function SelectOneUser($idUser){
		$myconnexion = connexionBDD();
		$sql = "SELECT login,id_role FROM `utilisateurs` WHERE id_utilisateur = $idUser";
    	$myResult = mysqli_query($myconnexion,$sql);
    	$myUser = mysqli_fetch_array($myResult);
    	return $myUser;
	}
	//fonction de session 
	function ConnexionUser($login, $passwd){
		$myconnexion = connexionBDD();
		$sql = "SELECT id_utilisateur FROM `utilisateurs` WHERE login LIKE '".$login."'";
    	$myResult = mysqli_query($myconnexion,$sql);
		if($myResult != NULL){
			$sql2 = "SELECT id_utilisateur FROM `utilisateurs` WHERE password LIKE '".$passwd."'";
			$myResult2 = mysqli_query($myconnexion,$sql2);
			if($myResult2 != NULL){
				$myUser = mysqli_fetch_array($myResult2);
				$_SESSION['id_utilisateur'] = $myUser[0];
				$user = $_SESSION['id_utilisateur'];
				}
			}
		return $user;
	}

//Rôles
//fonctions qui contienent des éléments capables de se retouver sur plusieurs pages pour différents cas
	function buttonCross($page){
			echo '<div class="Cross">';
			echo '<form name="cross" method="POST" action ="';
			echo $page;
			echo '.php">';
			echo '<input type="submit" name="cross" value="" class="cross">';
			echo '</form>';
			echo '</div>';
			}
?>