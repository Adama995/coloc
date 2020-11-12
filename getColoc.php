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
			
		/*case 'POST':
			// Ajouter un produit
			AddColocataire();
			break;
			
		case 'PUT':
			// Modifier un produit
			$id = intval($_GET["id"]);
			updateColocataire($id);
			break;
			
		case 'DELETE':
			// Supprimer un produit
			$id = intval($_GET["id"]);
			deleteColocataire($id);
			break;*/

	}

	function getColocataire()
	{
		$conn = mysqli_connect("localhost", "root", "", "coloc");
		$pdo=new PDO('mysql:host=localhost;dbname=coloc','root','');
		/*$query = "SELECT * FROM colocataire";
		$reponse = array();
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($result)) 
		{
			$reponse[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);*/
		$req='SELECT * FROM colocataire';
	    $prep=$pdo->prepare($req);

	    $prep->execute();
	    $response=$prep->fetchAll(PDO::FETCH_ASSOC);


    	echo json_encode($response, JSON_PRETTY_PRINT);
	}

	function getColocataires($id=0)
	{
		$pdo=new PDO('mysql:host=localhost;dbname=coloc','root','');
		
		///
		/*$query = "SELECT * FROM colocataire";
		if($id != 0)
		{
			$query .= " WHERE id=".$id." LIMIT 1";
		}
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);*/

		$req='SELECT * FROM colocataire WHERE id = :id';
	    $prep=$pdo->prepare($req);
	    $prep->bindParam(":id", $id, PDO::PARAM_INT);
	    $prep->execute();
	    $response=$prep->fetchAll(PDO::FETCH_ASSOC);


    	echo json_encode($response, JSON_PRETTY_PRINT);
	}

	function AddColocataire()
	{
		$conn = mysqli_connect("localhost", "root", "", "coloc");
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$age = $_POST["age"];
		$sexe_coloc = $_POST["sexe_coloc"];
		$adresse = $_POST["adresse"];
		$mdp = $_POST["mdp"];
		echo $query="INSERT INTO colocataire(nom, prenom, age, sexe_coloc, adresse, mdp) VALUES('".$nom."', '".$prenom."', '".$age."', '".$sexe_coloc."', '".$adresse."', '".$mdp."')";
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
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	function updateColocataire($id)
	{
		$conn = mysqli_connect("localhost", "root", "", "coloc");
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$age = $_POST["age"];
		$sexe_coloc = $_POST["sexe_coloc"];
		$adresse = $_POST["adresse"];
		$mdp = $_POST["mdp"];
		$query="UPDATE produit SET name='".$nom."', description='".$prenom."', price='".$age."', category_id='".$sexe_coloc."', modified='".$adresse."', mdp='".$mdp."' WHERE id=".$id;

		if(mysqli_query($conn, $query))
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
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	function deleteProduct($id)
	{
		$conn = mysqli_connect("localhost", "root", "", "coloc");
		$query = "DELETE FROM colocataire WHERE id=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Colocataire supprime avec succes.'
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
	}

	
?>
