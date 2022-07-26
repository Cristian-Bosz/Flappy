<?php

class Perfil extends Controller
{
    public function __construct()
    {
        $this->perfil = $this->model('perfilUsuario');
        $this->usuario = $this->model('usuario');
    }

    public function index($user)
    {
        if(isset($_SESSION['logueado'])){
            $datosUsuario = $this->usuario->getUsuario($user);
            $datosPerfil = $this->usuario->getPerfil($datosUsuario->usuario_id);

            $datos = [
                'perfil' => $datosPerfil,
                'usuario' => $datosUsuario
            ];

            $this->view('pages/perfil/perfil' , $datos);
        }
    }

    public function cambiarImagen()
    {
        $carpeta = 'C:/xampp/htdocs/flappy/public/img/imagenesPerfil/';
        opendir($carpeta);
        $rutaImagen = 'img/imagenesPerfil/' . $_FILES['imagen']['name'];
        $ruta = $carpeta . $_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'] , $ruta);

        $datos = [
            'idusuario' => trim($_POST['id_user']),
            'ruta' => $rutaImagen,
         ];

//Acá Eliminamos la foto que teniamos guardada anteriormente y dejando solo la nueva incorporada

        $imagenActual = $this->usuario->getPerfil($datos['idusuario']); 

// La funcion unlink sirve para eliminar un archivo, este se enviia como parametro

         unlink('C:/xampp/htdocs/flappy/public/' . $imagenActual->fotoPerfil);
        
  
        if ($this->perfil->editarFoto($datos)){
           redirection('/home');
        } else {
           echo 'el perfil no se ha guardado';
        }
    }
    
}