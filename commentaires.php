<?php include 'includes/header.php';  ?>
	<title>Blog : Commentaires</title>
</head>
<body>

	<center>
		<img src="img/banner.jpg">
	</center>

	<div class="container">

	<?php

	try {

		$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

	}

	catch(Exception $e) {

		die('Erreur : '.$e->getMessage());

	}

	$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');

	$req->execute(array($_GET['billet']));

	$donnees = $req->fetch();

	if (empty($donnees)) {

		echo "<h1>CE BILLET N'EXISTE PAS</h1>";

	}

	else {

		echo "<h2>Vous êtes sur l'article : </h2><br><h3>" . $donnees['titre'] . "</h3>";

		echo "<div class='billets-container'><span class='bold-class'>Le " . $donnees['date_creation_fr'] . " :</span><br><br>" . $donnees['contenu'];

	}
	$req->closeCursor();
	?>

	<br>
	<center>
		<a class="button-submit" href="index.php">RETOUR</a>	
	</center>

	<h3 class="titre-commentaires">Commentaires :</h3>

	<?php


	$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');

	$req->execute(array($_GET['billet']));

	if (empty($donnees)) {
		echo "<center>Aucun commentaire, rédigez en un ! :D</center>";
	}

	else {

		while ($donnees = $req->fetch())

		{

			echo  "<span class='bold-class'>" . $donnees['auteur'] . " à écrit le " . $donnees['date_commentaire_fr'] . ' :</span><br>' . $donnees['commentaire'];}
		}

		$req->closeCursor();


		?>

	
	
	

		<h3 class="titre-commentaires">Ajouter un commentaire :</h3>

	
	

		<?php 

		$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');

		$req->execute(array($_GET['billet']));

		$donnees = $req->fetch(); ?>

		<form method='post' action='commentaires_post.php?billet=<?php echo $donnees['id'] ?>'> 

			<p>Votre Prénom :</p>

			<input class="input-form" type="text" name="auteur" required>


			<p>Commentaire :</p>

			<textarea name='commentaire' required></textarea>
			<br>
			<center>
				<input class="button-submit" type='submit' name='ok' value="ENVOYER">
			</center>
		</form>
	</div>



<?php include 'includes/footer.php'; ?>