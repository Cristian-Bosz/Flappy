<?php 
class PublicarEventos 
{

    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function publicarEvento ($datos) {

        $this->db->query('INSERT INTO eventos (contenidoEvento, diaEvento, ubicacion, usuario_id_fk)
                          VALUES (:contenido, :diaEvento, :ubicacion, :iduser)');
        $this->db->bind(':iduser', $datos['iduser']);
        $this->db->bind(':contenido', $datos['contenido']);
        $this->db->bind(':diaEvento', $datos['diaEvento']);
        $this->db->bind(':ubicacion', $datos['ubicacion']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getEventos() {
        $this->db->query('SELECT E.evento_id, E.contenidoEvento, E.num_asistencia, E.diaEvento, E.ubicacion,  U.username, U.usuario_id, Per.fotoPerfil 
                          FROM eventos E
                          INNER JOIN usuarios U ON U.usuario_id = E.usuario_id_fk 
                          INNER JOIN perfil Per ON Per.usuario_id_fk = E.usuario_id_fk');
        return $this->db->registers();
    }

    public function getEvento($id) {
        $this->db->query('SELECT * FROM eventos WHERE evento_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->register();

    }

    public function eliminarEvento($evento)
    {
        //dd($publicacion);

        $this->db->query('DELETE FROM eventos WHERE evento_id = :id ');
        $this->db->bind(':id', $evento->evento_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function rowAsistencia($datos) 
    {
        $this->db->query('SELECT * FROM asistencias WHERE usuario_id_fk = :iduser	AND evento_id_fk = :evento');
        $this->db->bind(':iduser', $datos['usuario_id']);
        $this->db->bind(':evento', $datos['evento_id']);
        $this->db->execute();

        return $this->db->rowCount();

    }

    public function agregarAsistencia($datos) 
    {
        $this->db->query('INSERT INTO asistencias (usuario_id_fk, evento_id_fk) VALUES (:iduser, :evento)');
        $this->db->bind(':iduser', $datos['usuario_id']);
        $this->db->bind(':evento', $datos['evento_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function eliminarAsistencia($datos) 
    {
        $this->db->query('DELETE FROM asistencias WHERE usuario_id_fk = :iduser	AND evento_id_fk = :evento');
        $this->db->bind(':iduser', $datos['usuario_id']);
        $this->db->bind(':evento', $datos['evento_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteAsisCount($datos)
    {
        $this->db->query('UPDATE eventos SET num_asistencia = :countAsis WHERE evento_id = :idEvento');
        $this->db->bind(':countAsis', ($datos->num_asistencia -1));
        $this->db->bind(':idEvento', $datos->evento_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addAsisCount($datos)
    {
        $this->db->query('UPDATE eventos SET num_asistencia = :countAsis WHERE evento_id = :idEvento');
        $this->db->bind(':countAsis', ($datos->num_asistencia + 1));
        $this->db->bind(':idEvento', $datos->evento_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function misAsistencias($user)
    {
        $this->db->query('SELECT * FROM asistencias WHERE usuario_id_fk = :id');
        $this->db->bind(':id', $user);
        return $this->db->registers();
    }

    public function asistenciasEventos()
    {
        $this->db->query('  SELECT A.asistencia_id, A.usuario_id_fk, A.evento_id_fk,  U.username, U.usuario_id, Per.fotoPerfil 
                            FROM asistencias A
                            INNER JOIN usuarios U ON U.usuario_id = A.usuario_id_fk 
                            INNER JOIN perfil Per ON Per.usuario_id_fk = A.usuario_id_fk
                            WHERE A.evento_id_fk');
        return $this->db->registers();
    }



}