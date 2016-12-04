<?php include_once "/includes/function.php";
	$log = selectOneUser($_SESSION['id_utilisateur']);
	echo $log[0];			
	include_once "deconnexion.php";
	$tri = selectAllCategories(); ?>
<ul>
	<?php while ($tab = mysqli_fetch_array($tri)) { ?>
	<li><a href="categorie.php?idCategorie=<?php echo $tab['id_categorie']; ?>">
   <?php echo $tab['nom']; ?></a></li>
	<?php } ?>
</ul>
