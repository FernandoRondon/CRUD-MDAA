<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    session_start();
    if($_SESSION['id_tip_user']==1||$_SESSION['id_tip_user']==3){
  ?>
  <?php include_once 'layout/keywords.php';?>

  <title>Gestión Usuario</title>
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
            <h1>Gestión Usuario <button id="button-crear"type="button" data-toggle="modal" data-target="#crearusuario"class="btn bg-gradient-primary ml-2">Crear usuario</button></h1>
            <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['id_tip_user']?>">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar usuario</h3>
                    <div class="input-group">
                        <input type="text" id="buscar"class="form-control float-left" placeholder="Ingrese nombre de usuario">
                        <div class="input-group-append">
                            <button class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div id="usuarios" class="row d-flex align-items-stretch">
                  
                  </div>
                </div>
                <div class="card-footer">
                
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  

<!-- Button trigger modal -->
<!-- <div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Accion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <img id="avatar3"src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
        </div>
        <div class="text-center">
            <b>
                <?php
                    // echo $_SESSION['nombre'];
                ?>
            </b>
        </div>
        <span>Necesitamos su contraseña para continuar</span>
        <form id="form-confirmar">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                </div>
                <input id="oldpass"type="password" class="form-control" placeholder="Ingrese la contraseña actual">
                <input type="hidden" id="id_user">
                <input type="hidden" id="funcion">
            </div>
      </div>
      <div class="alert alert-success text-center" id="confirmado" style='display:none;'>
            <span><i class="fas fa-check m-1"></i>Se modifico al usuario</span>
        </div>
        <div class="alert alert-danger text-center" id="rechazado" style='display:none;'>
            <span><i class="fas fa-times m-1"></i>La contraseña no es correcta</span>
        </div>
      <div class="modal-footer">
        <button type="button" id= "mb3tncerrarmodal" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

<!-- MODAL PARA CREAR USUARIO -->
<div class="modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear Usuario</h3>
                <button data-dismiss="modal" aria-label="close"class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form id="form-crear">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input id="nombre"type="text" class="form-control" placeholder="Ingrese nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido"type="text" class="form-control" placeholder="Ingrese apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Nacimiento</label>
                        <input id="edad"type="date" class="form-control" placeholder="Ingrese nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input id="dni"type="number" class="form-control" placeholder="Ingrese DNI" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <input id="sexo"type="text" class="form-control" placeholder="Ingrese sexo" required>
                    </div> -->
                    <div class="form-group">
                        <label for="residencia">Residencia</label>
                        <input id="residencia"type="text" class="form-control" placeholder="Ingrese dirección" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono"type="number" class="form-control" placeholder="Ingrese teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input id="correo"type="email" class="form-control" placeholder="Ingrese correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input id="pass"type="password" class="form-control" placeholder="Ingrese contraseña" required>
                    </div>
            </div>
            <div class="alert alert-success text-center" id="add" style='display:none;'>
                <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
            </div>
            <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
                <span><i class="fas fa-times m-1"></i>El correo electrónico o el DNI ya existe en otro usuario</span>
            </div>
            <div class="card-footer">
                <button type="submit"class="btn bg-gradient-primary float-right m-1">Guardar</button>
                <button type="button" id= "mb2tncerrarmodal" data-dismiss="modal"class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card-success">
            <div class="card-header">
                <h3 class="card-title">Editar Usuario</h3>
                <button data-dismiss="modal" aria-label="close"class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form id="form-editar">
                    <input type="hidden" id="id_editar_usu">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input id="mtxtnombre"type="text" class="form-control" placeholder="Ingrese nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input id="mtxtapellido"type="text" class="form-control" placeholder="Ingrese apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="residencia">Residencia</label>
                        <input id="mtxtresidencia"type="text" class="form-control" placeholder="Ingrese dirección" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="mtxttelefono"type="number" class="form-control" placeholder="Ingrese teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input id="mtxtcontrasena" type="text"  class="form-control" placeholder="Ingrese nueva contraseña" required>
                    </div>      
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="mtxtestado" id="mtxtestado" class="form-control select2" style="width: 100%"></select>
                    </div>       
            </div>
            <div class="alert alert-success text-center" id="edit-usus" style='display:none;'>
                <span><i class="fas fa-check m-1"></i>Se modifico correctamente</span>
            </div>
            <div class="card-footer">
                <button type="submit"class="btn bg-gradient-primary float-right m-1">Guardar</button>
                <button type="button" id= "mbtncerrarmodal" data-dismiss="modal"class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>




  <?php include_once 'layout/footer.php';
  }
  else{
      header('Location: ../index.php');
  }
  ?>

</body>
</html>
<!-- <script src="../asset/js/categoria.js"></script> -->
<script src="../asset/js/usuario.js"></script>
