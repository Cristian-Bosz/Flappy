<?php
include_once URL_APP . '/view/custom/header.php';
?>


<section class="container-fluid py-3 bg-light">
    <div class="container mb-5">
    <div class="row justify-content-center">
    <div class="col-md-8 borde pb-3 ">
        <h1 class="display-5 mt-5 mb-5 text-center">Registro</h1>
        <form class="container" action="#" method="post"  id="loginForm">

                <div class="form-outline mb-4">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" />
                </div>
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
        <span>¿Ya tienes una cuenta?</span><a href="<?php echo URL_PROJECT?>/home/login">Ingresar</a>
    </div>
    </div>
</div>
</section>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>