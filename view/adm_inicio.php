<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'layout/keywords.php';?>
    <?php
    session_start();
    if($_SESSION['id_tip_user']==1){
    ?>

    <title>Inicio</title>
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
              <h1>Inicio</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section>
          <div class="container-fluid">
              <div class="card card-success">
                  <div class="card-header">
                      <h3 class="card-title">Información</h3>
                  </div>
                  <div class="card-body">
                  <div class="row">
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                              <h3 id="venta_diaria">0</h3>
                              <p>Categoria</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                          </div>
                          <a href="adm_atributo.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                              <h3 id="venta_mensual">0</h3>
                              <p>Código</p>
                          </div>
                          <div class="icon">
                            <i class="far fa-calendar-alt"></i>
                          </div>
                          <a href="adm_atributo.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3 id="venta_anual">0</h3>
                            <p>Consultas</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-signal"></i>
                          </div>
                          <a href="adm_historial.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                  </div>
                  <div class="card-footer">
                  
                  </div>
              </div>
          </div>
      </section>
    </div>
    <?php 
    include_once 'layout/footer.php';
    }
    else{
        header('Location: ../index.php');
    }
    ?>
</body>
</html>
