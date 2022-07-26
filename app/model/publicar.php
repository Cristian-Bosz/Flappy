<?php 
class Publicar 
{

    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function publicar ($datos) {

        $this->db->query('INSERT INTO publicaciones (contenidoPublicacion, fotoPublicacion, usuario_id_fk)
                          VALUES (:contenido, :foto, :iduser)');
        $this->db->bind(':iduser', $datos['iduser']);
        $this->db->bind(':contenido', $datos['contenido']);
        $this->db->bind(':foto', $datos['foto']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getPublicaciones() {
        $this->db->query('SELECT P.contenidoPublicacion, P.fotoPublicacion, P.fechaPublicacion, U.username, Per.fotoPerfil FROM publicaciones P
                          INNER JOIN usuarios U ON U.usuario_id = P.usuario_id_fk 
                          INNER JOIN perfil Per ON Per.usuario_id_fk = P.usuario_id_fk');
        return $this->db->registers();
    }



}