<!DOCTYPE html>
<!--fichier html/php créé par Pierre Alberti-->
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
	<?php include_once "/includes/function.php" ?>
		<?php $tri = selectAllCategories(); 
		var_dump($tri)?>
	<h1>Ajouter un article</h1>
	<article></article>
	<form name="itws3" method="POST" action=""  enctype="multipart/form-data">
		<title value = "blog">Blog</title>
		<input type="text" name="titre" value="title">
		<textarea name ="commentaire" value="texte"></textarea>
		<input type="file" name="image" value="insert image">
		<input type="hidden" name="MAX_FILE_SIZE" value="30000" /><br>
		<?php
		while ($tab = mysqli_fetch_array($tri)) { ?>
		<input type="checkbox" name="<?php echo $tab['id_categorie'] ?>"><?php echo $tab['nom']; ?><br>
		<?php } ?>
		<input type="submit" value="envoyer">
		<input type="reset" value="effacer">
	</form>
</body>

</html>