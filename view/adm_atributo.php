<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'layout/keywords.php';?>
    <?php
    session_start();
    if($_SESSION['id_tip_user']==1||$_SESSION['id_tip_user']==3){
    ?>

    <title>Atributo</title>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include_once 'layout/nav.php';?>
    
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gestión Atributo</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <ul class="nav nav-pills">
                                  <li class="nav-item"><a href="#categoria" class="nav-link active" data-toggle="tab">Categoria</a></li>
                                  <li class="nav-item"><a href="#codigo" class="nav-link" data-toggle="tab">Código</a></li>
                              </ul>
                          </div>
                          <div class="card-body p-0">
                              <div class="tab-content">
                                  <div class="tab-pane active"  id='categoria'>
                                      <div class="card card-success">
                                          <div class="card-header">
                                              <div class="card-title">Buscar categoria <button type="button" data-toggle="modal" data-target="#crearcategoria" class="btn bg-gradient-primary btn-sm m-2">Crear categoria</button></div>
                                              <div class="input-group">
                                                  <input id="buscar-categoria"type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                  <div class="input-group-append">
                                                      <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body p-0 table-responsive">
                                            <!-- <table class="table table-hover text-nowrap">
                                              <thead class="table-success">
                                                <tr>
                                                  <th>Acción</th>
                                                  <th>Logo</th>
                                                  <th>Laboratorio</th>
                                                  
                                                  
                                                </tr>
                                              </thead>
                                              <tbody id="laboratorios">
                                              
                                              </tbody>
                                            </table> -->
                                          </div>
                                          <div class="card-footer">
                                          
                                          </div>
                                      </div>
                                  </div>

                                  
                                  <div class="tab-pane" id='codigo'>
                                      <div class="card card-success">
                                          <div class="card-header">
                                              <div class="card-title">Buscar código<button type="button" data-toggle="modal" data-target="#crearcodigo"class="btn bg-gradient-primary btn-sm m-2">Crear código</button></div>
                                              <div class="input-group">
                                                  <input id="buscar-tipo"type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                  <div class="input-group-append">
                                                      <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body p-0 table-responsive">
                                            <!-- <table class="table table-hover text-nowrap">
                                              <thead class="table-success">
                                                <tr>
                                                  <th>Acción</th>
                                                  <th>Familia</th>
                                                </tr>
                                              </thead>
                                              <tbody class="table-active" id="tipos">
                                              </tbody>
                                            </table> -->
                                          </div>
                                          <div class="card-footer"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                          
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
    <?php include_once 'layout/footer.php';
    }
    else{
        header('Location: ../index.php');
    }
    ?>
</body>
</html>
