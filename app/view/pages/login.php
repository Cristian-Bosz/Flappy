<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>

<section class="container-fluid py-3 bg-light contacto">
    <div class="container mb-5">
    <div class="row justify-content-center">
    <div class="col-md-8 borde pb-3 ">
        <h1 class="display-5 mt-5 mb-5 text-center">¡Iniciar sesión!</h1>
        <form class="container" action="#" method="post"  id="loginForm">

                <div class="form-outline mb-4">
                    <label class="form-label">Email*</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu Email"  />
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