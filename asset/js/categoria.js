$(document).ready(function(){
  buscar_categoria();
  var funcion;

  $('#form-crear-categoria').submit(e=>{
      let nombre_categoria = $('#nombre-categoria').val();
      funcion='crear';

      $.post('../controller/categoriaController.php',{nombre_categoria,funcion},(response)=>{
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

  // $('#form-editar-categoria').submit(e=>{
  //     let nombre_categoria = $('#mtxtcategoria').val();
  //     let id_editado = $('#id_editar_cat').val();
  //     funcion='editar';
  //     $.post('../controlador/categoriaController.php',{nombre_categoria,id_editado,funcion},(response)=>{
  //         if(response=='edit'){
  //             $('#edit-categorias').hide('slow');
  //             $('#edit-categorias').show(1000);
  //             $('#edit-categorias').hide(2000,cerrarmodal4);
  //             $('#form-editar-categoria').trigger('hold');
  //             buscar_categoria();
  //         }
  //     });
  //     e.preventDefault();
  // });

  function cerrarmodal3(){
      $('#mbtncerrarmodal3').click();
  }
  // function cerrarmodal4(){
  //     $('#mbtncerrarmodal4').click();
  // }

  function buscar_categoria(consulta){
      funcion='buscar';
      $.post('../controller/categoriaController.php',{consulta,funcion},(response)=>{
          const categorias = JSON.parse(response);
          let template='';
          categorias.forEach(categoria => {
              template+=`
                  <tr catId="${categoria.id}" catNombre="${categoria.nombre}">
                      <td>
                          <button class="editar-cat btn btn-success" title="Editar categoria" type="button" data-toggle="modal" data-target="#editarcategoria">
                              <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button class="borrar-cat btn btn-danger" title="Borrar categoria">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </td>
                      <td>${categoria.nombre}</td>
                  </tr>
              `;
          });
          $('#categorias').html(template);
      })
  }

  $(document).on('keyup','#buscar-categoria',function(){
      let valor = $(this).val();
      if(valor!=''){
          buscar_categoria(valor);
      }
      else{
          buscar_categoria();
      }
  })
  
  // $(document).on('click','.borrar-tip',(e)=>{
  //     funcion="borrar";
  //     const elemento = $(this)[0].activeElement.parentElement.parentElement;
  //     const id = $(elemento).attr('tipId');
  //     const nombre= $(elemento).attr('tipNombre');

  //     const swalWithBootstrapButtons = Swal.mixin({
  //         customClass: {
  //           confirmButton: 'btn btn-success',
  //           cancelButton: 'btn btn-danger mr-1'
  //         },
  //         buttonsStyling: false
  //       })
        
  //       swalWithBootstrapButtons.fire({
  //         title: '¿Desea eliminar '+nombre+'?',
  //         text: "No podras revertir esto!",
  //         icon: 'warning',
  //         showCancelButton: true,
  //         confirmButtonText: 'Sí, borra esto!',
  //         cancelButtonText: 'No, cancelar!',
  //         reverseButtons: true
  //       }).then((result) => {
  //         if (result.value) {
  //             $.post('../controlador/TipoController.php',{id,funcion},(response)=>{
  //                 edit==false;
  //                 if(response=='borrado'){
  //                     swalWithBootstrapButtons.fire(
  //                         'Borrado!',
  //                         'La familia '+nombre+' fue borrado.',
  //                         'success'
  //                     )
  //                     buscar_tip();
  //                 }
  //                 else{
  //                     swalWithBootstrapButtons.fire(
  //                         'No se pudo borrar!',
  //                         'La familia '+nombre+' no fue borrado porque esta siendo usado en un producto.',
  //                         'error'
  //                     )
  //                 }
  //             })
  //         } else if (result.dismiss === Swal.DismissReason.cancel) {
  //           swalWithBootstrapButtons.fire(
  //             'Cancelado',
  //             'La familia '+nombre+' no fue borrado',
  //             'error'
  //           )
  //         }
  //       })
  // })


  // $(document).on('click','.editar-tip',(e)=>{
  //     const elemento = $(this)[0].activeElement.parentElement.parentElement;
  //     const id = $(elemento).attr('tipId');
  //     const nombre= $(elemento).attr('tipNombre');
  //     $('#id_editar_tip').val(id);
  //     $('#mtxttipo').val(nombre);
  // });

});