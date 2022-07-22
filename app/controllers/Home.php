<?php

class Home extends Controller
{
    public function __construct()
    {
      $this->usuario = $this->model('usuario');
    }

    public function index() {
       
    }

    public function login() {
       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
       }else{
        $this->view('/pages/login');
       }
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datosRegistro = [
               'privilegio' => '1',
               'email' => trim($_POST['email']),
               'usuario' => trim($_POST['usuario']),
               'password' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT)
            ];
            if ($this->usuario->verificarUsuario($datosRegistro)){
               if ($this->usuario->register($datosRegistro)){
               $_SESSION['usuario'] = $datosRegistro['usuario'];
               $_SESSION['loginComplete'] = 'El usuario se ha creado correctamente.';
               redirection('/home/login');
            }else{ 
            }
            }else { $_SESSION['usuarioError'] = 'el usuario no esta disponible, intenta con otro nombre';
               $this->view('/pages/register');
            }
        }else{
         $this->view('/pages/register');
        }
     }

}