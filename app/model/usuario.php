<?php 

class usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function verificarUsuario($datosUsuario){
        $this->db->query('SELECT usuario FROM usuarios WHERE usuario = :user');
        $this->db->bind(':user', $datosUsuario['usuario']);
    }

    public function register($datosUsuario)
    {
        $this->db->query('INSERT INTO usuarios (idPrivilegio, correo, usuario, contrasena) VALUES (:privilegio, :correo, :usuario, :contrasena)');
        $this->db->bind(':privilegio', $datosUsuario['privilegio']);
        $this->db->bind(':correo', $datosUsuario['email']);
        $this->db->bind(':usuario', $datosUsuario['usuario']);
        $this->db->bind(':contrasena', $datosUsuario['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}