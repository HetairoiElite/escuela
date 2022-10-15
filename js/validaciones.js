$('input[type=text]').keyup(function (e) {
    e.preventDefault();
    console.log("nombre");
    var nombre = $(this).val();
    var regexalfabeto = /^[a-z]|[A-Z]|\s/;

    var cadena = "";
    for (var i = 0; i < nombre.length; i++) {
        if (regexalfabeto.test(nombre[i]) == false) {
            $(this).val(cadena)
        } else {
            cadena += nombre[i];
        }
    }

})

$('#telefono').keyup(function (e) {
    e.preventDefault();
    var tam = 10;

    var telefono = $(this).val();

    var cadena = "";

    for (var i = 0; i < telefono.length; i++) {
        if (i < tam) {
            cadena += telefono[i];
        }
    }

    $(this).val(cadena);

})

$("#cedula").keyup(function (e) {
    e.preventDefault();
    var tam = 8;

    var cedula = $(this).val();

    var cadena = "";

    for (var i = 0; i < cedula.length; i++) {
        if (i < tam) {
            cadena += cedula[i];
        }
    }

    $(this).val(cadena);

});