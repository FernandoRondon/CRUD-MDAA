<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'layout/keywords.php';?>
</head>

<body>
<div id="particles-js"></div>
    <div class="container-fluid text-center text-white texto-titulo py-5">
        <h1>Municipalidad Distrital Alto de la Alianza</h1>
    </div>
    
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Buscar codigos</h3>
                   
                </div>
                <div class="card-body">
                    <table id="tabla_codigo" class="display table table-hover text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tipo de categoria</th>
                                <th>Categoria</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</body>
</html>

<!-- Particle.js -->
<!-- <script src="../js/particles.min.js"></script>
<script src="../js/app.js"></script> -->

<!-- jQuery -->
<script src="../js/lib/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../js/lib/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/lib/adminlte.min.js"></script>

<script src="../js/datatables.js"></script>

<script src="../js/tabla.js"></script>



<style>
  .card-primary:not(.card-outline)>.card-header 
  {
    background-color: #3c5aa2 !important;
  }
  .bg-secondary 
  {
    background-color: #49a09d !important;
  }

  #particles-js
  {
    height: 100vh; 
    width: 100%;
    position: fixed;
    z-index: -1;
    background: linear-gradient(19deg, #49a09d 0%, #5f2c82 100%);
    background-size: cover;
    background-position: 50% 50%;
    background-repeat: no-repeat;
  }

  .btn-default 
  {
    background-color: #f8f9fa;
    border-color: #ddd;
    color: #444;
  }

  .border-card
  {
    border: 1px solid #3c5aa2;
  }

  .texto-normal
  {
    font-weight: normal;
  }

  .texto-titulo
  {
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
  }

</style>

    <!-- <div class="container-fluid px-5">
        <div class="card card-primary border-card">
            <div class="card-header">
                <h3 class="card-title texto-titulo">Buscar</h3>
                <div class="input-group">
                    <input type="text" id="buscar_tabla" class="form-control float-left" placeholder="Ingrese descripción">
                    <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle texto-titulo" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Código
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-dark" href="#">Romeo</a></li>
                        <li><a class="dropdown-item text-dark" href="#">Delta</a></li>
                        <li><a class="dropdown-item text-dark" href="#">Alfa</a></li>
                      </ul>
                    </div>
                </div>
            </div>
            
            <div class="card-body table-responsive p-3">
              <div class="card-header text-center bg-secondary texto-titulo">LISTA</div>
              <table class="table table-bordered table-hover text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center texto-titulo">Tipo de categoria</th>
                    <th class="text-center texto-titulo px-0">Categoria</th>
                    <th class="text-center texto-titulo">Código</th>
                    <th class="text-center texto-titulo">Nombre</th>
                    <th class="text-center texto-titulo">Descripción</th>
                  </tr>
                </thead>

                <tbody id="datos##">
                </tbody>
              </table>
            </div>
            <div class="card-footer">
            
            </div>
        </div>
    </div> -->
