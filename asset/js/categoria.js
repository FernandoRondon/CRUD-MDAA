$(document).ready(function(){
var funcion;
$('.select2').select2();
buscar_categoria();

  $('#form-crear-categoria').submit(e=>{
      let code_categoria = $('#codigo_categoria').val();
      let nombre_categoria = $('#nombre_categoria').val();
      funcion='crear';

      $.post('../controller/categoriaController.php',{code_categoria,nombre_categoria,funcion},(response)=>{
          if(response=='add'){
              $('#add-categoria').hide('slow');
              $('#add-categoria').show(1000);
              $('#add-categoria').hide(2000,cerrarmodal3);
              $('#form-crear-categoria').trigger('reset');
              buscar_categoria();
          }
          if(response=='noadd'){
              $('#noadd-categoria').hide('slow');
              $('#noadd-categoria').show(1000);
              $('#noadd-categoria').hide(2000);
              $('#form-crear-categoria').trigger('hold');
          }
      });
      e.preventDefault();
  });

  function cerrarmodal3(){
    $('#mbtncerrarmodal3').click();
}

  $('#form-editar-categoria').submit(e=>{
      let code_categoria = $('#mtxtcategoria_codigo').val();
      let nombre_categoria = $('#mtxtcategoria').val();
      let id_editado = $('#id_editar_cat').val();
      funcion='editar';
      $.post('../controller/categoriaController.php',{code_categoria, nombre_categoria,id_editado,funcion},(response)=>{
          if(response=='edit'){
              $('#edit-categorias').hide('slow');
              $('#edit-categorias').show(1000);
              $('#edit-categorias').hide(2000,cerrarmodal4);
              $('#form-editar-categoria').trigger('hold');
              buscar_categoria();
          }
          else
          {
            $('#noedit-categoria').hide('slow');
            $('#noedit-categoria').show(1000);
            $('#noedit-categoria').hide(2000);
            $('#form-editar-categoria').trigger('hold');
          }
      });
      e.preventDefault();
  });


  function cerrarmodal4(){
      $('#mbtncerrarmodal4').click();
  }

  function buscar_categoria(consulta){
      funcion='buscar';
      $.post('../controller/categoriaController.php',{consulta,funcion},(response)=>{
          const categorias = JSON.parse(response);
          let template='';
          categorias.forEach(categoria => {
              template+=`
                  <tr catId="${categoria.id}" catNombre="${categoria.nombre}" catCodigo="${categoria.codigo}">
                      <td>
                          <button class="editar-cat btn btn-success" title="Editar categoria" type="button" data-toggle="modal" data-target="#editarcategoria">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button class="borrar-cat btn btn-danger" title="Borrar categoria">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </td>
                      <td>${categoria.codigo}</td>
                      <td>${categoria.nombre}</td>
                  </tr>
              `;
          });
          $('#categorias').html(template);
      })
  }

  $(document).on('keyup','#buscar-categoria',function(){
      let valor = $(this).val();
      if(valor!=""){
          buscar_categoria(valor);
      }
      else{
          buscar_categoria();
      }
  })
  
  $(document).on('click','.borrar-cat',(e)=>{
      funcion="borrar";
      const elemento = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(elemento).attr('catId');
      const nombre= $(elemento).attr('catNombre');

      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-1'
          },
          buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
          title: '¿Desea eliminar '+nombre+'?',
          text: "No podras revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, borra esto!',
          cancelButtonText: 'No, cancelar!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
              $.post('../controller/categoriaController.php',{id,funcion},(response)=>{
                  console.log(response);
                //   edit==false;
                  if(response=='borrado'){
                      swalWithBootstrapButtons.fire(
                          'Borrado!',
                          'La categoria '+nombre+' fue borrado.',
                          'success'
                      )
                      buscar_categoria();
                  }
                  else{
                      swalWithBootstrapButtons.fire(
                          'No se pudo borrar!',
                          'La categoria '+nombre+' no fue borrado porque esta siendo usado en un código.',
                          'error'
                      )
                  }
              })
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
              'Cancelado',
              'La categoria '+nombre+' no fue borrado',
              'error'
            )
          }
        })
  })


  $(document).on('click','.editar-cat',(e)=>{
      const elemento = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(elemento).attr('catId');
      const codigo = $(elemento).attr('catCodigo');
      const nombre= $(elemento).attr('catNombre');

      $('#id_editar_cat').val(id);
      $('#mtxtcategoria_codigo').val(codigo);
      $('#mtxtcategoria').val(nombre);
  });

});