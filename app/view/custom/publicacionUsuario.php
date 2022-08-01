<?php
//dd($datos['comentarios']);
?>
<?php foreach($datos['publicacionUsuario'] as $datosPublicacion): ?>
<div class="card mt-3">
    <div class="card-headerr border-0 pb-0">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-story me-2">
                    <a href="#!"> 
                        <img class="avatar-img rounded-circle" src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil?>" alt="fotoPerfil"> 
                    </a>
                 </div>
                <div>
                    <div class="nav nav-divider">
                        <h6 class="nav-item card-title mb-0"> <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datosPublicacion->username ?>"><?php echo $datosPublicacion->username ?> </a></h6>
                        <span class="nav-item small ms-2"><?php echo $datosPublicacion->fechaPublicacion ?></span>
                    </div>
                </div>
            </div>
            <div>
            <?php if ($datosPublicacion ->usuario_id == $_SESSION['logueado']):?>
                <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminar/<?php echo $datosPublicacion->publicacion_id?>"><i class="fa-solid fa-trash-can"></i></a>
            <?php endif ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="text-muted"><?php echo $datosPublicacion->contenidoPublicacion ?></p>
        <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion?>" alt="" class="img-fluid card-img">
        <ul class="nav nav-stack py-3 small">
              <li class="nav-item">
                <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta/<?php echo $datosPublicacion->publicacion_id . '/' . $_SESSION['logueado'] . '/' . $datosPublicacion->usuario_id?>"
                   class="nav-link active
                      <?php foreach ($datos['mislikes'] as $misLikesUser) {
                        if ($misLikesUser->publicacion_id_fk == $datosPublicacion->publicacion_id) {
                            echo "like-active";
                        }
                      }?>">
                   <i class="fa-solid fa-heart pe-1"></i>Me gusta <?php echo $datosPublicacion->num_likes  ?>
                </a>
              </li>
        </ul>
    </div>
</div>
<?php endforeach ?>