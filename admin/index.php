<?php include '../includes/header.php';  ?>
	<title>Espace Administration</title>
</head>
<body>

	<center>
		<img src="../img/banner.jpg">
	</center>

	<div class="container">



	<h1 class="color-blue-admin">ADMIN</h1>

	<h2 class="color-blue-admin">Vous êtes sur l'interface ADMIN !</h2>

	<div>


		<?php 

		try {

			$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

		}

		catch(Exception $e) {

			die('Erreur : '.$e->getMessage());

		}

		$reponse = $bdd->query('SELECT id, date_creation, titre, contenu FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

		while ($donnees = $reponse->fetch()) {

			echo '<div class="billets-container"><h3 class="titre-actus">' . $donnees['titre'] . '</h3>' . "<span class='date-billets'>" . $donnees['date_creation'] . " : </span>" . $donnees['contenu'] . '<br><center><a class="button-submit" href="modifier.php?billet=' . $donnees['id'] . '">MODIFIER</a><a class="button-submit" href="supprimer.php?billet=' . $donnees['id'] . '">SUPPRIMER</a><hr class="hr-design2"></center></div>';

		}

		echo "<center><a class='button-submit button-submit-admin' href='ajouter.php'>Ajouter un Billet</a><a class='button-submit button-submit-admin button-submit-admin2' href='../index.php'>Retour vers l'Espace Public</a></center>";


		$reponse->closeCursor();

		?>

	</div>



<?php include '../includes/footer.php'; ?>