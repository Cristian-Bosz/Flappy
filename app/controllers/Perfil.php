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
}
