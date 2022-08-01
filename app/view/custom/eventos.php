<?php
//dd($datos['comentarios']);
?>
<?php foreach($datos['eventos'] as $datosEventos): ?>
    <div class="cardP mt-2 container">
        <div class="text-center pt-2">
            <img src="<?php echo URL_PROJECT . '/' . $datosEventos->fotoPerfil?>" alt="Foto del usuario" class="img-fluid avatar avatar-xxl rounded-circle">
            <h2 class="mt-1 h4"><?=$datosEventos->username ?> realizó un evento</h2>
            <p class="text-muted">El evento se realizara el dia: <?=$datosEventos->diaEvento ?></p>
        </div>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Personas Confirmadas
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <ul>
                    <?php foreach ($datos['asistenciasEvento'] as $misAsistUser): ?>
                    <?php  if ($misAsistUser->evento_id_fk == $datosEventos->evento_id): ?>
                        <li><?= $misAsistUser->username ?></li>
                    <?php endif?> 
                    <?php endforeach ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <p><i class="fa-solid fa-circle me-2"></i><?=$datosEventos->contenidoEvento ?></p>
            <p><i class="fa-solid fa-location-dot me-2"></i>Ubicación: <?=$datosEventos->ubicacion ?></p>
            <ul class="nav nav-stack py-3 small">
                <li class="nav-item">
                    <a href="<?php echo URL_PROJECT ?>/eventos/asistir/<?php echo $datosEventos->evento_id . '/' . $_SESSION['logueado'] . '/' . $datosEventos->usuario_id?>"
                    class="btn
                        <?php foreach ($datos['misAsistencias'] as $misAsistUser) {
                            if ($misAsistUser->evento_id_fk == $datosEventos->evento_id) {
                                echo "btn-primary";
                            }
                        }?>">
                    <i class="fa-solid fa-check pe-1"></i>Asistiré <?php echo $datosEventos->num_asistencia  ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>

<?php endforeach ?>