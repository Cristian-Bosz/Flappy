<?php
include_once URL_APP . '/view/custom/header.php';
?>
<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mt-5 mb-3">
						<img src="<?php echo URL_PROJECT ?>/img/logoFlappy.png" width="150px">
					</div>
					<div class="heading mb-3">
						<h4>¡Inicia Sesión!</h4>
					</div>
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
                    <form action="<?php echo URL_PROJECT?>/home/login" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="usuario" id="floatingInput" class="form-control" placeholder="Ingresa tu nombre de usuario" required/>
                            <label for="floatingInput">Nombre de usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingContra" placeholder="Ingresa tu Contraseña"/>
                            <label for="floatingContra">Contraseña</label>
                        </div>
						<div class="text-left mb-3">
							<button type="submit" class="btn">Ingresar</button>
						</div>
						<div class="text-white">¿No tienes una cuenta?
                            <a href="<?php echo URL_PROJECT?>/home/register" class="register-link">Registrarme</a>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
















<?php
include_once URL_APP . '/view/custom/footer.php';
?>