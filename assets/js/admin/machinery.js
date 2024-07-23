//Funciones a utilizar
function loadData(){
    
    var petition = {
        function: 'getCompany'
    };
    
    $.ajax({ 
        url: '../../Controllers/Admin/MachineryController.php', 
        type: 'POST', 
        data: petition, 
        success: function (data){

            var convertedInfo = JSON.parse(data);

            if(convertedInfo['success']){

                $("#hNameCompany").remove();

                $("#divNameCompany").append(
                    '<h1 id="hNameCompany" class="fs-3 ">Empresa: ' + convertedInfo['company'].nombre_empresa + '</h1>'
                );
                
            }else{

                $("#divRowTable").remove();

                switch(convertedInfo['error']){
                    case 'Error':
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Error en la conexión con la base de datos.</h3>'
                        );
                        break;
                    case 'Empty':
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Sin registros.</h3>'
                        );
                        break;
                    default:
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Error desconocido.</h3>'
                        );
                        break;
                }

            }

        }, 
        error: function (jqXHR, textStatus, errorThrown) { 
            alert('Error'); 
        } 
    }); 
}

function loadMachinery(){

    var petition = {
        function: 'getMachinery'
    };

    $.ajax({ 
        url: '../../Controllers/Admin/MachineryController.php', 
        type: 'POST', 
        data: petition, 
        success: function (data){

            var convertedInfo = JSON.parse(data);

            if(convertedInfo['success']){

                //alert(convertedInfo['machinery']['0'].marca);
                let cards = '';

                //Se llena con el siguiente ciclo
                for(let i=0; i < convertedInfo['machinery'].length; i++){
                    cards += '<div class="col-md-4 mb-3 mb-sm-0">' +
                                '<div class="card">' +
                                    '<img class="card-img-top" src="http://tallergeorgio.hopto.org:5613/tallergeorgio/imagenes/maquinas/' + convertedInfo['machinery'][i].foto_maquina + '" alt="">' +
                                    '<div class="card-body">' +
                                        //Nombre y opciones
                                        '<div class="d-flex justify-content-between mb-2">' +
                                            '<h5 class="card-title fs-6 mt-2">' + convertedInfo['machinery'][i].nombre_maquina.toUpperCase() + '</h5>' +
                                            '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>' +
                                            '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">' +
                                                '<li class="dropdown-item">Editar maquina</li>' +
                                                '<li class="dropdown-item">Asignar mantenimiento</li>' +
                                                '<li class="dropdown-item">Crear checks</li>' +
                                                '<li class="dropdown-item">Generar revisiones</li>' +
                                                '<li class="dropdown-item">Eliminar maquinas</li>' +
                                            '</ul>' +
                                        '</div>' +
                                        //Descripción
                                        '<p class="card-text">' + convertedInfo['machinery'][i].observaciones +'</p>' +
                                        //Información adicional
                                        '<div class="d-flex justify-content-between mb-3">' +
                                            '<div class="bg-primary ms-1 me-2 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">Marca: ' + convertedInfo['machinery'][i].marca + '</p>' +
                                            '</div>' +
                                            '<div class="bg-primary ms-2 me-1 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">Modelo: ' + convertedInfo['machinery'][i].modelo + '</p>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="d-flex justify-content-between mb-3">' +
                                            '<div class="bg-secondary ms-1 me-2 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">Fecha de compra: ' + convertedInfo['machinery'][i].fecha_compra + '</p>' +
                                            '</div>' +
                                            '<div class="bg-secondary ms-2 me-1 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">N. Serie: ' + convertedInfo['machinery'][i].nserie + '</p>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                             '</div>';
                }

                $("#divRowTable").append(cards);
                
            }else{

                $("#divRowTable").remove();

                switch(convertedInfo['error']){
                    case 'Error':
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Error en la conexión con la base de datos.</h3>'
                        );
                        break;
                    case 'Empty':
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Sin registros.</h3>'
                        );
                        break;
                    default:
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Error desconocido.</h3>'
                        );
                        break;
                }

            }

        }, 
        error: function (jqXHR, textStatus, errorThrown) { 
            alert('Error'); 
        } 
    }); 

}

