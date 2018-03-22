<?php include '../includes/header.php';  ?>
	<title>Espace Administration : Ajouter un billet</title>

</head>
<body>

	<center>
		<img src="../img/banner.jpg">
	</center>

	<div class="container">



	<h2>AJOUT DE BILLET</h2>

	<form method='post' action='ajout_post.php'> 

		<p>Titre :</p> 

		<input class="input-form" type="text" name="titre" required>

		<p>Contenu du Billet :</p>
		<textarea name='contenu' required></textarea><br>

		<center>
			<input class="button-submit button-submit-ajout" type='submit' name='ok' value="PUBLIER">
			<a class="button-submit button-submit-ajout" href="index.php">RETOUR</a>
		</center>

	</form>


<?php include '../includes/footer.php'; ?>