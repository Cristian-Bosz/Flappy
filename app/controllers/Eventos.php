<?php 

class Eventos extends Controller
{
    public function __construct()
    {
        $this->publicarEvento = $this->model('publicarEventos');
    }

    public function publicarEvento ($idUsuario) {

        $datos = [
            'iduser' => trim($idUsuario),
            'contenido' => trim($_POST['contenido']),
            'ubicacion' => trim($_POST['ubicacion']),
            'diaEvento' => trim($_POST['diaEvento']),
        ];
        if (empty($_POST['contenido']) || (trim($_POST['contenido']) == '')) {
            $_SESSION['camposVacios'] = 'No puedes realizar una publicación sin descripción e imagen';
            redirection('/home');
            exit;
         }
        if ($this->publicarEvento->publicarEvento($datos)) {
            redirection('/home');
        } else {
            echo 'ocurrio un error';
        }
    }

    public function asistir($evento_id, $idUsuario, $idusuarioPropietario) 
    {
        $datos = [
            'evento_id' => $evento_id,
            'usuario_id' => $idUsuario,
            'idusuarioPropietario' => $idusuarioPropietario
        ];

        $datosEvento = $this->publicarEvento->getEvento($evento_id);

        if($this->publicarEvento->rowAsistencia($datos)){
            if ($this->publicarEvento->eliminarAsistencia($datos)){
                $this->publicarEvento->deleteAsisCount($datosEvento);
            }
            redirection('/home');
        } else {
            if ($this->publicarEvento->agregarAsistencia($datos)){
                $this->publicarEvento->addAsisCount($datosEvento);
            }
            redirection('/home');
        }
    }







}
