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
        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4 py-3">Consulta</h2>
                
                    <div class="card-default bg-white">
                        <form action="">
                            <div class="row">
                                <div class="col-md-10 offset-md-1 py-3 px-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Usuario:</label>
                                                <input type="text" class="form-control" value="Diego Pari Viña" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-4">
                                            <div class="form-group">
                                                <label>Clave:</label>
                                                <select class="select2" style="width: 100%;">
                                                </select>
                                            </div>
                                        </div> -->
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Categoria:</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option>ROMEO</option>
                                                    <!-- <option>Date</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Código:</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option>03</option>
                                                    <!-- <option>Date</option> -->
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Descripción:</label>
                                                <input type="text" class="form-control" value="Inspector General" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Fecha y hora:</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Observación:</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2 d-flex justify-content-center">
                                        <button type="button" class="btn-hover color-11">
                                            <i class="fas fa-trash-alt"></i> Limpiar
                                        </button>
                                        <button type="button" class="btn-hover color-5">
                                            <i class="fa fa-save"></i> Guardar
                                        </button>
                                    </div>

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

<!-- <script>
    $(function()){
        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    }

</script> -->






<style>
/* buttons */

* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.buttons {
  margin: 10%;
  text-align: center;
}

.btn-hover {
  width: 120px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  margin: 20px;
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
    #3cba92,
    #30dd8a,
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
    #f15e64,
    #e14e53,
    #e2373f
  );
  /* box-shadow: 0 5px 15px rgba(242, 97, 103, 0.4); */
}
</style>