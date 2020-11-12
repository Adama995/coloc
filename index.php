<?php
require_once __DIR__. '/config.php';
class API{
	function Select(){
		$db = new Connect;
		$colocataire = array();
		$data = $db->prepare('SELECT * FROM colocataire ORDER BY id');
		$data->execute();
		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$colocataire[OutputData['id']] = array(
				'id' =>  $OutputData['id'],
				'nom' => $OutputData['nom'],
				'prenom' => $OutputData['prenom'],
				'age' => $OutputData['age'],
				'sexe_coloc' => $OutputData['sexe_coloc'],
				'adresse' => $OutputData['adresse'],
				'mdp' => $OutputData['mdp'],
			);
		}
		return json_encode($colocataire);
	}
}

$API = new API;
header('Content-type: application/json');
echo $API->Select();


?>