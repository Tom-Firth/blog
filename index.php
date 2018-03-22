<?php include 'includes/header.php';  ?>	
	<title>Blog : Accueil</title>
</head>
<body>
	<center>
		<img src="img/banner.jpg">
	</center>
	<div class="container">


	<h1>Bienvenue sur mon Blog !</h1>
	<h3>Dernières actualités :</h3>

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

			echo '
			<div class="billets-container"><h3 class="titre-actus">' . $donnees['titre'] . '</h3><span class="date-billets">' . $donnees['date_creation'] . " : </span>" . $donnees['contenu'] . '<br><div class="check-commentaires"><center><a class="button-submit" href="commentaires.php?billet=' . $donnees['id'] . '">COMMENTAIRES</a></center></div></div><center><hr class="hr-design2"></center>';

		}


		$reponse->closeCursor();


		?>
		</div>
		
		<center>
			<a class='button-submit button-submit-admin' href='admin/index.php'>ESPACE ADMIN</a>
		</center>


<?php include 'includes/footer.php'; ?>