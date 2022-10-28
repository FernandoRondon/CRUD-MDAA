$(document).ready(function() {
  listar_consultas();
  var datatable;

  function listar_consultas() {
      funcion = "listar";

      $.post('../controller/historialController.php', { funcion }, (response) => {
          // console.log(response);
          let datos = JSON.parse(response);
          datatable = $('#historial').DataTable({
          data: datos,
          "columns": [
              { "data": "numeracion" },
              { "data": "usuario" },
              { "data": "fecha" },
              { "data": "categoria" },
              { "data": "codigo" },
              { "data": "observacion" }
          ],
          "destroy": true,
          "language": espanol
      });
    })

  }

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
  }
});