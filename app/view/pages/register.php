<?php
include_once URL_APP . '/view/custom/header.php';
?>
<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mt-5 mb-3">
						<img src="<?php echo URL_PROJECT ?>/img/logoFlappy.png" alt="logo de flappy" class="flappy_logo">
					</div>
					<div class="heading mb-3">
						<h4>Registrate</h4>
					</div>

                    <?php if(isset($_SESSION['usuarioError'])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['usuarioError'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                    <?php unset($_SESSION['usuarioError']); endif ?>

                    <?php if(isset($_SESSION['camposVacios'])) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['camposVacios'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                    <?php unset($_SESSION['camposVacios']); endif ?>
                    
                    <form action="<?php echo URL_PROJECT?>/home/register" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email" required/>
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="usuario" class="form-control" id="floatingUser" placeholder="Usuario"  required/>
                            <label for="floatingUser">Nombre de Usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPass" placeholder="Contraseña" required/>
                            <label for="floatingPass">Contraseña</label>
                        </div>
						<div class="text-left mb-3">
							<button type="submit" class="btn">Registrarse</button>
						</div>
						<div class="text-white">¿Ya tienes una cuenta?
                            <a href="<?php echo URL_PROJECT?>/home/login" class="register-link">Inicia Sesión</a>
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