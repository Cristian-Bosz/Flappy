<?php
//dd($datos['publicaciones']);
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
                <a href="#"><i class="fa-solid fa-trash-can"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="text-muted"><?php echo $datosPublicacion->contenidoPublicacion ?></p>
        <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion?>" alt="Imagen publicacion" class="img-fluid card-img">
        <ul class="nav nav-stack py-3 small">
              <li class="nav-item">
                <a class="nav-link active" href="#!"><i class="fa-solid fa-heart pe-1"></i>Liked (56)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#!"><i class="fa-solid fa-comment pe-1"></i>Comments (12)</a>
              </li>
        </ul>
        <div class="d-flex mb-3">
              <!-- Avatar -->
              <div class="avatar avatar-xs me-2">
                <a href="#!"> <img class="avatar-img rounded-circle" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt=""> </a>
              </div>
              <!-- Comment box  -->
              <form class="w-100">
                <textarea data-autoresize="" class="form-control pe-4 bg-light" rows="1" placeholder="Agrega un comentario..."></textarea>
              </form>
        </div>
        <ul class="comment-wrap list-unstyled">
            <li class="comment-item">
                <div class="d-flex position-relative">
                    <div class="avatar avatar-xs">
                        <a href="#!"><img class="avatar-img rounded-circle" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt="fotoPerfilUsuario"></a>
                    </div>
                    <div class="ms-2">
                        <div class="bg-light rounded-start-top-0 p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1 fw-bold"> <a href="#!">Peter Quill</a></h6>
                                <small class="ms-2">5hr</small>
                            </div>
                            <p class="small mb-0">¿Que vamos hacer? ¿algo bueno? ¿algo malo? ¿Un poco de ambos? un poco de ambos</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>
<?php endforeach ?>