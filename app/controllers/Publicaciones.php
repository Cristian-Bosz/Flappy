<?php

class Publicaciones extends Controller
{

    public function __construct()
    {
        $this->publicar = $this->model('publicar');
    }

    public function publicar ($idUsuario) {

        $carpeta = 'C:/xampp/htdocs/Flappy/public/img/imagenesPublicaciones/';
        opendir($carpeta);
        $nombreImagen = $_FILES['imagen']['name'] ;
        $rutaImagen = 'img/imagenesPublicaciones/' . $_FILES['imagen']['name'];
        $ruta = $carpeta . $_FILES['imagen']['name'];

        if (empty($nombreImagen)) {
            $_SESSION['camposVacios'] = 'No puedes realizar una publicación sin descripción e imagen';
            redirection('/home');
            exit;
         }else {
            copy($_FILES['imagen']['tmp_name'] , $ruta);
         }
        $datos = [
            'iduser' => trim($idUsuario),
            'contenido' => trim($_POST['contenido']),
            'foto' => $rutaImagen
        ];
        if (empty($_POST['contenido']) || (trim($_POST['contenido']) == '')) {
            $_SESSION['camposVacios'] = 'No puedes realizar una publicación sin descripción e imagen';
            redirection('/home');
            exit;
         }
        if ($this->publicar->publicar($datos)) {
            $_SESSION['exito'] = 'La publicación se creó con éxito';
            redirection('/home');
        } else {
            echo 'ocurrio un error';
        }
    }

    public function eliminar($publicacion_id) 
    {
        $publicacion = $this->publicar->getPublicacion($publicacion_id);

        //dd($publicacion);

        if ($this->publicar->eliminarPublicacion($publicacion)) {
            unlink('C:/xampp/htdocs/flappy/public/'.$publicacion->fotoPublicacion);
            $_SESSION['exito'] = 'La publicación se eliminó con éxito';
            redirection('/home');

        } else {

        }
    } 


    public function megusta($publicacion_id, $idUsuario, $idusuarioPropietario) 
    {
        $datos = [
            'publicacion_id' => $publicacion_id,
            'usuario_id' => $idUsuario,
            'idusuarioPropietario' => $idusuarioPropietario
        ];

        $datosPublicacion = $this->publicar->getPublicacion($publicacion_id);

        if($this->publicar->rowLikes($datos)){
            if ($this->publicar->eliminarLike($datos)){
                $this->publicar->deleteLikeCount($datosPublicacion);
            }
            redirection('/home');
        } else {
            if ($this->publicar->agregarLike($datos)){
                $this->publicar->addLikeCount($datosPublicacion);
                $this->publicar->addNotificacionLike($datos);
            }
            redirection('/home');
        }

    }

    public function comentar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $datos = [
                'iduserPropietario' => trim($_POST['iduserPropietario']),
                'usuario_id'  => trim($_POST['usuario_id']),
                'publicacion_id' => trim($_POST['publicacion_id']),
                'comentario'  => trim($_POST['comentario']),
            ];
            if($this->publicar->publicarComentario($datos)) {
                $this->publicar->addNotificacionComentario($datos);
                redirection('/home');
            } else {

            }
        }else {
            redirection('/home');
        }

    }
    public function eliminarComentario($id) 
    {
        if($this->publicar->eliminarComentarioUsuario($id)) {
            redirection('/home');
        } else {
            redirection('/home');
        }
    }











}