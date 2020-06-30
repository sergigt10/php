<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }
    
    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
          'username_err' => '',
          'password_err' => '',      
        ];

        // Validate username
        if(empty($data['username'])){
          $data['username_err'] = "Introduïu el nom d'usuari";
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Introduïu la contrasenya';
        }

        // Check for username
        if($this->userModel->findUserByUsername($data['username'])){
          // User found
        } else {
          // User not found
          $data['username_err'] = "Hi ha un error amb l'usuari o contrasenya";
          $data['password_err'] = "Hi ha un error amb l'usuari o contrasenya";
        }

        // Make sure errors are empty
        if(empty($data['username_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['username'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            // Error password
            $data['username_err'] = "Hi ha un error amb l'usuari o contrasenya";
            $data['password_err'] = "Hi ha un error amb l'usuari o contrasenya";

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }
      } else {
        // Init data
        $data =[    
          'username' => '',
          'password' => '',
          'username_err' => '',
          'password_err' => '',        
        ];
        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_name'] = $user->name;
      redirect('index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }
  }