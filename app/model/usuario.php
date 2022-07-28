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
        $this->db->query('SELECT * FROM usuarios WHERE username = :user');
        $this->db->bind(':user', $usuario);
        return $this->db->register();
    }

    public function getUsuarios(){
        $this->db->query('SELECT usuario_id , username FROM usuarios');
        return $this->db->registers();
    }

    public function getPerfil($usuario_id){
        $this->db->query('SELECT * FROM perfil WHERE usuario_id_fk = :id');
        $this->db->bind(':id', $usuario_id);
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
        $this->db->query('SELECT username FROM usuarios WHERE username = :user');
        $this->db->bind(':user', $datosUsuario['usuario']);
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

    public function insertarPerfil($datos)
    {
        $this->db->query('INSERT INTO perfil (nombreCompleto ,fotoPerfil, usuario_id_fk	) VALUES (:nombre , :rutaFoto , :id)');
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':rutaFoto', $datos['ruta']);
        $this->db->bind(':id', $datos['idusuario']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}