function informacion_cp() {

    $.ajax({
        url: 'https://api.copomex.com/query/info_cp/' + $("#codigo_postal")
            .val(), //aqui va el endpoint de la api de copomex, con el método de info_cp, se deberá concatenar el CP ya que se recibe como parametro en la url, no como variable GET
        data: {
            token: '339e10d4-4523-480c-8987-5e510d69bc40', //aqui va tu token. Crea una cuenta gratuita para obtener tu token en https://api.copomex.com/panel
            type: 'simplified'
        },
        type: 'GET', //el método http que se usará, COPOMEX solo ocupa método get
        dataType: 'json', // el tipo de información que se espera de respuesta
        success: function (
            copomex) { // código a ejecutar si la petición es satisfactoria, dentro irá el código personalizado

            if (!copomex.error) { //si NO hubo un error

                $("#cp_response").val(copomex.response.cp); //ingresamos la respuesta del cp, en el input destino
                $("#cp_responseh").val(copomex.response.cp);

                $("#tipo_asentamiento").val(copomex.response
                    .tipo_asentamiento); //ingresamos la respuesta del tipo de asentamiento, en el input destino
                $("#tipo_asentamientoh").val(copomex.response.tipo_asentamiento)
                $("#municipio").val(copomex.response
                    .municipio); //ingresamos la respuesta del municipio, en el input destino
                $("#municipioh").val(copomex.response.municipio)
                $("#estado").val(copomex.response.estado); //ingresamos la respuesta del estado, en el input destino
                $("#estadoh").val(copomex.response.estado)
                $("#ciudad").val(copomex.response.ciudad); //ingresamos la respuesta de la ciudad, en el input destino
                $("#ciudadh").val(copomex.response.ciudad)
                $("#pais").val(copomex.response.pais); //ingresamos la respuesta del pais, en el input destino

                $("#list_colonias").html(
                    ''); //reseteamos el input select para que no se concatene a los nuevos resultados
                for (var i = 0; i < copomex.response.asentamiento.length; i++) { //iteramos el resultado en un for
                    $("#list_colonias").append('<option>' + copomex.response.asentamiento[i] +
                        '</option>'); //agregamos el item al listado de colonias
                }

            } else { //si hubo error
                console.log('error: ' + copomex.error_message);
            }

        },
        error: function (jqXHR, status, error) { //si ocurrió un error en el request al endpoint de COPOMEX

            if (jqXHR.status == 400) { //el código http 400 significa que algo se mandó mal (Bad Request)
                copomex = jqXHR.responseJSON;
                alert(copomex.error_message); //mostramos en un alerta, el error recibido
            }

        },
        complete: function (jqXHR, status) { // código a ejecutar sin importar si la petición falló o no
            console.log('Petición a COPOMEX terminada');
        }
    });

}