$(document).ready(function() {
  mostrar_consultas();

  function mostrar_consultas() {
    let funcion = 'mostrar';
    $.post('../controller/historialController.php', { funcion }, (response) => {
        console.log(response);
        const cantidad = JSON.parse(response);
        $('#cantidad_categoria').html((cantidad.cantidad_categoria));
        $('#cantidad_codigo').html((cantidad.cantidad_codigo));
        $('#cantidad_consulta').html((cantidad.cantidad_consulta));

    })
  }

});
