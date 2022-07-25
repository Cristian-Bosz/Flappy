<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';

?>
<pre>
    <?php var_dump($datos);?>
</pre>
<div class="container">
<div class="row">
    <div class="col-md-3">  
    <div class="container">
    <img class="rounded-circle w-25" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>"/>
<br>
<a href="<?php echo URL_PROJECT?>/perfil/<?php echo $datos['usuario']->username ?>"><div class="text-left"> <?= $datos['perfil']->nombreCompleto?></div></a>

<div class="">
    <a href="#"> Publicaciones  0</a> <br>
    <a href="#"> Me gustas  0</a>
</div>
    </div>
    </div>



    <div class="col-md-6">  
        <div class="container">
        <a href="<?php echo URL_PROJECT?>/perfil"><img class="rounded-circle w-25" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>"/></a>
        <form action="">   
            <textarea class="form-control" placeholder="¿Que estas pensando?" name="post"></textarea>
                <div>
                    <div class="input-file">
                        <input type="file" name="imagen" id="imagen">
                    </div>
                    <span class="ms-1">Subir foto</span>
                </div>
            <button class="btn btn-primary float-end">Publicar</button>
        </form>
        </div>
    </div>

    <div class="col-md-3">  </div>
</div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>