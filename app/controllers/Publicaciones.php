<?php

class Publicaciones extends Controller
{

    public function __construct()
    {
        $this->publicar = $this->model('publicar');
    }

    public function publicar ($idUsuario) {

        if (isset($_FILES['imagen'])) {
            $carpeta = 'C:/xampp/htdocs/Flappy/public/img/imagenesPublicaciones/';
            opendir($carpeta);
            $rutaImagen = 'img/imagenesPublicaciones/' . $_FILES['imagen']['name'];
            $ruta = $carpeta . $_FILES['imagen']['name'];
            copy($_FILES['imagen']['tmp_name'] , $ruta);
        } else {
            $rutaImagen = 'Publicacion sin imagen';
        }
        

        $datos = [
            'iduser' => trim($idUsuario),
            'contenido' => trim($_POST['contenido']),
            'foto' => $rutaImagen
        ];

        if ($this->publicar->publicar($datos)) {
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