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

}