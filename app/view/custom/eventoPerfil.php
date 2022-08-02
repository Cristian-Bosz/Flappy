<div class="card card-body mt-3">
                <div class="d-flex mb-3">
                <div class="avatar me-2">
                    <a href="#">
                        <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt="foto de perfil en publicación de <?= $datos['perfil']->nombreCompleto?>" class="avatar-img rounded-circle">
                    </a>
                </div>
                <form action="<?php echo URL_PROJECT ?>/eventos/publicarEvento/<?php echo $datos['usuario']->usuario_id ?>" 
                      enctype="multipart/form-data" 
                      method="POST" 
                      class="w-100">
                    <textarea class="form-control pe-4 border-0" rows="2" id="contenido" name="contenido" placeholder="¿Que vamos hacer..?" style="height: 61px;"></textarea>
                    <input type="text" name="ubicacion" id="ubicacion" class="form-control mt-2" placeholder="Ingresa la ubicación">
                    <input type="date" name="diaEvento" id="diaEvento" class="form-control mt-2">
                    <button type="submit" class="btn btn-primary mt-3">Publicar Evento</button>
                </form>
                </div>
</div>