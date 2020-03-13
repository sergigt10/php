<?php
  // Heredamos de controller 
  // Page es el controlador por defecto
  class Pages extends Controller {
    public function __construct(){
     
    }
    // Index es la función predeterminada
    public function index(){
      $data = [
        'title' => 'TraversyMVC',
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }
  }