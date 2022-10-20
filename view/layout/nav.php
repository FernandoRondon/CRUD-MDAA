    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- <span class="brand-text font-weight-light mx-3"></span> -->
        <a href="logout" class="text-danger">Cerrar sesión</a>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4 d-flex align-items-center"> -->
    <aside id="background" class="main-sidebar sidebar-dark-primary elevation-4">
      
      <!-- Brand Logo -->
      <!-- <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">InnovamosContigo</span>
      </a> -->
      <a href="../views/general.php" class="brand-link">
        <img src="../asset/img/logo-white.png" alt="MDAA" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MDAA</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../asset/img/user2.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Fernando Rondón</a>
        </div>
      </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- <li class="nav-header">EXAMPLES</li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-address-book"></i>
                <p>
                  Inicio
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-cubes"></i>
                <p>
                  Atributo
                </p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Código
                </p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Historial
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Consulta
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Reporte
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <style>
      #background
      {
        background-color: #323c55;
      }
      #title 
      {
        font-size: 36px;
        font-weight: bold;
      }

      /* PRIMARY BUTTON*/
      .btn-primary
      {
        color: #fff;
        background-color: #3f6791;
        border-color: #3f6791;
        box-shadow: none;
      }
      .btn-primary:hover 
      {
        color: #fff;
        background-color: #335476;
        border-color: #304e6d;
      }
      .btn-primary:focus 
      {
        color: #fff;
        background-color: #335476;
        border-color: #304e6d;
        box-shadow: 0 0 0 0 rgb(92 126 162 / 50%);
      }
      .btn-primary:not(:disabled):not(.disabled):active{
        color: #fff;
        background-color: #304e6d;
        border-color: #2c4765;
        box-shadow: none !important;
      }

      .bg-primary 
      {
        background-color: #3f6791 !important;
      }


     /* SUCCESS BUTTON */
      .btn-success 
      {
          color: #fff;
          background-color: #00bc8c;
          border-color: #00bc8c;
          box-shadow: none;
      }
      .btn-success:hover 
      {
        color: #fff;
        background-color: #009670;
        border-color: #008966;
      }
      .btn-success:focus 
      {
        color: #fff;
        background-color: #009670;
        border-color: #008966;
        box-shadow: 0 0 0 0 rgb(38 198 157 / 50%);
      }
      .btn-success:not(:disabled):not(.disabled):active
      {
        color: #fff;
        background-color: #008966;
        border-color: #007c5d;
        box-shadow: none !important;
      }

      .bg-success
      {
        background-color: #00bc8c !important;
      }
      

      /* DANGER BUTTON */
      .btn-danger
      {
        box-shadow: none !important;
      }
      .btn-danger:not(:disabled):not(.disabled):active
      {
        box-shadow: none !important;
      }
    </style>