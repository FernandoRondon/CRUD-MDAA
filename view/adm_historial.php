<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'layout/keywords.php';?>
    <?php
    session_start();
    if($_SESSION['id_tip_user']==1||$_SESSION['id_tip_user']==2){
    ?>

    <title>Consulta</title>
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
                <h1>Listar Consultas </h1>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>
        
        <section>
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buscar consultas</h3>
                    
                    </div>
                    <div class="card-body">
                        <table id="tabla_venta" class="display table table-hover text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Categoria</th>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
d

    <?php 
    include_once 'layout/footer.php';
    }
    else{
        header('Location: ../index.php');
    }
    ?>
</body>
</html>

<!-- <script src="../asset/js/consulta.js"></script> -->
