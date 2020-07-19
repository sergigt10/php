<?php
// Establim la conexió
$connection = mysqli_connect(
  'localhost', 'root', 'password', 'tasks-database'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}

?>
