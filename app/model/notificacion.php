<?php

class notificacion
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerNotificaciones($idusuario)
    {
        $this->db->query('SELECT N.notificacion_id , T.mensajeNotificacion , U.username , P.fotoPerfil FROM notificaciones N INNER JOIN usuarios U ON U.usuario_id = N.usuarioAccion INNER JOIN perfil P ON P.usuario_id_fk = N.usuarioAccion INNER JOIN tiposnotificaciones T ON T.tiposNotificaciones_id = N.tipoNotificaciones_id_fk WHERE N.usuario_id_fk = :iduser');
        $this->db->bind(':iduser' , $idusuario);
        return $this->db->registers();
    }

    public function eliminarNotificacion($id)
    {
        $this->db->query('DELETE FROM notificaciones WHERE notificacion_id = :id');
        $this->db->bind(':id' , $id);

        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}