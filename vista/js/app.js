let language = {
    "emptyTable":			"No hay datos disponibles en la tabla.",
    "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
    "infoEmpty":			"Mostrando 0 registros de un total de 0.",
    "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
    "infoPostFix":			"(actualizados)",
    "lengthMenu":			"Mostrar _MENU_ registros",
    "loadingRecords":		"Cargando...",
    "processing":			"Procesando...",
    "search":			"Buscar:",
    "searchPlaceholder":		"Dato para buscar",
    "zeroRecords":			"No se han encontrado coincidencias.",
    "paginate": {
        "first":			"Primera",
        "last":				"Última",
        "next":				"Siguiente",
        "previous":			"Anterior"
    },
    "aria": {
        "sortAscending":	"Ordenación ascendente",
        "sortDescending":	"Ordenación descendente"
    }
};

$(document).ready(function() {

    // //envio de formularios ajax
    // $('.FormularioAjax').submit(function(e){
    //     e.preventDefault();
        
    //     var form=$(this);
        
    //     var tipo=form.attr('data-form');

    //     var accion=form.attr('action');
    //     var metodo=form.attr('method');
    //     var respuesta=form.children('.RespuestaAjax');

    //     // console.log(metodo)
    //     var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
    //     var formdata = new FormData(this);
 
    //     $.post(accion,formdata? formdata: form.serialize(),function(response) {
    //         console.log(response)
    //     })

    //     // var textoAlerta;
    //     // if(tipo==="save"){
    //     //     textoAlerta="Los datos que enviaras quedaran almacenados en el sistema";
    //     // }else if(tipo==="delete"){
    //     //     textoAlerta="Los datos serán eliminados completamente del sistema";
    //     // }else if(tipo==="update"){
    //     // 	textoAlerta="Los datos del sistema serán actualizados";
    //     // }else{
    //     //     textoAlerta="Quieres realizar la operación solicitada";
    //     // }


    //     // swal({
    //     //     title: "¿Estás seguro?",   
    //     //     text: textoAlerta,   
    //     //     icon: "info",   
    //     //     buttons: {
    //     //         cancel: "Cancelar",
    //     //         Aceptar: true
    //     //     },
    //     //     dangerMode: true
    //     // }).then(function (value) {
    //     //     // console.log('ok');
    //     //    if(value) {
    //     //     $.ajax({
    //     //         type: metodo,
    //     //         url: accion,
    //     //         data: formdata ? formdata : form.serialize(),
    //     //         cache: false,
    //     //         contentType: false,
    //     //         processData: false,
    //     //         xhr: function(){
    //     //             var xhr = new window.XMLHttpRequest();
    //     //             xhr.upload.addEventListener("progress", function(evt) {
    //     //               if (evt.lengthComputable) {
    //     //                 var percentComplete = evt.loaded / evt.total;
    //     //                 percentComplete = parseInt(percentComplete * 100);
    //     //                 if(percentComplete<100){
    //     //                 	respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
    //     //               	}else{
    //     //               		respuesta.html('<p class="text-center"></p>');
    //     //               	}
    //     //               }
    //     //             }, false);
    //     //             return xhr;
    //     //         },
    //     //         success: function (data) {
    //     //             respuesta.html(data);
    //     //             // console.log(data)
    //     //         },
    //     //         error: function() {
    //     //             respuesta.html(msjError);
    //     //         }
    //     //     });
    //     //    }
    //     //     return false;
    //     // });
    // });

    $(document).on('click',".editarAgremiado", function (e) {
        e.preventDefault();
        let pk = $(this)[0].getAttribute('dataid');
        $.post("ajax/agremiadosAjax.php",{pk},function(response) {
            let datos= JSON.parse(response);
            let pk = datos[0];
            let agremiado = datos[1];
            let representante = datos[2];
            let email = datos[3];
            let tel = datos[4];
            let estatus = datos[5];
            let rfc = datos[6];

            $('#rfcM').val(rfc);
            $('#agremiadoM').val(agremiado)
            $('#nomReM').val(representante);
            $('#emailM').val(email);
            $('#telM').val(tel);
            $('#estatusM').val(estatus);
            ('select option[value="1"]').attr("selected",true)


        });
        // console.log()
    })

    $(document).on('submit', '.FormularioEditar', function (e) {
        e.preventDefault();
        let form = $(this)[0];
        let rfc = form[0].value;
        let agremiado = form[1].value;
        let representante = form[2].value;
        let email = form[3].value;
        let tel = form[4].value;
        let estatus = form[5].value;
        // var respuesta=form.children('.RespuestaAjax');
        $.post("ajax/agremiadosAjax.php",{rfc,agremiado,representante,email,tel,estatus}, function(response) {
            $('.RespuestaAjax').html(response);
            $('#rfcM').val("");
            $('#agremiadoM').val("")
            $('#nomReM').val("");
            $('#emailM').val("");
            $('#telM').val("");
            $('#estatusM').val("");

            // ('select option[value="1"]').attr("selected",true)

            $('#exampleModal').modal('hide');
            // respuesta.html(response);
        })
        // console.log(estatus);
    })

});

 
    
    window.onload = function() {
        $('nav').removeClass('fixed-top');
        $('#onload').fadeOut();
        if ($('#onload').fadeOut()) {
            $('body').removeClass('hidden');
            $('nav').addClass('fixed-top');
        }
        
    }