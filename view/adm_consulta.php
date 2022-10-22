<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'layout/keywords.php';?>
    <?php
    session_start();
    if($_SESSION['id_tip_user']==1||$_SESSION['id_tip_user']==3){
    ?>

    <title>Inicio</title>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include_once 'layout/nav.php';?>
    <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Consulta</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- <form action="simple-results.html"> -->
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Escriba el código aqui">
                            <div class="input-group-append">
                                <button onclick="mostrar()" type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </section>

    <section id="observacion" style="display:none;" class ="px-5 py-5">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Código</label>
                        <input type="text" class="form-control" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <input type="text" class="form-control" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="">Nombre completo</label>
                        <input type="text" class="form-control" placeholder="Fernando Marcial Rondón Puma">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha y hora</label>
                        <input type="date" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Observación</label>
                        <textarea class="form-control" rows="5" placeholder="Enter ..."></textarea>
                    </div>
                </div>


                <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary">Guardar</button>
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

<script languague="javascript">
        function mostrar() 
        {
            section = document.getElementById('observacion');
            section.style.display = '';
        }
</script>
