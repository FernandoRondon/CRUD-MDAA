$(document).ready(function(){
  var funcion;
  $('.select2').select2();
//   rellenar_categorias();
  rellenar_codigos();


//   function rellenar_categorias() {
//     funcion = "rellenar_categorias";
//     $.post('../controller/consultaController.php', { funcion }, (response) => {

//         const categorias = JSON.parse(response);
//         let template = '';
//         categorias.forEach(categoria => {
//             template += `
//                 <option value="${categoria.id}">${categoria.nombre}</option>
//             `;
//         });
        
//         $('#categoria').html(template);
//     })
//  }

 function rellenar_codigos() {
    funcion = "rellenar_codigos";
    $.post('../controller/consultaController.php', { funcion }, (response) => {
        const codigos = JSON.parse(response);
        let template = '';
        codigos.forEach(codigo => {
            template += `
                <option value="${codigo.id}">${codigo.nombre}</option>
            `;
        });
        $('#codigo').html(template);
        $('#codigo').prepend('<option selected="">Seleccionar código</option>');
    })
 }

// $("#categoria").change(function() {
//     let categoria=$('#categoria').val();
//     // console.log(categoria);
//     funcion = "rellenar_codigos";
//     $.post('../controller/consultaController.php', { funcion,categoria}, (response) => {
//         // console.log(response);
//         const codigos = JSON.parse(response);
//         let template = '';
//         codigos.forEach(codigo => {
//             template += `
//             <option value="${codigo.id}">${codigo.nombre}</option>
//             `;
//         });
        
//         $('#codigo').html(template);
//     })
// });

$("#codigo").change(function() {
    let codigo=$('#codigo').val();
    // console.log(codigo);
    funcion = "rellenar_categorias";
    $.post('../controller/consultaController.php', { funcion,codigo}, (response) => {
        console.log(response);
        const categorias = JSON.parse(response);
        let template = '';
        categorias.forEach(categoria => {
            template += `
            <option value="${categoria.id}">${categoria.nombre}</option>
            `;
        });
        
        $('#categoria').html(template);
    })
});


$('#form-crear-consulta').submit(e => {
    let usuario = $('#usuario').val();
    let fecha_hora = $('#fecha_hora').val();
    let categoria = $('#categoria').val();
    let codigo = $('#codigo').val();
    let observacion = $('#observacion').val();

    funcion = "crear";
    
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger mr-1'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '¿Estas seguro?',
        text: "Verifica tu consulta antes de aceptar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, hacer la consulta!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
            $.post('../controller/consultaController.php', { funcion, usuario, fecha_hora, categoria, codigo, observacion}, (response) => {
            console.log(response);
       
            if(response=='add'){
                swalWithBootstrapButtons.fire(
                    'Guardada!',
                    'La consulta fue guardada.',
                    'success'
                )
                // buscar_categoria();
                setTimeout(refrescar, 1000);
                // location.reload();
            }
            else{
                swalWithBootstrapButtons.fire(
                    'No se pudo guardar',
                    'La consulta no logro guardarse',
                    'error'
                )
            }
        })
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'La consulta no fue guardada',
            'error'
            )
        }
    });
    
    e.preventDefault();
    
});

    function refrescar(){
    //Actualiza la página
    location.reload();
  }

// $('#limpiar').click(function() {
//     $('#categoria').val('0');
//     $('#codigo').val('');
//     $('#observacion').val('');
//   });


});

