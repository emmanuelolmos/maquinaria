<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <a class="navbar-brand" href="<?php echo $env["APP_URL"]; ?>">MAQUINAS</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Maquinarias</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Plantillas</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Api</a>
        </li>

      </ul>

      <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> <?php echo $_SESSION['nombre'] ?>
                </a>
                <div class="dropdown-menu " style="width: 0px;">
                    <a class="dropdown-item text-center" href="<?php echo $env["APP_URL"] . '/app/Controllers/SessionController.php?function=exitSession'; ?>">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </a>
                </div>
            </li>
        </ul>

    </div>

  </div>
</nav>