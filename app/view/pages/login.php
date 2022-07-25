<?php
include_once URL_APP . '/view/custom/header.php';
?>

<section class="container-fluid py-3 bg-light contacto">
    <div class="container mb-5">
    <div class="row justify-content-center">
    <div class="col-md-8 borde pb-3 ">
        <h1 class="display-5 mt-5 mb-5 text-center">¡Iniciar sesión!</h1>

        <!--Este es el alert cuando el email o la contrasela es incorrecta-->
        <?php if(isset($_SESSION['errorLogin'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['errorLogin'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
        <?php unset($_SESSION['errorLogin']); endif ?>

        <!--Este es el alert cuando el registro se completó-->
        <?php if(isset($_SESSION['loginComplete'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['loginComplete'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
        <?php unset($_SESSION['loginComplete']); endif ?>

        <form class="container" action="<?php echo URL_PROJECT?>/home/login" method="post">

        <div class="form-outline mb-4">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label">Contraseña*</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu Contraseña"/>
                </div>

                <button type="submit" class="btn btn-primary btn-block" id="modal" >Ingresar</button>
        </form>

                <span>¿No tienes una cuenta?</span><a href="<?php echo URL_PROJECT?>/home/register">Registrarme</a>
    </div>
    </div>
</div>
</section>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>