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
}