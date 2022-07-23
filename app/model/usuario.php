<?php 

class usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function verificarUsuario($datosUsuario){
        $this->db->query('SELECT username FROM usuarios WHERE username = :user');
        $this->db->bind(':user', $datosUsuario['usuario']);
        if($this->db->num_rows){
            return false;
        }else {
            return true;
        }
    }

    public function register($datosUsuario)
    {
        $this->db->query('INSERT INTO usuarios (correo, username, password, privilegio_id_fk) VALUES (:correo, :username, :password, :privilegio)');
        $this->db->bind(':privilegio', $datosUsuario['privilegio']);
        $this->db->bind(':correo', $datosUsuario['email']);
        $this->db->bind(':username', $datosUsuario['usuario']);
        $this->db->bind(':password', $datosUsuario['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}