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
        $this->db->query('SELECT P.publicacion_id, P.contenidoPublicacion, P.fotoPublicacion, P.fechaPublicacion, P.num_likes, U.username, Per.fotoPerfil FROM publicaciones P
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

    public function rowLikes($datos) 
    {
        $this->db->query('SELECT * FROM likes WHERE usuario_id_fk = :iduser	AND publicacion_id_fk = :publicacion');
        $this->db->bind(':iduser', $datos['usuario_id']);
        $this->db->bind(':publicacion', $datos['publicacion_id']);
        $this->db->execute();

        return $this->db->rowCount();

    }

    public function agregarLike($datos) 
    {
        $this->db->query('INSERT INTO likes (usuario_id_fk, publicacion_id_fk) VALUES (:iduser, :publicacion)');
        $this->db->bind(':iduser', $datos['usuario_id']);
        $this->db->bind(':publicacion', $datos['publicacion_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function eliminarLike($datos) 
    {
        $this->db->query('DELETE FROM likes WHERE usuario_id_fk = :iduser	AND publicacion_id_fk = :publicacion');
        $this->db->bind(':iduser', $datos['usuario_id']);
        $this->db->bind(':publicacion', $datos['publicacion_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteLikeCount($datos)
    {
        $this->db->query('UPDATE publicaciones SET num_likes = :countLike WHERE publicacion_id = :idPublicaion');
        $this->db->bind(':countLike', ($datos->num_likes -1));
        $this->db->bind(':idPublicaion', $datos->publicacion_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addLikeCount($datos)
    {
        $this->db->query('UPDATE publicaciones SET num_likes = :countLike WHERE publicacion_id = :idPublicaion');
        $this->db->bind(':countLike', ($datos->num_likes + 1));
        $this->db->bind(':idPublicaion', $datos->publicacion_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function misLikes($user)
    {
        $this->db->query('SELECT * FROM likes WHERE usuario_id_fk = :id');
        $this->db->bind(':id', $user);
        return $this->db->registers();
    }



}