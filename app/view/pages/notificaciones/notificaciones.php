<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container text-center my-5">
<h2>Tenes <?= $datos['misNotificaciones']?> Notificaciones</h2>

<div class="my-5">
    <?php foreach ($datos['notificaciones'] as $datosNotificacion): ?>
      <div class="alert alert-success" role="alert">
       <span class="fw-bold"><?= $datosNotificacion->username ?> </span> <?= $datosNotificacion->mensajeNotificacion ?>
        <a class="float-end" href="<?= URL_PROJECT ?>/notificaciones/eliminar/<?= $datosNotificacion->notificacion_id?>"><i class="fa-solid fa-trash-can"></i></a> 
        </div>
       
    <?php endforeach ?>
</div>

</div>





<?php
include_once URL_APP . '/view/custom/footer.php';
?>