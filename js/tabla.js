$(document).ready(function () {
  buscar_datos();
  var funcion;

  function buscar_datos(consulta) {
    funcion = 'buscar';
    $.post(
      'controller/tablaController.php',
      { consulta, funcion },
      response => {
        const datos = JSON.parse(response);
        let template = '';
        datos.forEach(datos => {
          template += `
            <tr>
              <th class="text-center texto-normal">${datos.numeracion}</th>
              <th class="text-center texto-normal">${datos.idCategoria} | ${datos.codigo}</th>
              <th class="texto-normal">${datos.descripcion}</th>
              <td>
                <button class="editar btn btn-info" title="Editar dato" type="button" data-toggle="modal" data-target="#editardato">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="borrar btn btn-danger" title="Borrar dato">
                    <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
          `;
        });
        $('#datos').html(template);
      }
    );
  }

  $(document).on('keyup', '#buscar_tabla', function () {
    let valor = $(this).val();
    if (valor != '') {
      buscar_datos(valor);
    } else {
      buscar_datos();
    }
  });

  $(document).on('change', '#listar',function(){
        
  });
});
