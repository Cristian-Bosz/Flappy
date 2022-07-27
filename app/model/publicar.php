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
        $this->db->query('SELECT P.publicacion_id, P.contenidoPublicacion, P.fotoPublicacion, P.fechaPublicacion, U.username, Per.fotoPerfil FROM publicaciones P
                          INNER JOIN usuarios U ON U.usuario_id = P.usuario_id_fk 
                          INNER JOIN perfil Per ON Per.usuario_id_fk = P.usuario_id_fk');
        return $this->db->registers();
    }

    public function getPublicacion($id) {
        $this->db->query('SELECT * FROM publicaciones WHERE publicacion_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->register();

    }

    public function eliminarPublicacion($publicacion)
    {
        //dd($publicacion);

        $this->db->query('DELETE FROM publicaciones WHERE publicacion_id = :id ');
        $this->db->bind(':id', $publicacion->publicacion_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



}