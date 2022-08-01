<?php

class chat
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }

    public function enviarMensaje($datosMensaje){
        $this->db->query('INSERT INTO mensajes (usuarioEmisor ,	contenido ,usuarioReceptor) VALUES (:iduserEmisor , :contenido , :iduserReceptor)');
        $this->db->bind(':iduserEmisor' , $datosMensaje['iduser_emisor']);
        $this->db->bind(':contenido' , $datosMensaje['mensaje']);
        $this->db->bind(':iduserReceptor' , $datosMensaje['enviar']);
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function getMensajes($id)
    {
        $this->db->query('SELECT username , fotoPerfil , contenido , fechaMensaje , mensaje_id 
        FROM mensajes 
        INNER JOIN usuarios ON usuario_id = usuarioEmisor
        INNER JOIN perfil ON usuario_id_fk = usuarioEmisor
        WHERE usuarioReceptor = :id');
        $this->db->bind(':id' , $id);
        return $this->db->registers();
    }
   
    

    public function eliminarMensaje($id)
    {
        $this->db->query('DELETE FROM mensajes WHERE mensaje_id = :id');
        $this->db->bind(':id' , $id);
        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }


    public function addNotificacionMensaje($datosMensaje){
        $this->db->query('INSERT INTO notificaciones (usuarioAccion , usuario_id_fk , tipoNotificaciones_id_fk) VALUES (:usuarioAccion , :idUsuario , :tipo)');
        $this->db->bind(':usuarioAccion' , $datosMensaje['iduser_emisor']);
        $this->db->bind(':idUsuario' , $datosMensaje['enviar']);
        $this->db->bind(':tipo' , 3);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getNotificacionesMensaje($id)
    {
        $this->db->query('SELECT tipoNotificaciones_id_fk  FROM notificaciones WHERE usuario_id_fk = :id');
        $this->db->bind(':id' , $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}