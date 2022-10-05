
$("[id^=formEliminarUsu]").submit(function (e) {
    e.preventDefault();
    console.log("borrar");
    var usuario = $($(this)[0][1]).attr('id')

    boton = $("#boton" + usuario).val()

    console.log(usuario);
    console.log(boton);

    if (usuario == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Selecciona un usuario!!',
        });
        return false;
    } else {
        Swal.fire({
            icon: 'warning',
            title: '¿Estás seguro de eliminar ese usuario?',
            showCancelButton: true,
            confirmButtonColor: "#3885f6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../db/eliminar.php",
                    type: "POST",
                    datatype: "json",
                    data: { usuario: usuario, boton: boton },
                    success: function (data) {
                        console.log(data);
                        console.log(data == "'error'");
                        if (data == '"error"') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error',
                            });
                        } else {

                            Swal.fire({
                                icon: 'success',
                                title: 'Usuario eliminado!!',
                                confirmButtonColor: "#3885f6",
                                confirmButtonText: 'Confirmar'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = "inicio.php";
                                }
                            })
                        }
                    }
                });
            }
        });
    }
});


$("[id^=formEliminarMat]").submit(function (e) {
    e.preventDefault();
    console.log("borrar");
    var materia = $($(this)[0][1]).attr('id')

    boton = $("#boton" + materia).val()

    console.log(materia);
    console.log(boton);

    if (materia == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Selecciona una materia!!',
        });
        return false;
    } else {
        Swal.fire({
            icon: 'warning',
            title: '¿Estás seguro de eliminar esa materia?',
            showCancelButton: true,
            confirmButtonColor: "#3885f6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../db/eliminar.php",
                    type: "POST",
                    datatype: "json",
                    data: { materia: materia, boton: boton },
                    success: function (data) {
                        console.log(data);
                        console.log(data == "'error'");
                        if (data == '"error"') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error',
                            });
                        } else {

                            Swal.fire({
                                icon: 'success',
                                title: 'Materia eliminada!!',
                                confirmButtonColor: "#3885f6",
                                confirmButtonText: 'Confirmar'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = "inicio.php";
                                }
                            })
                        }
                    }
                });
            }
        });
    }
});


$("[id^=formEliminarAlu]").submit(function (e) {
    e.preventDefault();
    console.log("borrar");
    var alumno = $($(this)[0][1]).attr('id')

    boton = $("#boton" + alumno).val()

    console.log(alumno);
    console.log(boton);

    if (alumno == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Selecciona un alumno!!',
        });
        return false;
    } else {
        Swal.fire({
            icon: 'warning',
            title: '¿Estás seguro de eliminar ese alumno?',
            showCancelButton: true,
            confirmButtonColor: "#3885f6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../db/eliminar.php",
                    type: "POST",
                    datatype: "json",
                    data: { alumno: alumno, boton: boton },
                    success: function (data) {
                        console.log(data);
                        console.log(data == "'error'");
                        if (data == '"error"') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error',
                            });
                        } else {

                            Swal.fire({
                                icon: 'success',
                                title: 'Alumno eliminado!!',
                                confirmButtonColor: "#3885f6",
                                confirmButtonText: 'Confirmar'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = "inicio.php";
                                }
                            })
                        }
                    }
                });
            }
        });
    }
});

$("[id^=formEliminarDoc]").submit(function (e) {
    e.preventDefault();
    console.log("borrar");
    var docente = $($(this)[0][1]).attr('id')

    boton = $("#boton" + docente).val()

    console.log(docente);
    console.log(boton);

    if (docente == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Selecciona un docente!!',
        });
        return false;
    } else {
        Swal.fire({
            icon: 'warning',
            title: '¿Estás seguro de eliminar ese docente?',
            showCancelButton: true,
            confirmButtonColor: "#3885f6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../db/eliminar.php",
                    type: "POST",
                    datatype: "json",
                    data: { docente: docente, boton: boton },
                    success: function (data) {
                        console.log(data);
                        console.log(data == "'error'");
                        if (data == '"error"') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error',
                            });
                        } else {

                            Swal.fire({
                                icon: 'success',
                                title: 'Docente eliminado!!',
                                confirmButtonColor: "#3885f6",
                                confirmButtonText: 'Confirmar'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = "inicio.php";
                                }
                            })
                        }
                    }
                });
            }
        });
    }
});



$("[id^=formEliminarAd]").submit(function (e) {
    e.preventDefault();
    console.log("borrar");
    var admin = $($(this)[0][1]).attr('id')

    boton = $("#boton" + admin).val()

    console.log(admin);
    console.log(boton);

    if (admin == 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Selecciona un Administrativo!!',
        });
        return false;
    } else {
        Swal.fire({
            icon: 'warning',
            title: '¿Estás seguro de eliminar ese admin?',
            showCancelButton: true,
            confirmButtonColor: "#3885f6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../db/eliminar.php",
                    type: "POST",
                    datatype: "json",
                    data: { admin: admin, boton: boton },
                    success: function (data) {
                        console.log(data);
                        console.log(data == "'error'");
                        if (data == '"error"') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error',
                            });
                        } else {

                            Swal.fire({
                                icon: 'success',
                                title: 'Administrativo eliminado!!',
                                confirmButtonColor: "#3885f6",
                                confirmButtonText: 'Confirmar'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = "inicio.php";
                                }
                            })
                        }
                    }
                });
            }
        });
    }
});
