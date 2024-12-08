$(document).ready(function() {
    $('#ponente').select2({
        placeholder: "Escriba el nombre del ponente",
        allowClear: true,
        language: "es",  // Cambia el idioma a español
        ajax: {
            url: "{{ route('ponentes.list') }}", // Ruta para obtener los ponentes
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data.map(function (ponent) {
                        return {
                            id: ponent.id_ponente,
                            text: ponent.nombres
                        };
                    })
                };
            }
        }
    });
});
