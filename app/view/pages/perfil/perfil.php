<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>
<pre>
    <?php var_dump($datos); ?>
</pre>

<?php if($datos['usuario']->usuario_id == $_SESSION['logueado']) : ?>
    <a href="<?php echo URL_PROJECT ?>/perfil/<?php $datos['usuario']->username ?>"> 
        <img class="w-25 rounded-circle" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>">
    </a>
<?php endif ?>


<?php
include_once URL_APP . '/view/custom/footer.php';
?>