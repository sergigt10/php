<?php
// Si existeix una petició POST
if(isset($_POST)) {
  echo $_POST['username'];
  echo '<br>';
  echo $_POST['password'];
}
  
  #echo 'Working!';

?>
