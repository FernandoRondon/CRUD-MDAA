$(document).ready(function(){
  buscar_codigo();
  var funcion;

  function buscar_codigo(consulta){
    funcion='buscar';
    $.post('../controller/codigoController.php',{consulta,funcion},(response)=>{
        const codigos = JSON.parse(response);
        let template='';
        codigos.forEach(codigo => {
            template+=`
                <tr codeId="${codigo.id}" codeNombre="${codigo.nombre}">
                    <td>
                        <button class="editar-code btn btn-success" title="Editar codigo" type="button" data-toggle="modal" data-target="#editarcodigo">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="borrar-code btn btn-danger" title="Borrar codigo">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
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

});