<html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="Pierre, Alberti, système, partide, jdr">
	<meta name="Partide" content="système de jeu inventé par pierre Alberti">
	<title>Intégration web S3</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="js/main.js"></script>
</head>

<body>
	<?php include_once "includes/function.php";
	$log = selectOneUser($_SESSION['id_utilisateur']); 
		echo $log[0];
		$page = "article"; ?>
		<?php 		
			$article = $_GET['idArticle'];
			$ART = affichageART($article);
			$MED = selectMedia($article);
			if($_POST){
					if(isset($_POST['updateArticle'])){
						$title = $_POST['titre'];
						$text = $_POST['text'];
						updateART($article, $title, $text);
					}
					elseif(isset($POST['cross'])){
						deleteART($article);
					}
			}else{?>
			<?php if($_SESSION['id_utilisateur'] == $ART['id_utilisateur'] || $log[1] == 1 ){
				$cross = buttonCross($page);
				} ?>
				<h2><?php echo $ART['title']; ?></h2>
				<img src="<?php echo $MED['chemin'] ?>" alt="<?php echo $MED['id-medias'] ?>">
				<p>
					<?php echo $ART['date']; ?>
				</p>
				<p>
					<?php echo $ART['texte']; ?>
				</p>
				<?php } ?>
					<div class="modifier">
						<h2>Modifier un article</h2>
						<?php if($_SESSION['id_utilisateur'] == $ART['id_utilisateur'] || $log[1] == 1 ){ ?>
							<form name="updArt" method="POST" action="admin.php">
								<label for="ajoutT">Titre</label>
								<input type="text" name="titre" id="ajoutTi" value="<?php $ART['title'] ?>">
								<label for="ajoutTe">Texte</label>
								<textarea name="text" id="ajoutTe" rows="12" cols="70" value="<?php $ART['texte'] ?>"></textarea>
								<input type="submit" name="updateArticle" value="modifier" id="mod">
							</form>
					</div>
				<?php } ?>
			<div id="commentaires">
				<ul>
			<?php $com = selectCom($article);
				while($tab= mysqli_fetch_array($com)){ ?>
				
						<li><p>
								<?php echo $tab['date']; ?>
							</p>
							<p>
								<?php echo $tab['texte']; ?>
							</p>
							
						</li>
				<?php }?>
				</ul>
			</div>
</body>
</html>