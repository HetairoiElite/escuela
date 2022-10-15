
$(document).ready(function () {

    $("#botonCrear").click(function () {
        $("#formulario")[0].reset();
        $(".modal-title").text("Crear Alumno");
        $("#action").val("Crear");
        $("#operacion").val("Crear");
        $("#imagen_subida").html("");
    });


    $('#datos_alumno').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay datos",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtro de _MAX_ total registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron coincidencias",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar orden de columna ascendente",
                "sortDescending": ": Activar orden de columna desendente"
            }
        }
    });


});

//Aquí código inserción
$(document).on('submit', '#formulario', function (event) {
    event.preventDefault();

    var nombre = $('#nombre').val();
    var apellidoP = $('#apellidoP').val();
    var apellidoM = $('#apellidoM').val();
    var usuario = $('#usuario').val();
    var gp = $('#gp').val();
    var action = $("#action").val();
    var telefono = $('#telefono').val();

    if (nombre == "") {
        Swal.fire({
            icon: 'warning',
            title: 'El nombre es requerido.'
        });
    } else if (apellidoP == "") {
        Swal.fire({
            icon: 'warning',
            title: 'El apellido paterno es requerido.'
        });
    } else if (apellidoM == "") {
        Swal.fire({
            icon: 'warning',
            title: 'El apellido materno es requerido.'
        });
    } else if (telefono == "") {
        Swal.fire({
            icon: 'warning',
            title: 'El teléfono es requerido.'
        });
    } else if (telefono.length < 10) {
        Swal.fire({
            icon: 'warning',
            title: 'El teléfono debe tener 10 dígitos.'
        });
    } else if (gp == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'El grado y el grupo son requeridos.'
        });
    }

    else {

        if (action == 'Crear') {
            $.ajax({
                url: "../db/registrar.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Alumno registrado correctamente.'
                    }).then((result) => {
                        if (result.value) {
                            $('#formulario')[0].reset();
                            $('#modalAlumno').modal('hide');
                            //dataTable.ajax.reload();
                            window.location.reload();
                        }
                    });
                }
            });
        } else if (action == 'Editar') {
            $.ajax({
                url: "../db/actualizar.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Alumno actualizado correctamente.'
                    }).then((result) => {
                        if (result.value) {
                            $('#formulario')[0].reset();
                            $('#modalAlumno').modal('hide');
                            //dataTable.ajax.reload();
                            window.location.reload();
                        }
                    })



                }
            });
        }


    }
});


$("[id^=formEditarAlu]").submit(function (e) {
    e.preventDefault();
    var id_alumno = $($(this)[0][1]).attr("id");
    console.log(id_alumno);
    boton = $("#boton" + id_alumno).val()
    $.ajax({
        url: "../db/buscar.php",
        method: "POST",
        data: {
            id: id_alumno,
            boton: boton
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#modalAlumno').modal('show');
            $('#nombre').val(data.nombre);
            $('#apellidoP').val(data.apellidoP);
            $('#apellidoM').val(data.apellidoM);
            $('#telefono').val(data.telefono);
            $('#usuario').html('')

            $.ajax({
                url: "../db/usuarios.php",
                method: "POST",
                dataTye: "json",
                data: { boton: boton, id_alumno: id_alumno },
                success: function (data) {
                    console.log(data);
                    var usuarios = JSON.parse(data);
                    usuarios.forEach(usuario => {
                        console.log(usuario)

                        if (usuario['id_usuario'] == data.id_usuario) {
                            //Selected
                            $('#usuario').append('<option value="' + usuario['id_usuario'] + '" selected>' + usuario['usuario'] + " : " + usuario['correo'] + '</option>');

                        } else {
                            $('#usuario').append('<option value="' + usuario["id_usuario"] + '">' + usuario["id_usuario"] + " : " + usuario['correo'] + '</option>');
                        }
                    });
                }
            })

            console.log(data.id);
            $('#direccion').val(data.direccion);
            $('#gp').val(data.grado_grupo);

            $("#cp_response").val(data.codigo_postal);
            $("#cp_responseh").val(data.codigo_postal); //ingresamos la respuesta del cp, en el input destino

            $("#tipo_asentamiento").val(data.tipo_asentamiento); //ingresamos la respuesta del tipo de asentamiento, en el input destino
            $("#tipo_asentamientoh").val(data.tipo_asentamiento)
            $("#municipio").val(data.municipio); //ingresamos la respuesta del municipio, en el input destino
            $("#municipioh").val(data.municipio)
            $("#estado").val(data.estado); //ingresamos la respuesta del estado, en el input destino
            $("#estadoh").val(data.estado)
            $("#ciudad").val(data.ciudad); //ingresamos la respuesta de la ciudad, en el input destino
            $("#ciudadh").val(data.ciudad);
            $("#list_colonias").html(
                '');
            $("#list_colonias").append('<option>' + data.colonia +
                '</option>');
            $("#calle").val(data.calle); //ingresamos la respuesta de la calle, en el input destino
            $("#numero").val(data.numero);


            $('.modal-title').text("Editar Alumnos");
            $('#id_alumno').val(id_alumno);
            $('#action').val("Editar");
            $('#operacion').val("Editar");
            $('#boton').val("Alumnos");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    })
});