<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
//var_dump($datos);
?>
<div class="container">
<div class="row">
    <div class="col-lg-3 fondo">
        <div class="cardP overflow-hidden">
        <div class="h-50px bg-profile"></div>
        <div class="card-body pt-0">
            <div class="text-center">
                <div class="avatar avatar-lg mt-n5 mb-3">
                    <a href="#">
                        <img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>" class="avatar-img rounded border border-white border-3" alt="fotoPerfil">
                    </a>
                </div>
            <h5><?= $datos['perfil']->nombreCompleto?></h5>
            <small class="text-muted"><?= $datos['usuario']->username ?></small>
            <p class="text-muted mt-2">El saber no ocupa espacio</p>
            <div class="hstack gap-2 gap-xl-3 justify-content-center">
                <div>
                    <h6 class="mb-0">2</h6>
                    <small>Posts</small>
                </div>
                <div class="vr"></div>
                <div>
                    <h6 class="mb-0">259</h6>
                    <small>Likes</small>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-8 col-lg-6 vstack gap-4">
        <div class="card card-body">
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
    
    <div class="col-md-3">  </div>
</div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>