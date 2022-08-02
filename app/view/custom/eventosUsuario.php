<?php foreach($datos['eventosUser'] as $datosEventos): ?>
    <div class="cardP mt-2 container">
        <?php if ($datosEventos->usuario_id == $_SESSION['logueado']):?>
            <div class="p-2">
                <a href="<?php echo URL_PROJECT ?>/eventos/eliminar/<?php echo $datosEventos->evento_id?>"><i class="fa-solid fa-trash-can"></i></a>
            </div>   
        <?php endif ?>
        <div class="text-center pt-3">
            <img src="<?php echo URL_PROJECT . '/' . $datosEventos->fotoPerfil?>" alt="Foto del usuario" class="img-fluid avatar avatar-xxl rounded-circle">
            <h2 class="mt-1 h4"><?=$datosEventos->username ?> realizó un evento</h2>
            <p class="text-muted">El evento se realizará el día: <?=$datosEventos->diaEvento ?></p>
        </div>
        <hr>
        <div class="text-center">
            <p><i class="fa-solid fa-circle me-2"></i><?=$datosEventos->contenidoEvento ?></p>
            <p><i class="fa-solid fa-location-dot me-2"></i>Ubicación: <?=$datosEventos->ubicacion ?></p>
            <div class="text-center">
                <a href="<?php echo URL_PROJECT ?>/eventos/asistir/<?php echo $datosEventos->evento_id . '/' . $_SESSION['logueado'] . '/' . $datosEventos->usuario_id?>"
                    class="btn
                        <?php foreach ($datos['misAsistencias'] as $misAsistUser) {
                            if ($misAsistUser->evento_id_fk == $datosEventos->evento_id) {
                                echo "btn-primary";
                            }
                        }?>">
                    <i class="fa-solid fa-check pe-1"></i>Asistiré <?php echo $datosEventos->num_asistencia  ?>
                    </a>
            </div>
        </div>
        <div>
            <p>Personas Confirmadas:</p>
            <ul>
                    <?php foreach ($datos['asistenciasEvento'] as $misAsistUser): ?>
                    <?php  if ($misAsistUser->evento_id_fk == $datosEventos->evento_id): ?>
                        <li><?= $misAsistUser->username ?></li>
                    <?php endif?> 
                    <?php endforeach ?>
            </ul>
        </div>
    </div>

<?php endforeach ?>