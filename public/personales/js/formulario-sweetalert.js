// #################################################################################
//                           Nuevo
// #################################################################################

// detener envio del formulario eliminar

$('.formulario-crear').submit(function(e){

      e.preventDefault();

      // enviar trigger sweet alert

      Swal.fire({
      title: 'Esta seguro de Guardar?',
      text: "Los registros se almacenan en la Base de Datos!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Guardar!',
      cancelButtonText: 'Cancelar!'
      }).then((result) => {
      if (result.isConfirmed) {

      this.submit()
      }
  })
});

// #################################################################################
//                           fin Nuevo
// #################################################################################


// #################################################################################
//                           Editar
// #################################################################################

// detener envio del formulario eliminar

$('.formulario-editar').submit(function(e){

      e.preventDefault();

      // enviar trigger sweet alert

      Swal.fire({
      title: 'Esta seguro de Modificar?',
      text: "La accion no se puede revertir!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Actualizar!',
      cancelButtonText: 'Cancelar!'
      }).then((result) => {
      if (result.isConfirmed) {

      this.submit()
      }
  })
});
// #################################################################################
//                           fin Editar
// #################################################################################



// #################################################################################
//                           Eliminar
// #################################################################################

// detener envio del formulario eliminar

$('.formulario-eliminar').submit(function(e){

      e.preventDefault();

      // enviar trigger sweet alert

      Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "La accion no se puede revertir!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar!',
      cancelButtonText: 'Cancelar!'
      }).then((result) => {
      if (result.isConfirmed) {

      this.submit()
      }
  })
});
// #################################################################################
//                           fin Eliminar
// #################################################################################

