<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container">
    <h4> Resultados de la busqueda</h4>

    <div class="my-3 border">
        <?php foreach($datos['resultado'] as $usuariosRegistrados) : ?>
            <div class="avatar avatar-xs me-2">
        <img src="<?= URL_PROJECT . '/' . $usuariosRegistrados->fotoPerfil ?>" alt="" class="avatar-img rounded-circle">
            </div>
        <?= $usuariosRegistrados->nombreCompleto ?> - <?= $usuariosRegistrados->username ?> 
        <?php endforeach ?>
    </div>
</div>


<?php
include_once URL_APP . '/view/custom/footer.php';
?>