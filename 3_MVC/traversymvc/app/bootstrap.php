<?php
  // Load Config
  require_once 'config/config.php';

  // Carga automaticamente todos los ficheros de la carpeta libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
