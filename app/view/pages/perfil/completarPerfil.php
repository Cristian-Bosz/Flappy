<?php
include_once URL_APP . '/view/custom/header.php';
?>
<section class="bodyPer">
    <div class="container mb-5">
    <div class="row justify-content-center">
    <div class="col-md-8 borde pb-3 cardP ">
        <h1 class="display-5 mt-5 text-center">Completa tu perfil</h1>
        <p class="lead mt-2 mb-5 text-center">Antes de continuar deberás completar tu perfil</p>
        <?php if(isset($_SESSION['camposVacios'])) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['camposVacios'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
        <?php unset($_SESSION['camposVacios']); endif ?>
        <form class="container" action="<?php echo URL_PROJECT?>/home/insertarRegistroPerfil" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id_user" value="<?php echo $_SESSION['logueado'] ?>">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="floatingInput" placeholder="Ingresa tu nombre completo">
                <label for="nombre">Nombre completo</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="estado" id="floatingInput" placeholder="Ingresa un estado para tu perfil">
                <label for="nombre">Estado</label>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="elegirImg">
                    <p class="btn py-1 px-2 mb-0"><i class="fa-solid fa-image text-success pe-2"></i> Elige una foto de perfil</p>
                    <input type="file" class="form-control" name="imagen" id="elegirImg" style="display: none">
                </label>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block my-3 btn-lg" id="modal" >Registrar datos</button>
            </div>
        </form>
              
                
    </div>
    </div>
</div>

</section>


<?php
include_once URL_APP . '/view/custom/footer.php';
?>