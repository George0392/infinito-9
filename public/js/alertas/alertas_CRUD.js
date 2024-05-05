    // #################################################################
    // Crear
    // #################################################################

    function Crear() {

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
                window.livewire.emit('crear');
                Swal.close();
            }
        });
    }
    // #################################################################
    // Fin Crear
    // #################################################################

    // #################################################################
    // Editar
    // #################################################################

    function Modificar() {

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
                window.livewire.emit('modificar');
                Swal.close();
            }
        });
    }
    // #################################################################
    // Fin Editar
    // #################################################################

    // #################################################################
    // Eliminar
    // #################################################################

    function Borrar(id) {

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
                window.livewire.emit('borrar', id);
                Swal.close();
            }
        });
    }
    // #################################################################
    // Fin Eliminar
    // #################################################################