function findMachinery(){

    var petitionData = {
        name: $("#inputNameMachinery").val(),
        function: 'findMachinery'
    };

    $.ajax({ 
        url: '../../Controllers/Admin/MachineryController.php', 
        type: 'POST', 
        data: petitionData, 
        success: function (data){

            $("#divRowTable").remove();

            $("#error").remove();

            $("#brCards").remove();

            $("#divPrincipalTable").append(
                '<div id="divRowTable" class="row"></div>'
            );

            var convertedInfo = JSON.parse(data);

            if(convertedInfo['success']){

                //alert(convertedInfo['machinery']['0'].marca);
                let cards = '';

                //Se llena con el siguiente ciclo
                for(let i=0; i < convertedInfo['machinery'].length; i++){
                    cards += '<div class="col-md-4 mb-3 mb-sm-0">' +
                                '<div class="card">' +
                                    '<img class="card-img-top" src="http://tallergeorgio.hopto.org:5613/tallergeorgio/imagenes/maquinas/' + convertedInfo['machinery'][i].foto_maquina + '" alt="">' +
                                    '<div class="card-body">' +
                                        //Nombre y opciones
                                        '<div class="d-flex justify-content-between mb-2">' +
                                            '<h5 class="card-title fs-6 mt-2">' + convertedInfo['machinery'][i].nombre_maquina.toUpperCase() + '</h5>' +
                                            '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>' +
                                            '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">' +
                                                '<li class="dropdown-item">Editar maquina</li>' +
                                                '<li class="dropdown-item">Asignar mantenimiento</li>' +
                                                '<li class="dropdown-item">Crear checks</li>' +
                                                '<li class="dropdown-item">Generar revisiones</li>' +
                                                '<li class="dropdown-item">Eliminar maquinas</li>' +
                                            '</ul>' +
                                        '</div>' +
                                        //Descripción
                                        '<p class="card-text">' + convertedInfo['machinery'][i].observaciones +'</p>' +
                                        //Información adicional
                                        '<div class="d-flex justify-content-between mb-3">' +
                                            '<div class="bg-primary ms-1 me-2 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">Marca: ' + convertedInfo['machinery'][i].marca + '</p>' +
                                            '</div>' +
                                            '<div class="bg-primary ms-2 me-1 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">Modelo: ' + convertedInfo['machinery'][i].modelo + '</p>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="d-flex justify-content-between mb-3">' +
                                            '<div class="bg-secondary ms-1 me-2 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">Fecha de compra: ' + convertedInfo['machinery'][i].fecha_compra + '</p>' +
                                            '</div>' +
                                            '<div class="bg-secondary ms-2 me-1 w-50 rounded-2" style="color: #FEFEFE;">' +
                                                '<p class="mt-2 fw-bold text-center">N. Serie: ' + convertedInfo['machinery'][i].nserie + '</p>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                             '</div>';
                }

                $("#divRowTable").append(cards);
                $("#divPrincipalTable").append('<br id="brCards">');
                
            }else{

                $("#divRowTable").remove();
                
                $("#error").remove();

                $("#brCards").remove();

                $("#divPrincipalTable").append(
                    '<div id="divRowTable" class="row"></div>'
                );

                switch(convertedInfo['error']){
                    case 'Error':
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Error en la conexión con la base de datos.</h3>'
                        );
                        break;
                    case 'Empty':
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Sin registros.</h3>'
                        );
                        break;
                    default:
                        $("#divPrincipalTable").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 mb-5 fs-2">Error desconocido.</h3>'
                        );
                        break;
                }

            }
        }, 
        error: function (jqXHR, textStatus, errorThrown) { 
            alert('Error'); 
        } 
    }); 
}



loadData();
loadMachinery();