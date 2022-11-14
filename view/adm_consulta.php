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
    <?php
        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('d/m/y h:i:s A');
    ?>
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4 py-3">Incidencia</h2>
                
                    <div class="card-default bg-white">
                        <form id="form-crear-consulta">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 py-3 px-3">
                                <div class="row justify-content-center">
                                  <div class="col-8 pt-3">
                                    <!-- <div class="form-group">
                                      <label for="codigo">Código:</label>
                                      <select id="codigo" name="codigo" class="form-control select2" style="width: 100%;" required></select>
                                    </div> -->

                                    <div class="input-group">
                                      <select id="codigo" name="codigo" class="form-control select2" style="width: 89%;" required></select>
                                      <div class="input-group-append">
                                        <button onclick="mostrar()" class="btn btn-secondary" type="button">Buscar</button>
                                      </div>
                                    
                                    </div>

                                    <!-- <div class="input-group">
                                      <input type="text" class="form-control">
                                      <span class="input-group-append">
                                      <button type="button" class="btn btn-info btn-flat">Go!</button>
                                      </span>
                                    </div> -->

                                  </div>
                                </div>

                                <div id="detalle" style="display:none;" class="row justify-content-center">
                                  <!-- <div class="col-8 pt-3">
                                    <div class="form-group">
                                      <label for="codigo">Código:</label>
                                      <select id="codigo" name="codigo" class="form-control select2" style="width: 100%;" required></select>
                                    </div>
                                  </div> -->

                                  <div class="col-8 pt-5">
                                    <h3 class="text-center" >Detalle</h3>
                                      <div class="form-group">
                                          <label for="categoria">Categoria:</label>
                                          <select id="categoria" name="categoria" class="form-control" type="text" disabled="" required></select>
                                      </div>
                                  </div>

                                  <div class="col-8">
                                      <div class="form-group">
                                          <label for="observacion">Observación:</label>
                                          <textarea id="observacion" name="observacion" class="form-control" rows="3" placeholder="Escriba aqui ..."></textarea>
                                      </div>
                                  </div>

                                  <div class="col-8">
                                      <div class="form-group">
                                          <label for="usuario">Usuario:</label>
                                          <input id="usuario" name="usuario" type="text" class="form-control" value="<?php echo $_SESSION['consultor']?>" disabled="">
                                      </div>
                                  </div>
                                  <div class="col-8">
                                      <div class="form-group">
                                          <label for="fecha_hora">Fecha y hora:</label>
                                          <input id="fecha_hora" name="fecha_hora" type="text" class="form-control" value="<?php echo $fechaActual?>" disabled="">
                                      </div>
                                  </div>

                                  <div class="col-8 pt-4 text-center">
                                    <button type="submit" class="crear-consulta btn-hover color-5">
                                      <i class="fa fa-save"></i> Guardar
                                    </button>
                                  </div>
                                  
                                </div>


                                <!-- <div class="d-flex justify-content-center">
                                  <div class="py-3">
                                    <button id="limpiar" class="btn-hover color-11">
                                        <i class="fas fa-eraser"></i> Limpiar
                                    </button>
                                  </div>
                                  <div class="ml-auto py-3">
                                    <button type="submit" class="crear-consulta btn-hover color-5">
                                      <i class="fa fa-save"></i> Guardar
                                    </button>
                                  </div>
                                </div> -->

                            </div>
                        </div>
                        </form>
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




<!-- <script languague="javascript">
        function mostrar() 
        {
            section = document.getElementById('observacion');
            section.style.display = '';
        }
</script> -->


<script src="../asset/js/consulta.js"></script>


<script languague="javascript">
    function mostrar() 
    {
      div = document.getElementById('detalle');
      div.style.display = '';
    }
</script>