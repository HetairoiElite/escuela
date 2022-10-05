$("#formEditarPerfil").submit(function (e) {

    e.preventDefault();

    var usuario = $("#usuarioh").val();
    var password = $('#password').val();
    var nombre = $('#nombre').val();
    var apellidoP = $('#apellidoP').val();
    var apellidoM = $('#apellidoM').val();
    var boton = $('#boton').val();
    var tipousu = $('#tipousu').val();
    var idusu = $('#idusu').val();

    if (nombre != '' && apellidoP != '' && apellidoM != '') {
        $.ajax({
            url: "../db/actualizar.php",
            method: 'POST',
            data: { usuario: usuario, password: password, nombre: nombre, apellidoP: apellidoP, apellidoM: apellidoM, boton: boton, tipousu: tipousu, idusu: idusu },
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Perfil actualizado correctamente.'
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