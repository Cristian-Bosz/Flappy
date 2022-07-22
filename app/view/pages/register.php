<?php
include_once URL_APP . '/view/custom/header.php';
?>


<section class="container-fluid py-3 bg-light">
    <div class="container mb-5">
    <div class="row justify-content-center">
    <div class="col-md-8 borde pb-3 ">
        <h1 class="display-5 mt-5 mb-5 text-center">Registro</h1>
        <form class="container" action="<?php echo URL_PROJECT?>/home/register" method="post">
  <div class="form-outline mb-4">
                    <label class="form-label">Email*</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu Email" required/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required/>
                </div>
              

                <div class="form-outline mb-4">
                    <label class="form-label">Contraseña*</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu Contraseña" required/>
                </div>

                <button type="submit" class="btn btn-primary btn-block" id="modal" >Registrarse</button>
        </form>

        <?php if(isset($_SESSION['usuarioError'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['usuarioError'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
        <?php unset($_SESSION['usuarioError']); endif ?>

        <span>¿Ya tienes una cuenta?</span><a href="<?php echo URL_PROJECT?>/home/login">Ingresar</a>
    </div>
    </div>
</div>
</section>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>