
$(document).ready(function () {

    $("#botonCrear").click(function () {
        $("#formulario")[0].reset();
        $(".modal-title").text("Crear Adminisrativo");
        $("#action").val("Crear");
        $("#operacion").val("Crear");
        $("#imagen_subida").html("");
    });


    $('#datos_admin').DataTable({
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
    var action = $("#action").val();
    var telefono = $('#telefono').val();
    var especialidad = $('#especialidad').val();
    var cedula = $('#cedula').val();


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
    } else if (especialidad == "") {
        Swal.fire({
            icon: 'warning',
            title: 'La especialidad es requerida.'
        });
    } else if (cedula == "") {
        Swal.fire({
            icon: 'warning',
            title: 'La cédula es requerida.'
        });
    } else if (cedula.length < 8) {
        Swal.fire({
            icon: 'warning',
            title: 'La cédula debe tener 8 dígitos.'
        });
    } else {
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
                        title: 'Administrativo registrado correctamente.'
                    }).then((result) => {
                        if (result.value) {
                            $('#formulario')[0].reset();
                            $('#modalAdmin').modal('hide');
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
                        title: 'Administrativo actualizado correctamente.'
                    }).then((result) => {
                        if (result.value) {
                            $('#formulario')[0].reset();
                            $('#modalAdmin').modal('hide');
                            //dataTable.ajax.reload();
                            window.location.reload();
                        }
                    })



                }
            });
        }
    }
});


$("[id^=formEditarAd]").submit(function (e) {
    e.preventDefault();
    var id_admin = $($(this)[0][1]).attr("id");
    console.log(id_admin);
    boton = $("#boton" + id_admin).val()
    $.ajax({
        url: "../db/buscar.php",
        method: "POST",
        data: {
            id: id_admin,
            boton: boton
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#modalAdmin').modal('show');
            $('#nombre').val(data.nombre);
            $('#apellidoP').val(data.apellidoP);
            $('#apellidoM').val(data.apellidoM);
            $('#telefono').val(data.telefono);
            $('#usuario').html('')

            $.ajax({
                url: "../db/usuarios.php",
                method: "POST",
                dataTye: "json",
                data: { boton: boton, id_admin: id_admin },
                success: function (data1) {
                    console.log(data1);
                    var usuarios = JSON.parse(data1);
                    usuarios.forEach(usuario => {
                        console.log(usuario)
                        console.log("data =" + data)
                        console.log("Usuario: " + data.usuario)

                        if (usuario['id_usuario'] == data.usuario) {
                            //Selected
                            $('#usuario').append('<option value="' + usuario['id_usuario'] + '" selected>' + usuario['id_usuario'] + " : " + usuario['correo'] + '</option>');

                        } else {
                            $('#usuario').append('<option value="' + usuario["id_usuario"] + '">' + usuario["id_usuario"] + " : " + usuario['correo'] + '</option>');
                        }
                    });
                }
            })
            console.log(data.id_usuario);
            $('#direccion').val(data.direccion);
            $('#especialidad').val(data.especialidad);
            $('#cedula').val(data.cedula);

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


            $('.modal-title').text("Editar Administrativos");
            $('#id_admin').val(id_admin);
            $('#action').val("Editar");
            $('#operacion').val("Editar");
            $('#boton').val("Administrativos");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    })
});