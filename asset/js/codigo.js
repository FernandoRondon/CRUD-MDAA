$(document).ready(function(){
  var funcion;
  $('.select2').select2();
  buscar_codigo();
  rellenar_categorias();

  function rellenar_categorias() {
    funcion = "rellenar_categorias";
    $.post('../controller/codigoController.php', { funcion }, (response) => {
        const categorias = JSON.parse(response);
        let template = '';
        categorias.forEach(codigo => {
            template += `
                <option value="${codigo.id}">${codigo.nombre}</option>
            `;
        });
        $('#categoria_num').html(template);;
    })
 }

 $('#form-crear-codigo').submit(e=>{
    let categoria = $('#categoria_num').val();
    let num_codigo = $('#num_codigo').val();
    let nombre_codigo = $('#nombre_codigo').val();
    funcion='crear';
    // console.log(categoria,num_codigo,nombre_codigo);
    $.post('../controller/codigoController.php',{categoria,num_codigo,nombre_codigo,funcion},(response)=>{
        console.log(response);
        if(response=='add'){
            $('#add-codigo').hide('slow');
            $('#add-codigo').show(1000);
            $('#add-codigo').hide(2000,cerrarmodal5);
            $('#form-crear-codigo').trigger('reset');
            buscar_codigo();
        }
        if(response=='noadd'){
            $('#noadd-codigo').hide('slow');
            $('#noadd-codigo').show(1000);
            $('#noadd-codigo').hide(2000);
            $('#form-crear-codigo').trigger('hold');
        }
    });
    e.preventDefault();
});

function cerrarmodal5(){
    $('#mbtncerrarmodal5').click();
}


$('#form-editar-codigo').submit(e=>{
    let num_codigo = $('#mtxtcodigo').val();
    let des_codigo = $('#mtxtdes').val();
    let id_editado = $('#id_editar_code').val();
    funcion='editar';
    $.post('../controller/codigoController.php',{num_codigo,des_codigo,id_editado,funcion},(response)=>{
        if(response=='edit'){
            $('#edit-codigos').hide('slow');
            $('#edit-codigos').show(1000);
            $('#edit-codigos').hide(2000,cerrarmodal4);
            $('#form-editar-codigo').trigger('hold');
            buscar_codigo();
        }
        else
        {
            $('#noedit-codigo').hide('slow');
            $('#noedit-codigo').show(1000);
            $('#noedit-codigo').hide(2000);
            $('#form-editar-codigo').trigger('hold');
        }
    });
    e.preventDefault();
});

function cerrarmodal4(){
    $('#mbtncerrarmodal4').click();
}

$(document).on('click','.borrar-code',(e)=>{
    funcion="borrar";
    const elemento = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(elemento).attr('codeId');
    const num= $(elemento).attr('codeCodigo');
    const nombre= $(elemento).attr('codeNombre');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger mr-1'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '¿Desea eliminar código '+num+' | '+nombre+'?',
        text: "No podras revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, borra esto!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
            $.post('../controller/codigoController.php',{id,funcion},(response)=>{
                // console.log(response);
              //   edit==false;
                if(response=='borrado'){
                    swalWithBootstrapButtons.fire(
                        'Borrado!',
                        'El código '+num+' | '+nombre+' fue borrado.',
                        'success'
                    )
                    buscar_categoria();
                }
                else{
                    swalWithBootstrapButtons.fire(
                        'No se pudo borrar!',
                        'El código '+num+' | '+nombre+' no fue borrado porque esta siendo usado en un código.',
                        'error'
                    )
                }
            })
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            'Cancelado',
            'El código '+num+' | '+nombre+' no fue borrado',
            'error'
          )
        }
      })
})


  function buscar_codigo(consulta){
    funcion='buscar';
    $.post('../controller/codigoController.php',{consulta,funcion},(response)=>{
        const codigos = JSON.parse(response);
        let template='';
        codigos.forEach(codigo => {
        
            template+=`
                <tr codeId="${codigo.id}" codeCodigo="${codigo.codigo}" codeNombre="${codigo.nombre}">
                    <td>
                        <button class="editar-code btn btn-success" title="Editar codigo" type="button" data-toggle="modal" data-target="#editarcodigo">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="borrar-code btn btn-danger" title="Borrar codigo">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    <td>${codigo.codigo}</td>
                    <td>${codigo.nombre}</td>
                </tr>
            `;
        });
        $('#codigos').html(template);
    })
  }

  $(document).on('keyup','#buscar-codigo',function(){
      let valor = $(this).val();
      if(valor!=''){
          buscar_codigo(valor);
      }
      else{
          buscar_codigo();
      }
  })


  $(document).on('click','.editar-code',(e)=>{
    const elemento = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(elemento).attr('codeId');
    const code = $(elemento).attr('codeCodigo');
    const nombre= $(elemento).attr('codeNombre');

    $('#id_editar_code').val(id);
    $('#mtxtcodigo').val(code);
    $('#mtxtdes').val(nombre);
  });


});