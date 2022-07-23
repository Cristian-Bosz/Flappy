<?php 

class usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }
/*esta funcion va a obtener toda la información del usuario que le pasemos */
    public function getUsuario($usuario){
        $this->db->query('SELECT * FROM usuarios WHERE correo = :user');
        $this->db->bind(':user', $usuario);
        return $this->db->register();
    }
/*recibe los datos del usuario y la contraseña que digitó en el formulario */
    public function verificarContrasena($datosUsuario , $contrasena){
        if (password_verify($contrasena, $datosUsuario->password)){
            return true;
        } else {
            return false;
        }
    }

    /*verifico que los usuarios no puedan tener los mismos emails */
    public function verificarUsuario($datosUsuario){
        $this->db->query('SELECT correo FROM usuarios WHERE correo = :user');
        $this->db->bind(':user', $datosUsuario['email']);
        $this->db->register();
        if($this->db->rowCount()){
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