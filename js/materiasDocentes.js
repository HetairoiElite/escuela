$("[id^=formMateriasDoc]").submit(function (e) {
    e.preventDefault();
    var id_docente = $($(this)[0][1]).attr("id");
    console.log("id docente: " + id_docente);
    boton = $($(this)[0][0]).attr("value")
    console.log(boton);
    $.ajax({
        url: "../db/buscar.php",
        method: "POST",
        data: {
            id: id_docente,
            boton: boton
        },
        dataType: "json",
        success: function (data) {
            console.log(data);


            $.ajax({
                url: "../db/buscar.php",
                method: "POST",
                data: {
                    boton: "Materias"
                },
                dataType: "json",
                //Printe a check form with all materias
                success: function (dataMaterias) {
                    console.log(dataMaterias);

                    var list_materias = Object.values(data).map(clave_materia => clave_materia.clave_materia);

                    console.log(list_materias);

                    var html = '';
                    html += '<div class="form-group">';
                    html += '<label for="materias">Materias</label>';
                    html += '<div class="form-check">';
                    for (var count = 0; count < dataMaterias.length; count++) {

                        if (list_materias.includes(dataMaterias[count].id)) {

                            html += '<input class="form-check-input" type="checkbox" name="materias[]" value="' + dataMaterias[count].id + '" checked>';
                            html += '<label class="form-check-label" for="materia">' + dataMaterias[count].nombre + '</label>';
                            html += '<br>';
                        } else {

                            html += '<input class="form-check-input" type="checkbox" name="materias[]" value="' + dataMaterias[count].id + '" id="materia' + dataMaterias[count].id + '">';
                            html += '<label class="form-check-label" for="materia' + dataMaterias[count].id + '">' + dataMaterias[count].nombre + '</label>';
                            html += '<br>';
                        }
                    }
                    html += '</div>';
                    html += '</div>';
                    $('#formularioMaterias').html(html);
                }
            })

            $('.modal-title').text("Materias del docente " + data[0].nombre + " " + data[0].apellidoP + " " + data[0].apellidoM);
            $('#id_docente').val(id_docente);
            $('#action').val("Editar");
            $('#operacion').val("Editar");
            $('#boton').val("DocentesMaterias");



            sleep(300).then(() => {
                $('#modalMateriasDocente').modal('show');
            });


        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    })
});

$(document).on('submit', '#formularioMaterias', function (event) {
    event.preventDefault();
    var id_docente = $('#id_docente').val();
    var boton = $('#boton').val();

    console.log("Na")

    var materias = [];
    $('input:checkbox:checked').each(function (i) {
        materias[i] = $(this).val();
    });

    console.log(materias);

    if (materias.length > 0) {
        $.ajax({
            url: "../db/actualizar.php",
            method: "POST",
            data: {
                id_docente: id_docente,
                materias: materias,
                boton: boton
            },
            success: function (data) {
                console.log(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Materias actualizadas correctamente.'
                }).then((result) => {
                    //$('#formularioMaterias')[0].reset();
                    $('#modalMateriasDocente').modal('hide');
                    location.reload();
                })

            }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡No has seleccionado ninguna materia!',
        })
    }

});


function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}