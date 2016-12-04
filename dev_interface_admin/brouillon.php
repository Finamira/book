<?php include_once "includes/function.php" ?>
	<?php
		//traitement du formulaire.
	if($_POST){
				$type = 1;
				$upload_dir = "img";
				$nom = $_FILES['file']['name'];
				$chemin = "$upload_dir/$nom";
				$idArt = 2;
				move_uploaded_file($nom,$chemin);
				addMedia($idArt,$chemin,$type);
		}
	?>
<form name="uploadMed" method="POST" action="brouillon.php"  enctype="multipart/form-data">
					<input type="file" name="file">
					<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
					<input type="submit" value="envoyer">
				</form>