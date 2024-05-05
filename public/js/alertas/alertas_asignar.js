    // #################################################################
    // Asignar todos los permisos al rol
    // #################################################################

    function Todos_Permisos() {

        Swal.fire({
            title: 'Esta seguro de Asignar Todos los Permisos? ',
            text: "Esta accion no se puede corregir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Asignar!',
            cancelButtonText: 'Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('permisos');
                Swal.close();
            }
        });
    }
    // #################################################################
    // Fin Asignar
    // #################################################################

    // #################################################################
    // Eliminar todos los permisos al rol
    // #################################################################

    function Eliminar_Permisos() {

        Swal.fire({
            title: 'Esta seguro de Eliminar todos los permisos? ',
            text: "Esta accion no se puede corregir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('quitar');
                Swal.close();
            }
        });
    }
    // #################################################################
    // Fin Eliminar
    // #################################################################

    //activar buscardor select2
    // $(document).ready(function() { $("#select").select2(); });

    $(function () {
  Livewire.restart();
    $('select').selectpicker();
});
