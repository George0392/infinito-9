document.addEventListener('DOMContentLoaded', function()
{

// cargar select bootstrap
  // $('select').selectpicker();

  //  Livewire.hook('element.updating', (fromEl, toEl, component) => {
  //       // console.log('being update');
  //       $('select').selectpicker('destroy'); })

  //       Livewire.hook('message.processed', (message, component) => {
  //         // console.log('processed');
  //         $('select').selectpicker();
  //   })

// fin cargar select bootstrap

// **************************************************************************************


// cargar modal al abrir la pagina y ayudar al desarrollo

    // $('#Modal_obd2').modal('toggle');



// **************************************************************************************


// colocar focus en el nombre al cargar el modal

$('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});

// **************************************************************************************

// avisos emergentes


window.livewire.on('alert', param => {
        toastr[param['type']](param['message']);
    });

// **************************************************************************************



// #################################################################
// ELIMINAR
// #################################################################

Livewire.on('borrar', client_Id => {

  var componente = 'obd2.obd2-component';

Swal.fire({
  title: 'Esta seguro de Eliminar? ',
  text: "Esta accion no se puede corregir!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {

    Livewire.emitTo(componente, 'eliminar' , client_Id);

    // Swal.fire(
    //   'Eliminado!',
    //   'El registro se a eliminado Exitosamente.',
    //   'success'
    // )
    Swal.close();
  }
})

})

// #################################################################
// Guardar
// #################################################################

Livewire.on('crear', client_Id => {

  var componente = 'obd2.obd2-component';

Swal.fire({
  title: 'Esta seguro de Guardar? ',
  text: "Esta accion no se puede corregir!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Guardar!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {

    Livewire.emitTo(componente, 'guardar' , client_Id);

    // Swal.fire(
    //   'Creado!',
    //   'El registro se a creado Exitosamente.',
    //   'success'
    // )
    Swal.close();

  }

})

})


// #################################################################
// Actualizar
// #################################################################

Livewire.on('modificar', client_Id => {

  var componente = 'obd2.obd2-component';

Swal.fire({
  title: 'Esta seguro de Actualizar? ',
  text: "Esta accion no se puede corregir!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Actualizar!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {

    Livewire.emitTo(componente, 'actualizar' , client_Id);

    // Swal.fire(
    //   'Actualizar!',
    //   'El registro se a Actualizado Exitosamente.',
    //   'success'
    // )
    Swal.close();
  }
})

})
})