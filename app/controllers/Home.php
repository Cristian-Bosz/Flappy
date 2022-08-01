<?php

class Home extends Controller
{
    public function __construct()
    {
      $this->usuario = $this->model('usuario');
      $this->publicaciones = $this->model('publicar');
      $this->mensaje = $this->model('chat');

    }

/*si existe una session 'logueado' nos redirije al home, si no existe nos manda devuelta al login*/
    public function index() 
    {
       if (isset($_SESSION['logueado']))
       {
         $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
         $datosPerfil = $this->usuario->getPerfil($_SESSION['logueado']);
         $datosPublicaciones = $this->publicaciones->getPublicaciones();

         $verificarLike = $this->publicaciones->misLikes($_SESSION['logueado']);
         $comentarios = $this->publicaciones->getComentarios();

         $misNotificaciones = $this->publicaciones->getNotificaciones($_SESSION['logueado']);
         $misNotificacionesMensaje = $this->mensaje-> getNotificacionesMensaje($_SESSION['logueado']);

         
         $usuariosRegistrados = $this->usuario->getAllUsuarios();
         $cantidadUsuarios = $this->usuario->getCantidadUsuarios();

         if($datosPerfil){
            $datosRed = [
               'usuario' => $datosUsuario,
               'perfil' => $datosPerfil,
               'publicaciones' => $datosPublicaciones,
               'mislikes' => $verificarLike,
               'comentarios' => $comentarios,
               'misNotificaciones' => $misNotificaciones,
               'misNotificacionesMensaje' => $misNotificacionesMensaje,
              
               'allUsuarios' => $usuariosRegistrados,
               'cantidadUsuarios' => $cantidadUsuarios
            ];
   
            $this->view('pages/home' , $datosRed);
         }else{
            $this->view('pages/perfil/completarPerfil' , $_SESSION['logueado']);
         }
        
       } else {
         redirection('/home/login');
       }
    }

    public function login() 
    {
       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         $datosLogin = [
            'usuario' => trim($_POST['usuario']),
            'password' => trim($_POST['password'])
         ];

         $datosUsuario = $this->usuario->getUsuario($datosLogin['usuario']);

         if ($this->usuario->verificarContrasena($datosUsuario , $datosLogin['password']))
            {
               $_SESSION['logueado'] = $datosUsuario->usuario_id;
               $_SESSION['usuario'] = $datosUsuario->username;
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
            if (empty($_POST['email']) || (trim($_POST['email']) == '')) {
               $_SESSION['camposVacios'] = 'Recuerda completar correctamente todos los campos';
               $this->view('/pages/register');
               exit;
            }
            if (empty($_POST['usuario']) || (trim($_POST['usuario']) == '')) {
               $_SESSION['camposVacios'] = 'Recuerda completar correctamente todos los campos';
               $this->view('/pages/register');
               exit;
            }
            if (empty($_POST['password']) || (trim($_POST['password']) == '')) {
               $_SESSION['camposVacios'] = 'Recuerda completar correctamente todos los campos';
               $this->view('/pages/register');
               exit;
            }
            if ($this->usuario->verificarUsuario($datosRegistro)){
               if ($this->usuario->register($datosRegistro)){
               $_SESSION['loginComplete'] = 'El usuario se ha creado correctamente.';
               redirection('/home');
            }else{ }
            }else { $_SESSION['usuarioError'] = 'El usuario no esta disponible, intenta con otro nombre';
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
/*aca vamos a guardar las imagenes de los usuarios */
     public function insertarRegistroPerfil()
     {
      $carpeta = 'C:/xampp/htdocs/flappy/public/img/imagenesPerfil/';
      opendir($carpeta);
      $rutaImagen = 'img/imagenesPerfil/' . $_FILES['imagen']['name'];
      $ruta = $carpeta . $_FILES['imagen']['name'];
      copy($_FILES['imagen']['tmp_name'] , $ruta);

      $datos = [
         'idusuario' => trim($_POST['id_user']),
         'nombre' => trim($_POST['nombre']),
         'ruta' => $rutaImagen,
      ];

      if ($this->usuario->insertarPerfil($datos)){
         redirection('/home');
      } else {
         echo 'el perfil no se ha guardado';
      }
     }

     public function logout()
     {
         session_start();

         $_SESSION = [];

         session_destroy();

         redirection('/home');
     }

     public function buscar()
     {
      if (isset($_SESSION['logueado'])) {
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $busqueda =  '%' . trim($_POST['buscar'] . '%');
            $datosBusqueda = $this->usuario->buscar($busqueda);
            
            $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
            $datosPerfil = $this->usuario->getPerfil($_SESSION['logueado']);
            $misNotificaciones = $this->publicaciones->getNotificaciones($_SESSION['logueado']);
            
   
            if($datosPerfil){
               $datosRed = [
                  'usuario' => $datosUsuario,
                  'perfil' => $datosPerfil,
                  'misNotificaciones' => $misNotificaciones,
                  'resultado' => $datosBusqueda
               ];


               if ($datosBusqueda){
                  $this->view('pages/busqueda/buscar' , $datosRed);
               } else {
                  redirection('/home');
               }
            } else {
               redirection('/home');
            }
         } else {
            redirection('/home');
         }
     }
   }
}