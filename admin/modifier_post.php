<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MODIFIER</title>

</head>
<body>



	<?php 



	try {

		$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

		$idid = $_GET['billet'];
		$titre = $_POST['titre_new'];
		$contenu = $_POST['contenu_new'];


		/*echo "<br><h2>Voulez-vous vraiment modifier le billet ? </h2><br><br><form method='post'><input class='btnr' type='submit' name='okok' value='OUI'> | <input class='btng' type='button' value='RETOUR' onclick='window.location.href=\"/blog/admin/\"'> </form>"; */





		if (/*isset($_POST['okok']) &&*/ !empty($idid) && !empty($titre) && !empty($contenu)) {


			$req = $bdd->prepare('

				UPDATE billets

				SET titre = :titre, contenu = :contenu

				WHERE id = :idid

				');

			$req->execute(array(

				'titre' => $titre,

				'contenu' => $contenu,

				'idid' => $idid

			));


			header('Location: index.php');

		}

	}

	catch(Exception $e) {

		die('Erreur : '.$e->getMessage());
	}





	?>



</body>
</html>