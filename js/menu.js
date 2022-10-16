$("a").on("click", function () {
    var id = $(this).attr('id');
    console.log(id);

    $.ajax({
        url: '../db/cambiarPagina.php',
        type: 'POST',
        dataType: 'json',
        data: { pagina: id },
        success: function (data) {

            if (data == 'change') {

                window.location.reload();

            } else {

                if (data != 'error') {
                    console.log(data);
                    window.location.reload()
                }
            }
        }
    })





})


function concatform(url, obj) {
    var form = "<form action='" + url + "' method='post'>";

    for (const key in obj) {
        form += '<input type="hidden" name="' + key + '" value="' + obj[key] + '" />';
    }
    console.log(form)

    var formpost = $(form);
    $('body').append(formpost);

    formpost.submit();
}