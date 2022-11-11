<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'layout/keywords.php';?>
    <?php
    session_start();
    if($_SESSION['id_tip_user']==1){
    ?>

    <title>Categoria</title>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include_once 'layout/nav.php';?>
    
    <!--CATEGORIA MODALES -->
    <div class="modal fade" id="crearcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <h3 class="card-title">Crear Categoria</h3>
                    <button data-dismiss="modal" aria-label="close"class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form id="form-crear-categoria">
                        <div class="form-group">
                            <label for="codigo_categoria">Código</label>
                            <input id="codigo_categoria"type="text" class="form-control" placeholder="Ingrese codigo de la categoria" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre_categoria">Nombre</label>
                            <input id="nombre_categoria"type="text" class="form-control" placeholder="Ingrese nombre de la categoria" required>
                        </div>                        
                          <!-- <input type="hidden" id="id_editar_cat"> -->
                </div>
                  <div class="alert alert-success text-center" id="add-categoria" style='display:none;'>
                    <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
                  </div>
                  <div class="alert alert-danger text-center" id="noadd-categoria" style='display:none;'>
                    <span><i class="fas fa-times m-1"></i>La categoria o código ya existe</span>
                  </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" id="mbtncerrarmodal3" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editarcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar Categoria</h3>
                    <button data-dismiss="modal" aria-label="close"class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form id="form-editar-categoria">
                    <input type="hidden" id="id_editar_cat">
                      <div class="form-group">
                        <label for="codigo_categoria">Código</label>
                        <input type="text" id="mtxtcategoria_codigo" class="form-control" placeholder="Ingrese código" required>
                      </div>
                      <div class="form-group">
                        <label for="nombre_categoria">Nombre</label>
                        <input type="text" id="mtxtcategoria" class="form-control" placeholder="Ingrese nombre" required>
                      </div>
                </div>
                    <div class="alert alert-success text-center" id="edit-categorias" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
                    </div>
                <div class="card-footer">
                    <button type="submit"class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" id="mbtncerrarmodal4" data-dismiss="modal"class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>




    <!--CREAR CODIGO  -->
    <div class="modal fade" id="crearcodigo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <h3 class="card-title">Crear Codigo</h3>
                    <button data-dismiss="modal" aria-label="close"class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form id="form-crear-codigo">
                      <div class="form-group">
                        <label for="categoria_num">Categoria</label>
                        <select name="categoria_num" id="categoria_num" class="form-control select2" style="width: 100%"></select>
                      </div>
                      <div class="form-group">
                        <label for="num_codigo">Código</label>
                        <input name="num_codigo" id="num_codigo"type="text" class="form-control" placeholder="Ingrese el código" required>
                      </div>
                      <div class="form-group">
                        <label for="nombre_codigo">Descripción</label>
                        <input id="nombre_codigo"type="text" class="form-control" placeholder="Ingrese descripción del código" required>
                        <!-- <input type="hidden" id="id_editar_code"> -->
                      </div>
                </div>
                  <div class="alert alert-success text-center" id="add-codigo" style='display:none;'>
                    <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
                  </div>
                  <div class="alert alert-danger text-center" id="noadd-codigo" style='display:none;'>
                    <span><i class="fas fa-times m-1"></i>El código ya existe</span>
                  </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" id="mbtncerrarmodal5" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editarcodigo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar codigo o descripción</h3>
                    <button data-dismiss="modal" aria-label="close"class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form id="form-editar-codigo">
                    <input type="hidden" id="id_editar_code">
                      <div class="form-group">
                        <label for="mtxtcodigo">Código</label>
                        <input type="text" id="mtxtcodigo" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="mtxtdes">Descripción</label>
                        <input type="text" id="mtxtdes" class="form-control" required>
                      </div>
                </div>
                    <div class="alert alert-success text-center" id="edit-codigos" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
                    </div>
                <div class="card-footer">
                    <button type="submit"class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" id="mbtncerrarmodal6" data-dismiss="modal"class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>


      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gestión Categoria</h1>
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
                                  <li class="nav-item"><a href="#codigo2" class="nav-link" data-toggle="tab">Código</a></li>
                              </ul>
                          </div>
                          <div class="card-body p-0">
                              <div class="tab-content">
                                  <div class="tab-pane active" id='categoria'>
                                      <div class="card-success">
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
                                            <table class="table table-hover text-nowrap">
                                              <thead class="table-success">
                                                <tr>
                                                  <th>Acción</th>
                                                  <th>Código categoria</th>
                                                  <th>Categoria</th>
                                                </tr>
                                              </thead>
                                              <tbody class="table-active" id="categorias">
                                              
                                              </tbody>
                                            </table>
                                          </div>
                                          <div class="card-footer">
                                          </div>
                                      </div>
                                  </div>

                                  
                                  <div class="tab-pane" id='codigo2'>
                                      <div class="card-success">
                                          <div class="card-header">
                                              <div class="card-title">Buscar código<button type="button" data-toggle="modal" data-target="#crearcodigo"class="btn bg-gradient-primary btn-sm m-2">Crear código</button></div>
                                                <div class="input-group">
                                                    <input id="buscar-codigo"type="text" class="form-control float-left" placeholder="Ingrese nombre">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                
                                              </div>
                                          </div>
                                          <div class="card-body p-0 table-responsive">
                                            <table class="table table-hover text-nowrap">
                                              <thead class="table-success">
                                                <tr>
                                                  <th>Acción</th>
                                                  <th>Código</th>
                                                  <th>Descripción</th>
                                                </tr>
                                              </thead>
                                              <tbody class="table-active" id="codigos">
                                              </tbody>
                                            </table>
                                          </div>
                                          <div class="card-footer"></div>
                                      </div>
                                  </div>



                              </div>
                          </div>
                          
                          <!-- <div class="card-footer">
                          
                          </div> -->
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

<script src="../asset/js/categoria.js"></script>
<script src="../asset/js/codigo.js"></script>
</body>
</html>
