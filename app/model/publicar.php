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
        $this->db->query('SELECT P.publicacion_id, P.contenidoPublicacion, P.fotoPublicacion, P.fechaPublicacion, P.num_likes, U.username, U.usuario_id, Per.fotoPerfil 
                          FROM publicaciones P
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

    public function publicarComentario($datos)
    {
        $this->db->query('INSERT INTO comentarios (usuario_id_fk, publicacion_id_fk, contenidoComentario) VALUES (:usuario_id, :publicacion_id, :comentario)');
        $this->db->bind(':usuario_id', $datos['usuario_id']);
        $this->db->bind(':publicacion_id', $datos['publicacion_id']);
        $this->db->bind(':comentario', $datos['comentario']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getComentarios()
    {
        $this->db->query('SELECT C.comentarios_id, C.contenidoComentario, C.fechaComentario, C.publicacion_id_fk, C.usuario_id_fk, U.username, Per.fotoPerfil FROM comentarios C
        INNER JOIN usuarios U ON U.usuario_id = C.usuario_id_fk 
        INNER JOIN perfil Per ON Per.usuario_id_fk = C.usuario_id_fk');
        return $this->db->registers();

    }

    public function eliminarComentarioUsuario($id) {
        $this->db->query('DELETE FROM comentarios WHERE comentarios_id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addNotificacionLike($datos)
    {
        $this->db->query('INSERT INTO notificaciones (usuarioAccion , usuario_id_fk , tipoNotificaciones_id_fk) VALUES (:usuarioAccion , :idUsuario , :tipo)');
        $this->db->bind(':usuarioAccion' , $datos['usuario_id']);
        $this->db->bind(':idUsuario' , $datos['idusuarioPropietario']);
        $this->db->bind(':tipo' , 1);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function addNotificacionComentario($datos){
        $this->db->query('INSERT INTO notificaciones (usuarioAccion , usuario_id_fk , tipoNotificaciones_id_fk) VALUES (:usuarioAccion , :idUsuario , :tipo)');
        $this->db->bind(':usuarioAccion' , $datos['usuario_id']);
        $this->db->bind(':idUsuario' , $datos['iduserPropietario']);
        $this->db->bind(':tipo' , 2);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getNotificaciones($id)
    {
        $this->db->query('SELECT notificacion_id FROM notificaciones WHERE usuario_id_fk = :id');
        $this->db->bind(':id' , $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}