<?php include_once "/includes/function.php"?>
<?php 
	
	if($_POST){
		if(isset($_POST['fin'])){
		session_destroy();
		header('location: /tp_mmi/index.php');
		exit();
		}
	}
?>


<form name="deco" method="POST" action="deconnexion.php">
	<input type="submit" name="fin" value="se déconnecter">	
</form>