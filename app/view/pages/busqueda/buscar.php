<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container my-4">
    <h4 class="my-2"> Resultados de la busqueda</h4>

   
        <?php foreach($datos['resultado'] as $usuariosRegistrados) : ?>
            <div class="my-3 border">
                <div class="avatar avatar-xs me-2">
                    <img src="<?= URL_PROJECT . '/' . $usuariosRegistrados->fotoPerfil ?>" alt="" class="avatar-img rounded-circle">
                </div>
                <a href="<?= URL_PROJECT ?>/perfil/<?= $usuariosRegistrados->username?>">
                    <span class="text-dark"><?= $usuariosRegistrados->nombreCompleto ?> - <?= $usuariosRegistrados->username ?> </span>
                </a>
            </div>
        <?php endforeach ?>
  
</div>


<?php
include_once URL_APP . '/view/custom/footer.php';
?>