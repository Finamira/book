<?php session_start() ?>
	
<body style="background-color:blue">
<?php if(isset($_POST['nom'])) { ?> 
	<h1 style="color:orange">Bonjour 
	<!-- Si le formulaire est posté -->
	<?php echo $_POST['nom']; 
		// on met des variables en session 
		$_SESSION['nomInSession']=$_POST['nom'];
		$_SESSION['commentaires']="IL FAUT REVISER SES COURS DE PHP";
	?> <br>
	<?php echo $_SESSION['nomInSession'];?>
	<a style="color:orange" href="page2.php">Page 2 </a>
	</h1><?php } else {?>
	<!-- Si le formulaire n'est pas posté -->
	<form name="monForm" method="POST" action="form.php">
		<input type="text" name="nom">
		<input type="submit">
	</form>
	<?php }  ?>
	