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
                <h2 class="text-center display-4 py-3">Consulta</h2>
                
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

<style>
/* buttons */

* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.buttons {
  /* margin: 10%; */
  text-align: center;
}

.btn-hover {
  width: 120px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  /* margin: 20px; */
  height: 55px;
  text-align: center;
  border: none;
  background-size: 300% 100%;

  border-radius: 50px;
  moz-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}

.btn-hover:hover {
  background-position: 100% 0;
  moz-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}

.btn-hover:focus {
  outline: none;
}

.btn-hover.color-1 {
  background-image: linear-gradient(
    to right,
    #25aae1,
    #40e495,
    #30dd8a,
    #2bb673
  );
  /* box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75); */
}
.btn-hover.color-2 {
  background-image: linear-gradient(
    to right,
    #f5ce62,
    #e43603,
    #fa7199,
    #e85a19
  );
  /* box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75); */
}
.btn-hover.color-3 {
  background-image: linear-gradient(
    to right,
    #667eea,
    #764ba2,
    #6b8dd6,
    #8e37d7
  );
  /* box-shadow: 0 4px 15px 0 rgba(116, 79, 168, 0.75); */
}
.btn-hover.color-4 {
  background-image: linear-gradient(
    to right,
    #fc6076,
    #ff9a44,
    #ef9d43,
    #e75516
  );
  /* box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75); */
}
.btn-hover.color-5 {
  background-image: linear-gradient(
    to right,
    #0ba360,
    /* #3cba92, */
    /* #30dd8a, */
    #2bb673
  );
  /* box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75); */
}
.btn-hover.color-6 {
  background-image: linear-gradient(
    to right,
    #009245,
    #fcee21,
    #00a8c5,
    #d9e021
  );
  /* box-shadow: 0 4px 15px 0 rgba(83, 176, 57, 0.75); */
}
.btn-hover.color-7 {
  background-image: linear-gradient(
    to right,
    #6253e1,
    #852d91,
    #a3a1ff,
    #f24645
  );
  /* box-shadow: 0 4px 15px 0 rgba(126, 52, 161, 0.75); */
}
.btn-hover.color-8 {
  background-image: linear-gradient(
    to right,
    #29323c,
    #485563,
    #2b5876,
    #4e4376
  );
  /* box-shadow: 0 4px 15px 0 rgba(45, 54, 65, 0.75); */
}
.btn-hover.color-9 {
  background-image: linear-gradient(
    to right,
    #25aae1,
    #4481eb,
    #04befe,
    #3f86ed
  );
  /* box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75); */
}
.btn-hover.color-10 {
  background-image: linear-gradient(
    to right,
    #ed6ea0,
    #ec8c69,
    #f7186a,
    #fbb03b
  );
  /* box-shadow: 0 4px 15px 0 rgba(236, 116, 149, 0.75); */
}
.btn-hover.color-11 {
  background-image: linear-gradient(
    to right,
    #eb3941,
    /* #f15e64, */
    #e14e53,
    #e2373f
  );
  /* box-shadow: 0 5px 15px rgba(242, 97, 103, 0.4); */
}
</style>