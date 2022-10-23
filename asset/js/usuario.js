$(document).ready(function(){
  var tipo_usuario = $('#tipo_usuario').val();
  if(tipo_usuario==2){
    $('#button-crear').hide();
  }
  var funcion;
  $('.select2').select2();
  buscar_datos();
  rellenar_estados();
  

  function rellenar_estados() {
    funcion = "rellenar_estados";
    $.post('../controller/usuarioController.php', { funcion }, (response) => {
        const estados = JSON.parse(response);
        let template = '';
        estados.forEach(estado => {
            template += `
                <option value="${estado.id}">${estado.nombre}</option>
            `;
        });
        $('#mtxtestado').html(template);
    })
 }

  function buscar_datos(consulta) {
      funcion='buscar_usuarios_adm';
      $.post('../controller/usuarioController.php',{consulta,funcion},(response)=>{
          const usuarios = JSON.parse(response);
          let template='';
          usuarios.forEach(usuario=>{
              template+=`
              <div usuarioId="${usuario.id}"usuNombre="${usuario.nombre}"usuApellido="${usuario.apellidos}"usuResidencia="${usuario.residencia}"usuTelefono="${usuario.telefono}"usuContrasena="${usuario.contrasena}"usuEstado="${usuario.estado_id}"class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">`;
            if(usuario.tipo_usuario==3){
              template+=`<h1 class="badge badge-warning">${usuario.tipo}</h1>`;
            }
            if(usuario.tipo_usuario==1){
              template+=`<h1 class="badge badge-warning">${usuario.tipo}</h1>`;
            }
            if(usuario.tipo_usuario==2){
              template+=`<h1 class="badge badge-info">${usuario.tipo}</h1>`;
            }
            template+=`</div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b>${usuario.nombre} ${usuario.apellidos}</b></h2>`;
                    
                    if(usuario.tipo_usuario==2){
                    template+=`<p class="text-muted text-sm"><b>Estado: </b>${usuario.estado}</p>`;
                    }
                    template+=`
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> DNI: ${usuario.dni}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span> Edad: ${usuario.edad}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Residencia: ${usuario.residencia}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Teléfono #: ${usuario.telefono}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> Correo: ${usuario.correo}</li>

                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img src="${usuario.avatar}" alt="" class="img-circle img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">`;
              // if(tipo_usuario==1){
                // if(usuario.tipo_usuario!=1){
                //   template+=`
                //   <button class="borrar-usuario btn btn-danger mr-1"type="button" data-toggle="modal" data-target="#confirmar">
                //       <i class="fas fa-window-close mr-1"></i>Eliminar
                //   </button>
                //   `;
                // }
                if(usuario.tipo_usuario==2){
                  template+=`
                  <button class="editar-usu btn btn-success" type="button" data-toggle="modal" data-target="#editarusuario">
                      <i class="fas fa-pencil-alt"></i> Editar
                  </button>
                  `;
                }

              // }

              template+=`
                </div>
              </div>
            </div>
          </div>
              `;
          })
          $('#usuarios').html(template);
      });
  }


  $(document).on('keyup','#buscar',function(){
      let valor = $(this).val();
      if(valor!=""){
          buscar_datos(valor);
      }
      else{
          buscar_datos();
      }
  });

  $('#form-crear').submit(e=>{
    let nombre = $('#nombre').val();
    let apellido = $('#apellido').val();
    let edad = $('#edad').val();
    let dni = $('#dni').val();
    let residencia = $('#residencia').val();
    let telefono = $('#telefono').val();
    let correo = $('#correo').val();
    let pass = $('#pass').val();
    funcion='crear_usuario';
    $.post('../controller/usuarioController.php',{nombre,apellido,edad,dni,residencia,telefono,correo,pass,funcion},(response)=>{
      if(response=='add'){
        $('#add').hide('slow');
        $('#add').show(1000);
        $('#form-crear').trigger('reset');
        $('#add').hide(2000,cerrarmodal);
        
        buscar_datos();
      }
      else{
        $('#noadd').show(500);
        $('#noadd').hide(5500);
        $('#form-crear').trigger('hold');
      }
    });
    e.preventDefault();
  });

  $('#form-editar').submit(e=>{
    let id = $('#id_editar_usu').val();
    let nombre = $('#mtxtnombre').val();
    let apellido = $('#mtxtapellido').val();
    let residencia = $('#mtxtresidencia').val();
    let telefono = $('#mtxttelefono').val();
    let contrasena = $('#mtxtcontrasena').val();
    let estado = $('#mtxtestado').val();
    funcion='editar';
    $.post('../controller/usuarioController.php',{id,nombre,apellido,residencia,telefono,contrasena,estado,funcion},(response)=>{
      if (response == 'edit') {
        $('#edit-usus').hide('slow');
        $('#edit-usus').show(1000);
        $('#edit-usus').hide(2000,cerrarmodal2);
        $('#form-editar').trigger('hold');
        buscar_datos();
        
      }
      
    });
    e.preventDefault();
});

function cerrarmodal(){
  $('#mb2tncerrarmodal').click();
}
function cerrarmodal2(){
  $('#mbtncerrarmodal').click();
}

function cerrarmodal3(){
  $('#mb3tncerrarmodal').click();
}


  $(document).on('click','.editar-usu',(e)=>{
    const elemento= $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
    const id=$(elemento).attr('usuarioId');
    const nombre=$(elemento).attr('usuNombre');
    const apellido=$(elemento).attr('usuApellido');
    const residencia=$(elemento).attr('usuResidencia');
    const telefono=$(elemento).attr('usuTelefono');
    const contrasena=$(elemento).attr('usuContrasena');
    const estado= $(elemento).attr('usuEstado');
    $('#id_editar_usu').val(id);
    $('#mtxtnombre').val(nombre);
    $('#mtxtapellido').val(apellido);
    $('#mtxtresidencia').val(residencia);
    $('#mtxttelefono').val(telefono);
    $('#mtxtcontrasena').val(contrasena);
    $('#mtxtestado').val(estado).trigger('change');
  });

//   $(document).on('click','.borrar-usuario',(e)=>{
//     const elemento= $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
//     const id=$(elemento).attr('usuarioId');
//     funcion='borrar_usuario';
//     $('#id_user').val(id);
//     $('#funcion').val(funcion);
//   });

  
//   $('#form-confirmar').submit(e=>{
//     let pass=$('#oldpass').val();
//     let id_usuario=$('#id_user').val();
//     funcion=$('#funcion').val();
//     $.post('../controlador/UsuarioController.php',{pass,id_usuario,funcion},(response)=>{
//       if(response=='ascendido'|| response=='descendido'|| response=='borrado'){
//         $('#confirmado').hide('slow');
//         $('#confirmado').show(1000);
//         $('#confirmado').hide(1000);
//         $('#confirmado').hide(1000,cerrarmodal3);
//         $('#form-confirmar').trigger('reset');
//       }
//       else{
//         $('#rechazado').hide('slow');
//         $('#rechazado').show(1000);
//         $('#rechazado').hide(2000);
//         $('#form-confirmar').trigger('reset');
//       }
//       buscar_datos();
//     });
//     e.preventDefault();

//   });
});