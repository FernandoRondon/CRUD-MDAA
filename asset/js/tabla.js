$(document).ready(function () {
  listar_codigo();
  var datatable;
  var funcion;

  function listar_codigo() {
    funcion = "listar";
    datatable = $('#tabla_codigo').DataTable({
        "ajax": {
            "url": "../controller/tablaController.php",
            "method": "POST",
            "data": { funcion: funcion }
        },
        "columns": [
            { "data": "tipo_categoria" },
            { "data": "categoria" },
            { "data": "codigo" },
            { "data": "nombre" },
            { "data": "descripcion" },
        ],
        "destroy": true,
        "language": espanol
    });
  }

  // function buscar_datos(consulta) {
  //   funcion = 'buscar';
  //   $.post('controller/tablaController.php',{ consulta, funcion },response => {
  //       const datos = JSON.parse(response);
  //       let template = '';
  //       datos.forEach(datos => {
  //         template += `
  //           <tr>
  //             <th class="text-center texto-normal">${datos.numeracion}</th>
  //             <th class="text-center texto-normal">${datos.idCategoria} | ${datos.codigo}</th>
  //             <th class="texto-normal">${datos.descripcion}</th>
  //           </tr>
  //         `;
  //       });
  //       $('#datos').html(template);
  //     }
  //   );
  // }

  // $(document).on('keyup', '#buscar_tabla', function () {
  //   let valor = $(this).val();
  //   if (valor != '') {
  //     buscar_datos(valor);
  //   } else {
  //     buscar_datos();
  //   }
  // });

  // $(document).on('change', '#listar',function(){
        
  // });

});

let espanol = {
  "sProcessing": "Procesando...",
  "sLengthMenu": "Mostrar _MENU_ registros",
  "sZeroRecords": "No se encontraron resultados",
  "sEmptyTable": "Ningún dato disponible en esta tabla",
  "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix": "",
  "sSearch": "Buscar:",
  "sUrl": "",
  "sInfoThousands": ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "Siguiente",
      "sPrevious": "Anterior"
  },
  "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  },
  "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad"
  }
};