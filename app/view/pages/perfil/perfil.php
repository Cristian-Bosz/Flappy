<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';

?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-8 vstack gap-4">
            <div class="cardP">
            <div class="altoP rounded-top bg-profile"></div>
            <div class="d-sm-flex align-items-start text-center text-sm-start fondo">
                <div>
                    <div class="avatar avatar-xxl mt-n5 mb-3">
                        <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt="imgPerfil" class="avatar-img rounded-circle border border-white border-3">
                    <?php if ($datos['usuario']->usuario_id == $_SESSION['logueado']) : ?>    
                        <form action="<?= URL_PROJECT?>/perfil/cambiarImagen" method="POST" enctype="multipart/form-data">
                            <label for="editarImg">
                            
                            <div class="editar-imagen"></div>
                            <input type="hidden" name="id_user" value="<?= $_SESSION['logueado']?>" >
                            <input type="file" name="imagen" id="editarImg" style="display: none" />
                            </label>  
                            <button type="submit" class="btn btn-primary btn-sm my-3">Subir</button>   
                        </form>
                    <?php endif ?>
                    </div>
                </div>
                <div class="ms-sm-4 mt-sm-3">
                    <h1 class="mb-0 h5"><?= $datos['usuario']->username?><i class="fa-solid fa-circle-check text-success small ms-2"></i></h1>
                    <p class="text-muted"><?= $datos['perfil']->nombreCompleto?></p>
                </div>
                <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                  <button class="btn btn-danger me-4" type="button"><i class="fa-solid fa-pencil pe-1"></i>Editar perfil</button>
                </div> 
            </div>
            </div>
            <div class="card card-body mt-3">
                <div class="d-flex mb-3">
                    <div class="avatar me-2">
                        <a href="#">
                            <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt="fotoPerfilPublicacion" class="avatar-img rounded-circle">
                        </a>
                    </div>
                    <form action="" class="w-100">
                        <textarea class="form-control pe-4 border-0" rows="2" data-autoresize="" placeholder="¿Que estas pensando...?" style="height: 61px;"></textarea>
                        <label for="subirImg" class="mt-3">
                            <p class="btn bg-light py-1 px-2 mb-0"><i class="fa-solid fa-image text-success pe-2"></i> Foto</p>
                            <input type="file" id="subirImg"  style="display: none" />
                        </label>
                        <button type="submit" class="btn btn-primary float-end mt-3">Publicar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="cardP fondo">
                        <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                <h5 class="card-title">Mensajes    <?php if($datos['misNotificacionesMensaje'] > 0) : ?>
          <span class="badge bg-danger rounded-pill"><?= $datos['misNotificacionesMensaje']?></span>
          <?php endif ?></h5>
                                <button class="btn btn-dark" href="<?= URL_PROJECT ?>/mensajes"><i class="fa-solid fa-envelope me-2"></i>Mensajes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>