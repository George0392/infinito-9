
    // activar select2 para todos los selects
    $(document).ready(function() {

        $('select').select2();
        
// ################################################################################
       
        $('.dropify').dropify();

        // Translated
        $('.dropify-es').dropify({
            messages: 
                {
                 default: 'Click o Arrastre y suelte un archivo aquí',
                 replace: 'Reemplazar archivo',
                 remove:  'Quitar',
                 error:   'Lo siento, el archivo es demasiado grande.'
                }
            });
// ################################################################################


    });


