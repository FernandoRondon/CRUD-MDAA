<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'view/keywords.php';?>
</head>

<body>
<div id="particles-js"></div>
    <div class="container-fluid text-center text-white texto-titulo py-5">
        <h1>Municipalidad Distrital Alto de la Alianza</h1>
    </div>
    
    <div class="container-fluid px-5">
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
                    <th class="text-center texto-titulo">#</th>
                    <th class="text-center texto-titulo px-0">ID | Código</th>
                    <th class="text-center texto-titulo">Descripción</th>
                    <th class="text-center texto-titulo">Acción</th>
                  </tr>
                </thead>

                <tbody id="datos">
                </tbody>
              </table>
            </div>
            <!-- <div class="card-footer">
            
            </div> -->

        </div>
    </div>

</body>
</html>

<!-- Particle.js -->
<script src="js/particles.min.js"></script>
<script src="js/app.js"></script>

<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0-rc/js/adminlte.min.js" integrity="sha512-pbrNMLSckfh8yEOr2o1RT+4zMU3Sj7+zP3BOY6nFVI/FLnjTRyubNppLbosEt4nvLCcdsEa8tmKhH3uqOYFXKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="js/sweetalert2.js"></script>
<!-- select2 -->
<script src="js/select2.js"></script>
<script src="js/datatables.js"></script>

<script type="text/javascript" src="js/tabla.js"></script>




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