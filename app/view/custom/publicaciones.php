<?php
//dd($datos['comentarios']);
?>
<?php foreach($datos['publicaciones'] as $datosPublicacion): ?>
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
                   <i class="fa-solid fa-heart pe-1"></i>Me gusta (<?php echo $datosPublicacion->num_likes  ?>)
                </a>
              </li>
        </ul>
        <div class="d-flex mb-3">
              <!-- Avatar -->
              <div class="avatar avatar-xs me-2">
                <a href="#!"> <img class="avatar-img rounded-circle" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt=""> </a>
              </div>
              <!-- Comment box  -->
              <form class="w-100" action="<?php echo URL_PROJECT ?>/publicaciones/comentar" method="POST">
              <input type="hidden" name="iduserPropietario" value="<?php echo $datosPublicacion->usuario_id?>">
                    <input type="hidden" name="usuario_id" value="<?php echo $datos['usuario']->usuario_id?>">
                    <input type="hidden" name="publicacion_id" value="<?php echo $datosPublicacion->publicacion_id?>">
                    <textarea name="comentario" class="form-control pe-4 bg-light" rows="1" placeholder="Agrega un comentario..." require></textarea>
                    <button class="btn btn-primary float-end mt-3" type="submit">Comentar</button>
              </form>
        </div>
        <ul class="comment-wrap list-unstyled" id="Comentarios">
            <?php foreach ($datos['comentarios'] as $datosComentarios): ?>
                <?php if($datosComentarios->publicacion_id_fk == $datosPublicacion->publicacion_id):?>
                    <li class="comment-item mt-3">
                        <div class="d-flex position-relative">
                            <div class="avatar avatar-xs">
                                <a href="#!">
                                    <img class="avatar-img rounded-circle" src="<?php echo URL_PROJECT . '/' . $datosComentarios->fotoPerfil?>" alt="fotoPerfilUsuario">
                                </a>
                            </div>
                            <div class="ms-2 w-100">
                                <div class="bg-light rounded-start-top-0 p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1 fw-bold"> <a href="#!"><?= $datosComentarios->username ?></a></h6>
                                    <?php if ($datosComentarios ->usuario_id_fk == $_SESSION['logueado']):?>
                                            <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminarComentario/<?php echo $datosComentarios->comentarios_id?>"
                                               class="floar-right"> 
                                               <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                    <?php endif ?>
                                    </div>
                                    <p class="small mb-0"><?= $datosComentarios->contenidoComentario?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endif ?>
            <?php endforeach?>
        </ul>
    </div>

</div>
<?php endforeach ?>