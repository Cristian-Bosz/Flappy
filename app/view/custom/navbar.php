
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-dove mx-1"></i>Flappy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse align-items-start" id="navbarSupportedContent"> 
        <form class="d-flex mx-5">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URL_PROJECT?>/home">
          <i class="fa-solid fa-house mx-1"></i>Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-users mx-1"></i>Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-comment mx-1"></i>Mensajes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL_PROJECT ?>/notificaciones"><i class="fa-solid fa-bell mx-1"></i>Notificaciones 
          <?php if($datos['misNotificaciones'] > 0) : ?>
          <span class="badge bg-primary rounded-pill"><?= $datos['misNotificaciones']?></span>
        <?php endif ?>
        </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         
          <img class="rounded-circle img-perfil-nav" src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil?>"/>
           
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL_PROJECT ?>/perfil/<?= $datos['usuario']->username?>">Perfil</a></li>
                
            <li><hr class="dropdown-divider"></li>
           <li><a class="dropdown-item btn btn-primary" href="<?= URL_PROJECT?>/home/logout" role="button">Cerrar Sesión</a></li>    
          </ul>
        </li>
       
      </ul>
     
    </div>
  </div>
</nav>


