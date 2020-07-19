<?php
// Incluem la connexió a la bbdd
include('database.php');

// Enviat per ajax desde app.js
$search = $_POST['search'];

if(!empty($search)) {
  // Consulta a la bbdd
  $query = "SELECT * FROM task WHERE name LIKE '$search%'";

  // Executem la consulta
  $result = mysqli_query($connection, $query);

  // Sino tenim resposta
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
  // Si tenim un resultat
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    // Guardem a l'estil JSON
    $json[] = array(
      'name' => $row['name'],
      'description' => $row['description'],
      'id' => $row['id']
    );
  }
  // Retorna un string amb la representació JSON
  $jsonstring = json_encode($json);
  echo $jsonstring;
}

?>
