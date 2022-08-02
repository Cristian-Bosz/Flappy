<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';

//dd($datos);
?>
<div class="container mt-3">
<div class="row">
    <div class="col-lg-3">
        <div class="cardP overflow-hidden fondo">
        <div class="h-50px bg-profile"></div>
        <div class="card-body pt-0">
            <div class="text-center">
                <div class="avatar avatar-lg mt-n5 mb-3">
                    <a href="<?= URL_PROJECT ?>/perfil/<?= $datos['usuario']->username?>">
                        <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" class="avatar-img rounded border border-white border-3 " alt="foto de perfil de <?= $datos['perfil']->nombreCompleto?>"/>
                    </a>
                </div>
                <a href="<?= URL_PROJECT ?>/perfil/<?= $datos['usuario']->username?>"> 
                <h5><?= $datos['perfil']->nombreCompleto?></h5>
                </a>
           
            <small class="text-muted"><?= $datos['usuario']->username ?></small>
            <p class="text-muted mt-2">El saber no ocupa espacio</p>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-8 col-lg-6 vstack gap-4">
        <?php if(isset($_SESSION['camposVacios'])) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['camposVacios'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
        <?php unset($_SESSION['camposVacios']); endif ?>
        <?php if(isset($_SESSION['exito'])) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['exito'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
        <?php unset($_SESSION['exito']); endif ?>
        <div class="card card-body">
            <div class="d-flex mb-3">
                <div class="avatar me-2">
                    <a href="#">
                        <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" alt="foto de perfil en publicación de <?= $datos['perfil']->nombreCompleto?>" class="avatar-img rounded-circle">
                    </a>
                </div>
                <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $datos['usuario']->usuario_id ?>" 
                      enctype="multipart/form-data" 
                      method="POST" 
                      class="w-100">
                    <textarea class="form-control pe-4 border-0" rows="2" id="contenido" name="contenido" placeholder="¿Que estas pensando...?" style="height: 61px;"></textarea>
                    <label for="subirImg" class="mt-3">
                        <p class="btn bg-light py-1 px-2 mb-0"><i class="fa-solid fa-image text-success pe-2"></i> Foto</p>
                        <input type="file" id="subirImg" name="imagen"  style="display: none" />
                    </label>
                    <button type="submit" class="btn btn-primary float-end mt-3">Publicar</button>
                </form>
            </div>
        </div>
        <?php
        include_once URL_APP . '/view/custom/publicaciones.php';
        ?>
        <?php
        include_once URL_APP . '/view/custom/eventos.php';
        ?>
    </div>
    
    <div class="col-md-3">  </div>
</div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>