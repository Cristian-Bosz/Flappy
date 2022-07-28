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
        $this->db->query('SELECT notificacion_id , mensajeNotificacion , username 
        FROM notificaciones  
        INNER JOIN usuarios  ON usuario_id = usuarioAccion 
        INNER JOIN tiposnotificaciones  ON tiposNotificaciones_id = tipoNotificaciones_id_fk 	 
        WHERE usuario_id_fk = :iduser');
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