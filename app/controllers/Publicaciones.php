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


    public function megusta($publicacion_id, $idUsuario) 
    {
        $datos = [
            'publicacion_id' => $publicacion_id,
            'usuario_id' => $idUsuario
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
            }
            redirection('/home');
        }

    }
}