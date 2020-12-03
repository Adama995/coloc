<?php
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];
	$id = filter_input(INPUT_GET, "id");

	switch($request_method)
	{

		case 'GET':
			// Retrive Products
			if(!empty($id))
			{
				getColocataires($id);
			}
			else
			{
				getColocataire();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;

		case 'POST':
			// Ajouter un colocataire
			if(!empty($_POST["nom"])  && !empty($_POST["prenom"]) && !empty($_POST["age"]) &&!empty($_POST["sexe_coloc"]) && !empty($_POST["adresse"]) && !empty($_POST["mdp"]))
			{
				AddColocataire();
			}
			break;

		case 'PUT':
			// Modifier un colocataire
			$id = intval($_GET["id"]);
			updateColocataire($id);
			break;

		case 'DELETE':
			// Supprimer un colocataire
			$id = intval($_GET["id"]);
			deleteColocataire($id);
			break;

	}

	function getColocataire()
	{
		$conn = mysqli_connect("localhost", "root", "", "coloc");
		$pdo=new PDO('mysql:host=localhost;dbname=coloc','root','');

		$req='SELECT * FROM colocataire';
	    $prep=$pdo->prepare($req);
	    $prep->execute();
	    $response=$prep->fetchAll(PDO::FETCH_ASSOC);


    	echo json_encode($response, JSON_PRETTY_PRINT);
	}

	function getColocataires($id=0)
	{
		$pdo=new PDO('mysql:host=localhost;dbname=coloc','root','');

		$req='SELECT * FROM colocataire WHERE id = :id';
	    $prep=$pdo->prepare($req);
	    $prep->bindParam(":id", $id, PDO::PARAM_INT);
	    $prep->execute();
	    $response=$prep->fetchAll(PDO::FETCH_ASSOC);


    	echo json_encode($response, JSON_PRETTY_PRINT);
	}

	function AddColocataire()
	{
		$prep ="INSERT INTO `colocataire` (`id`, `nom`, `prenom`, `age`, `sexe_coloc`, `adresse`, `mdp`) VALUES ('3', 'Kubiak', 'Enzo', '21', 'Homme', '20 rue du soleil, 86363, Marseille', 'Enzo3');";

			$pdo=new PDO('mysql:host=localhost;dbname=coloc','root','');

			$id = $_POST["id"];
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$age = $_POST["age"];
			$adresse = $_POST["adresse"];
			$mdp = $_POST["mdp"];
			$prep=$pdo->prepare($prep);

		  $prep->bindParam(':id', $_POST["id"]);
		  $prep->bindParam(':nom', $_POST["nom"]);
		  $prep->bindParam(':prenom', $_POST["prenom"]);
		  $prep->bindParam(':age', $_POST["age"]);
		  $prep->bindParam(':sexe_coloc', $_POST["sexe_coloc"]);
		  $prep->bindParam(':adresse', $_POST["adresse"]);
		  $prep->bindParam(':mdp', $_POST["mdp"]);
		  $prep->execute();


			header('Content-Type: application/json');
			echo json_encode($prep);



		/*echo $query="INSERT INTO colocataire(nom, prenom, age, sexe_coloc, adresse, mdp) VALUES('".$nom."', '".$prenom."', '".$age."', '".$sexe_coloc."', '".$adresse."', '".$mdp."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit ajouté avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}*/

	}

	/*function updateColocataire()
	{
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);

		$pdo=new PDO('mysql:host=localhost;dbname=coloc','root','');

		$id = $id["id"];
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$age = $_POST["age"];
		$sexe_coloc = $_POST["sexe_coloc"];
		$adresse = $_POST["adresse"];
		$mdp = $_POST["mdp"];
		$query= UPDATE `colocataire` SET `id` = '5', `nom` = '7', `prenom` = 'Younouss', `age` = '27', `sexe_coloc` = 'Femme', `adresse` = '20 rue de Paris, 93400', `mdp` = 'younn5' WHERE `colocataire`.`id` = 4;


		$req='SELECT * FROM colocataire WHERE id = :id';
	    $prep=$pdo->prepare($req);
	    $prep->bindParam(":id", $id, PDO::PARAM_INT);
			$prep->bindParam(':id', $_PUT["id"]);
		  $prep->bindParam(':nom', $_POST["nom"]);
		  $prep->bindParam(':prenom', $_POST["prenom"]);
		  $prep->bindParam(':age', $_POST["age"]);
		  $prep->bindParam(':sexe_coloc', $_POST["sexe_coloc"]);
		  $prep->bindParam(':adresse', $_POST["adresse"]);
		  $prep->bindParam(':mdp', $_POST["mdp"]);

	    $prep->execute();
	    $response=$prep->fetchAll(PDO::FETCH_ASSOC);
		if(mysqli_query($pdo, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de produit. '. mysqli_error($conn)
			);

		}

		$req='SELECT * FROM colocataire WHERE id = :id';
	    $prep=$pdo->prepare($req);
	    $prep->bindParam(":id", $id, PDO::PARAM_INT);
	    $prep->execute();
	    $response=$prep->fetchAll(PDO::FETCH_ASSOC);


    	echo json_encode($response, JSON_PRETTY_PRINT);


	function deleteColocataire($id)
	{
		$conn = mysqli_connect("localhost", "root", "", "coloc");
		$query = "DELETE FROM colocataire WHERE id=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Colocataire supprime avec success.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Colocataire du produit a echoue. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}*/


?>
