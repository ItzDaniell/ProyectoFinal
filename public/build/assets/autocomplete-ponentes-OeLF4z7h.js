$(document).ready(function(){$("#ponente").select2({placeholder:"Escriba el nombre del ponente",allowClear:!0,language:"es",ajax:{url:"{{ route('ponentes.list') }}",dataType:"json",processResults:function(n){return{results:n.map(function(e){return{id:e.id_ponente,text:e.nombres}})}}}})});