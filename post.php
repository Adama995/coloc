
<?php
  $url = 'http://127.0.0.1/api/coloc/getColoc.php';
	$data = array('id' => '3', 'nom' => 'Sam', 'prenom' => 'Dupont', 'age' => '25', 'sexe_coloc' => 'Homme', 'adresse' => '23 rue de la rue, 33000 Bordeaux', 'mdp' => 'epsi');

  // utilisez 'http' même si vous envoyez la requête sur https:// ...
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { /* Handle error */ }
  var_dump($result);
?>
