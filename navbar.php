<nav class="navbar navbar-dark bg-danger fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SISTEMA DE VENTAS JMC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-danger" tabindex="-1" id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Sistema de Registros</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="../pagina_principal.html">Inicio</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Cliente
              </a>
              <ul class="dropdown-menu dropdown-menu-light">
                <li><a class="dropdown-item" href="cliente_inicio.php">Ver Clientes</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="cliente_registro.html">Registro Nuevo Cliente</a></li>

              </ul>
            </li>


          </ul>

        </div>
      </div>
    </div>
  </nav>