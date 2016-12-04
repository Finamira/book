<html>

<body>
	<?php include_once "menu.php" ?>
		<?php include_once "includes/function.php";
		 //$user = ConnexionUser($login, $password);
		?>
			<?php
		$cat = $_GET['idCategorie'];
		$categorie = selectOneCategorie($cat);		
		?>
				<h1><?php echo $categorie['nom'] ?></h1>
				<ul>
					<?php $tri = categorieART($cat);
				while($tab= mysqli_fetch_array($tri)){ ?>
						<li>
							<h2><?php echo $tab['title']; ?></h2>
							<p>
								<?php echo $tab['date']; ?>
							</p>
							<p>
								<?php echo $tab['texte']; ?>
							</p>
							<a href="article.php?idArticle=<?php echo $tab['id_article']; ?>">lire la suite...</a>
						</li>
				
				<?php }?>
				</ul>
</body>

</html>