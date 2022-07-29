<?php
include_once URL_APP . '/view/custom/header.php';
include_once URL_APP . '/view/custom/navbar.php';
?>



<section class="container">
    <h2 class="text-center mt-5">Chats privados</h2>
    <?php if(isset($_SESSION['camposVacios'])) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['camposVacios'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
        <?php unset($_SESSION['camposVacios']); endif ?>
<div class="row my-5">
    <div class="col-6">
        <form action="<?= URL_PROJECT ?>/mensajes" method="POST">
            <input type="hidden" name="iduser_emisor" value="<?= $_SESSION['logueado']?>">
            <select class="form-select" name="enviar" aria-label="Default select example">
                <?php foreach ($datos['usuarios'] as $allUsuarios) : ?>
                <option value="<?= $allUsuarios->usuario_id?>"><?= $allUsuarios->username?></option>
                <?php endforeach ?>
            </select>

            <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" name="mensaje" id="mensaje" rows="3"></textarea>
            </div>

            <button class="btn btn-info">Enviar mensaje</button>
        </form>
    </div>




    <div class="col-6">
        <ul class="comment-wrap list-unstyled" id="Comentarios">
            <?php foreach ($datos['misMensajes'] as $datosMensajes) : ?>
                
                    <li class="comment-item mt-3">
                        <div class="d-flex position-relative">
                            <div class="avatar avatar-xs">
                                <a href="#!">
                                    <img class="avatar-img rounded-circle" src="<?= URL_PROJECT . '/' . $datosMensajes->fotoPerfil?>" alt="fotoPerfilUsuario">
                                </a>
                            </div>
                            <div class="ms-2 w-100">
                                <div class="bg-light rounded-start-top-0 p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1 fw-bold"> <a href="#!"><?= $datosMensajes->username ?></a></h6>
                                   
                                        <a href="<?= URL_PROJECT ?>/mensajes/eliminarMensaje/<?=$datosMensajes->mensaje_id ?>"><i class="fa-solid fa-trash-can"></i></a>
                                 
                                    </div>
                                    <p class="small mb-0"><?= $datosMensajes->contenido ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
            
            <?php endforeach?>
        </ul>
    </div>
</div>










</section>


<?php
include_once URL_APP . '/view/custom/footer.php';
?>