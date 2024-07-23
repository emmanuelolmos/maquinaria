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

                /*
                $("#tableUsers").remove();

                switch(convertedInfo['error']){
                    case 'Error':
                        $("#divUsers").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 fs-2">Error en la conexión con la base de datos.</h3>'
                        );
                        break;
                    case 'Empty':
                        $("#divUsers").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 fs-2">Sin registros.</h3>'
                        );
                        break;
                    default:
                        $("#divUsers").append(
                            '<h1 id="error" class="error text-center text-danger fw-bold mt-1 fs-2">Error desconocido.</h3>'
                        );
                        break;
                }*/

            }

        }, 
        error: function (jqXHR, textStatus, errorThrown) { 
            alert('Error'); 
        } 
    }); 
}

loadData();