<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    // Variables para la url. Por defecto tiene valores predeterminados
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    // Array de parámetros
    protected $params = [];

    public function __construct(){
      //print_r($this->getUrl());
      $url = $this->getUrl();

      // Look in controllers for first value
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        // Destruye la variable
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of url is a model
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          // Destruye la variable
          unset($url[1]);
        }
      }

      // Si nos pasan un parámetro 1,2,3,4 por la url
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      // Callaback porque una función llama a otra función.
      // ([Controlador,Método],array de parámetros)
      // Esta función se le pasa el controlador y el método y ejecuta la función con el array de parámetros pasado.
      // Esta función és ideal cuándo no sabemos cuántos parámetros vamos a pasar a la función.
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Obtener los parámetros de la url
    // Por ejemplo si en la url tenemos traversymvc/posts/edit/1
    // la función nos devuelve los parametros -> posts/edit/1
    public function getUrl(){
      // Si tenemos parámetros
      if(isset($_GET['url'])){
        // Estripamos las urls pasadas
        $url = rtrim($_GET['url'], '/');
        // Miramos que todos los caracteres sean correctos. Evitar simbolos y otros caracteres no permitidos.
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Divide un string en varios string
        $url = explode('/', $url);
        return $url;
      }
    }
  } 
  
  