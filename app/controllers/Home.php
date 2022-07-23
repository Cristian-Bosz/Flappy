<?php

class Home extends Controller
{
    public function __construct()
    {
      $this->usuario = $this->model('usuario');
    }

/*si existe una session 'logueado' nos redirije al home, si no existe nos manda devuelta al login*/
    public function index() 
    {
       if (isset($_SESSION['logueado']))
       {
         $this->view('pages/home');
       } else {
         redirection('/home/login');
       }
    }

    public function login() 
    {
       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         $datosLogin = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
         ];

         $datosUsuario = $this->usuario->getUsuario($datosLogin['email']);

         var_dump($datosUsuario);

         if ($this->usuario->verificarContrasena($datosUsuario , $datosLogin['password']))
            {
               $_SESSION['logueado'] = $datosUsuario->privilegio_id_fk;
               redirection('/home');
            } else {
               $_SESSION['errorLogin'] = 'El usuario o la contraseña son incorrectas';
               redirection('/home');
            }

       }else{
         if (isset($_SESSION['logueado']))
         {
          redirection('/home');
         } else {
           $this->view('pages/login');
         }
       }
    }


    public function register() 
    {
      /*hago un array para guardar la datos que se registran en el formulario */
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datosRegistro = [
               'privilegio' => '2',
               'email' => trim($_POST['email']),
               'usuario' => trim($_POST['usuario']),
               'password' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT)
            ];
      /*valido si el usuario se crea correctamente */
            if ($this->usuario->verificarUsuario($datosRegistro)){
               if ($this->usuario->register($datosRegistro)){
               $_SESSION['loginComplete'] = 'El usuario se ha creado correctamente.';
               redirection('/home');
            }else{ }
            }else { $_SESSION['usuarioError'] = 'el usuario no esta disponible, intenta con otro nombre';
               $this->view('/pages/register');
            }
        }else{
         if (isset($_SESSION['logueado']))
         {
          redirection('/home');
         } else {
           $this->view('pages/register');
         }
        }
     }

     public function logout()
     {
         session_start();

         $_SESSION = [];

         session_destroy();

         redirection('/home');
     }
}