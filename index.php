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
    <div class="container-fluid text-center text-white py-5">
        <h1>Municipalidad Distrital Alto de la Alianza</h1>
    </div>
    
    <div class="container-fluid px-5">
        <div class="card card-primary border-card">
            <div class="card-header">
                <h3 class="card-title">Buscar</h3>
                <div class="input-group">
                    <input type="text" id="buscar"class="form-control float-left" placeholder="Ingrese descripción o código">
                    <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="input-group-prepend">
                    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
                    </div>

                </div>
            </div>
            
            <div class="card-body table-responsive p-3">
              <div class="card-header text-center bg-secondary">ROMEO</div>
              <table id="" class="table table-bordered text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center px-0">ID | Código</th>
                    <th class="text-center">Descripción</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">1 | 2</th>
                    <th>Jefe del Estado Mayor General</th>
                  </tr>
                  <tr>
                    <th class="text-center">2</th>
                    <th class="text-center">1 | 3</th>
                    <th>Inspector General</th>
                  </tr>
                  <tr>
                    <th class="text-center">3</th>
                    <th class="text-center">1 | 8</th>
                    <th>DIR. EJEC. PERSONAL</th>
                  </tr>
                  <tr>
                    <th class="text-center">4</th>
                    <th class="text-center">1 | 9</th>
                    <th>DIRNOP</th>
                  </tr>
                  <tr>
                    <th class="text-center">5</th>
                    <th class="text-center">1 | 39</th>
                    <th>Jefe de Región PNP (indicar)</th>
                  </tr>
                  <tr>
                    <th class="text-center">6</th>
                    <th class="text-center">1 | 54</th>
                    <th>Comisario de ... (indicar)</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- <div class="card-footer">
            
            </div> -->

        </div>
    </div>

</body>
</html>

<script src="js/particles.min.js"></script>
<script src="js/app.js"></script>

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

  /* .px-5 
  {
    padding-right: 10rem !important;
    padding-left: 10rem !important;
  } */

  body
  {
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
  } 
</style>