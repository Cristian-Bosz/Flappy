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
            $_SESSION['camposVacios'] = 'No puedes realizar un evento sin todos los datos necesarios';
            redirection('/home');
            exit;
         }
         if (empty($_POST['ubicacion']) || (trim($_POST['ubicacion']) == '')) {
            $_SESSION['camposVacios'] = 'No puedes realizar un evento sin todos los datos necesarios';
            redirection('/home');
            exit;
         }
         if (empty($_POST['diaEvento']) || (trim($_POST['diaEvento']) == '')) {
            $_SESSION['camposVacios'] = 'No puedes realizar un evento sin todos los datos necesarios';
            redirection('/home');
            exit;
         }
        if ($this->publicarEvento->publicarEvento($datos)) {
            $_SESSION['exito'] = 'El evento se creó con éxito';
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
                $_SESSION['exito'] = 'Ya no participas en el evento';
            }
            redirection('/home');
        } else {
            if ($this->publicarEvento->agregarAsistencia($datos)){
                $this->publicarEvento->addAsisCount($datosEvento);
                $_SESSION['exito'] = 'Te anotaste al evento con éxito';

            }
            redirection('/home');
        }
    }

    public function eliminar($evento_id) 
    {
        $evento = $this->publicarEvento->getEvento($evento_id);

        //dd($evento);

        if ($this->publicarEvento->eliminarEvento($evento)) {
            $_SESSION['exito'] = 'El evento se eliminó con éxito';
            redirection('/home');

        } else {
            echo 'No se pudo eliminar el evento';
        }
    } 

}
