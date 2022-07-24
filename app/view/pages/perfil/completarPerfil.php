<?php
include_once URL_APP . '/view/custom/header.php';
var_dump($datos);
?>


<section class="container-fluid py-3 bg-light contacto">
    <div class="container mb-5">
    <div class="row justify-content-center">
    <div class="col-md-8 borde pb-3 ">
        <h1 class="display-5 mt-5 text-center">Completa tu perfil</h1>
        <p class="lead mt-2 mb-5 text-center">Antes de continuar deberás completar tu perfil</p>



        <form class="container" action="<?php echo URL_PROJECT?>/home/insertarRegistroPerfil" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id_user" value="<?php echo $_SESSION['logueado'] ?>">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="floatingInput">
                <label for="nombre">Nombre completo</label>
            </div>

            <div class="input-group mb-3">
            <input type="file" class="form-control" name="imagen" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Seleccionar una foto</label>
            </div>

                <button type="submit" class="btn btn-primary btn-block my-3 float-end" id="modal" >Registrar datos</button>
        </form>
              
                
    </div>
    </div>
</div>
</section>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>