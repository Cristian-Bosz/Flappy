<?php

class Notificaciones extends Controller
{
    public function __construct()
    {
        $this->notificar = $this->model('notificacion');
        $this->publicaciones = $this->model('publicar');
        $this->usuario = $this->model('usuario');
    }

    public function index() 
    {
       if (isset($_SESSION['logueado']))
       {
         $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
         $datosPerfil = $this->usuario->getPerfil($datosUsuario->usuario_id);
         $misNotificaciones = $this->publicaciones->getNotificaciones($_SESSION['logueado']);
         $notificaciones = $this->notificar->obtenerNotificaciones($_SESSION['logueado']);
         
         
            $datos = [
               'usuario' => $datosUsuario,
               'perfil' => $datosPerfil,
               'misNotificaciones' => $misNotificaciones,
               'notificaciones' => $notificaciones
            ];
   
            $this->view('pages/notificaciones/notificaciones' , $datos);  
       } else {
         redirection('/home');
       }
    }


    public function eliminar($id)
    {
        if (isset($_SESSION['logueado']))
        {
            if ($this->notificar->eliminarNotificacion($id)){
            redirection('/notificaciones');
            } else{
            redirection('/notificaciones');
            }
        } else {
          redirection('/home');
        }
    }
}

