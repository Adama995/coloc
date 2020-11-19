<?php
$url = "http://localhost/api/coloc/getColoc.php"; // modifier le produit 1
$data = array('nom' => 'NDiaye', 'prenom' => 'Younoussa', 'age' => '58', 'sexe_coloc' => 'Homme', 'adresse' => '13 rue nungesser, Dugny, 93440', 'mdp' => 'mdp');

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

$response = curl_exec($ch);

var_dump($response);

if (!$response)
{
    return false;
}
?>
