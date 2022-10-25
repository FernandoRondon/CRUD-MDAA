$(document).ready(function(){
  var funcion;
  $('.select2').select2();
  buscar_codigo();
  rellenar_codigos();

  function rellenar_codigos() {
    funcion = "rellenar_codigos";
    $.post('../controller/codigoController.php', { funcion }, (response) => {
        const codigos = JSON.parse(response);
        let template = '';
        codigos.forEach(codigo => {
            template += `
                <option value="${codigo.id}">${codigo.nombre}</option>
            `;
        });
        $('#codigo_num').html(template);
        // $('#mtxtcodigo').html(template);
    })
 }

 $('#form-crear-codigo').submit(e=>{
    let codigo = $('#codigo_num').val();
    let nombre_codigo = $('#nombre_codigo').val();
    funcion='crear';

    $.post('../controller/codigoController.php',{codigo,nombre_codigo,funcion},(response)=>{
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


  $(document).on('click','.editar-cod',(e)=>{
    const elemento = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(elemento).attr('catId');
    const nombre= $(elemento).attr('catNombre');

    $('#id_editar_cat').val(id);
    $('#mtxtcategoria').val(nombre);
});


});