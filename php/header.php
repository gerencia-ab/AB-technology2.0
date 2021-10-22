<?php




?>

<nav class="navbar navbar-expand-lg navbar-light position-fixed" style="width: 100%; z-index: 99; background-color: #191B2A;">
  <div class="container-fluid">
    <!--<a class="navbar-brand" href="#"><img clas="logo-navbar" src="recursos/imagenes/logo.svg" alt="Logo AB"></a>-->
    <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img id="barra1" src="recursos/imagenes/logo11.png" alt="Barra 1">
        <img id="barra2" src="recursos/imagenes/logo22.png" alt="Barra 2" style="display: none;">
        <!--<span class="navbar-toggler-icon"></span>-->
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #DDD">
            Inicio
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Nuestro trabajo</a></li>
            <li><a class="dropdown-item" href="#">Servicios</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #FFF">
            Nosotros
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Quienes somos</a></li>
            <li><a class="dropdown-item" href="#">Encuentranos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Contacto</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #FFF">
            Blog
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Comentarios</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Busqueda" aria-label="Search" style="border: 0; background-color: #2C3144; color: #FFF">
        <button class="btn btn-outline-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>