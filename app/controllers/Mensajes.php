<?php

class Mensajes extends Controller
{
    public function __construct()
    {
        $this->publicaciones = $this->model('publicar');
        $this->usuario = $this->model('usuario');
        $this->mensaje = $this->model('chat');
    }

    public function index() 
    {
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
       {
            $datosMensaje = [
                'iduser_emisor' => trim($_POST['iduser_emisor']),
                'enviar' => trim($_POST['enviar']),
                'mensaje' => trim($_POST['mensaje']),
            ];
            if (empty($_POST['iduser_emisor']) || (trim($_POST['iduser_emisor']) == '')) {
                $_SESSION['camposVacios'] = 'Recuerda completar correctamente todos los campos';
                redirection('/mensajes');
                exit;
             }
             if (empty($_POST['mensaje']) || (trim($_POST['mensaje']) == '')) {
                $_SESSION['camposVacios'] = 'Recuerda completar correctamente todos los campos';
                redirection('/mensajes');
                exit;
             }
             if (empty($_POST['enviar']) || (trim($_POST['enviar']) == '')) {
                $_SESSION['camposVacios'] = 'Recuerda completar correctamente todos los campos';
                redirection('/mensajes');
                exit;
             }
            if($this->mensaje->enviarMensaje($datosMensaje)){
                $this->mensaje->addNotificacionMensaje($datosMensaje);
                $_SESSION['exito'] = 'Mensaje enviado con éxito';
                redirection('/mensajes');
            } else {
                redirection('/mensajes');
            }
       } else
       { if(isset($_SESSION['logueado']))
        {
            $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
            $datosPerfil = $this->usuario->getPerfil($datosUsuario->usuario_id);
            $misNotificaciones = $this->publicaciones->getNotificaciones($_SESSION['logueado']);
            $datosUsuarios = $this->usuario->getUsuarios();
            $misMensajes = $this->mensaje->getMensajes($_SESSION['logueado']);
            $misNotificacionesMensaje = $this->mensaje-> getNotificacionesMensaje($_SESSION['logueado']);


            
                $datos = [
                'usuario' => $datosUsuario,
                'perfil' => $datosPerfil,
                'misNotificaciones' => $misNotificaciones,
                'usuarios' => $datosUsuarios,
                'misMensajes' => $misMensajes,
                'misNotificacionesMensaje' => $misNotificacionesMensaje
                ];
    
                $this->view('pages/mensajes/mensajes' , $datos);  
         
       } 
       else 
       {
         redirection('/home');
       }
    }
    }


    public function eliminarMensaje($id)
    {
        if($this->mensaje->eliminarMensaje($id)) {
            redirection('/mensajes');
        } else {
            redirection('/mensajes');
        }
    }

    
}