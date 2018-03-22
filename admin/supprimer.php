<?php include '../includes/header.php';  ?>
	<title>Espace Administration : Supression du billet</title>

</head>
<body>

	<center>
		<img src="../img/banner.jpg">
	</center>

	<div class="container">



	<?php 



	try {

		$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

		$idid = $_GET['billet'];

		echo "

		<h3>Voulez-vous vraiment supprimer le billet ?</h3>
		
		<form method='post'>
		
			<center>
				<input class='button-submit button-submit-ajout' type='submit' name='okok' value='OUI'>
				<input class='button-submit button-submit-ajout' type='button' value='RETOUR' onclick='window.location.href=\"/blog/admin/\"'> 
			</center>

		</form>"; ?>



		<?php


		if (isset($_POST['okok']) && !empty($idid)) {


			$req = $bdd->prepare('

				DELETE FROM billets

				WHERE id = :idid

				');

			$req->execute(array(

				'idid' => $idid,

			));


			header('Location: index.php');

		}

	}

	catch(Exception $e) {

		die('Erreur : '.$e->getMessage());
	}





	?>



<?php include '../includes/footer.php'; ?>