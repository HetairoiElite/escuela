$("#formEditarDir").submit(function (e) {

    e.preventDefault();

    var calle = $('#calle').val();
    var numero = $('#numero').val();
    var colonia = $('#list_colonias').val();
    var municipio = $('#municipioh').val();
    var estado = $('#estadoh').val();
    var ciudad = $('#ciudadh').val();
    var tipo_asentamiento = $('#tipo_asentamientoh').val();
    var cp = $('#cp_responseh').val();
    var boton = $('#botonDir').val();
    var tipousu = $('#tipousu').val();
    var idusu = $('#idusu').val();

    if (calle != '' && numero != '') {
        $.ajax({
            url: "../db/actualizar.php",
            method: 'POST',
            data: {calle: calle, numero: numero, colonia: colonia, cp: cp, ciudad: ciudad, estado: estado, boton: boton, tipousu: tipousu, idusu: idusu, municipio: municipio, tipo_asentamiento: tipo_asentamiento },
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Dirección actualizada correctamente.'
                }).then((result) => {
                    if (result.value) {

                        window.location.reload();
                    }
                })
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Todos los campos son requeridos.'
        });
    }
});