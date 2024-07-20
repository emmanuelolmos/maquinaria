function loadData(){

    var petition = {
        function: 'getUsers'
    };
    
    $.ajax({ 
        url: '../../Controllers/AdminController.php', 
        type: 'POST', 
        data: petition, 
        success: function (data){

            var convertedInfo = JSON.parse(data);

            if(convertedInfo['success']){
                
                let tbody = '';

                //Cada usuario
                for(let i=0; i < convertedInfo['users'].length; i++){
                    
                    //Cada dato del usuario
                    tbody += 
                    '<tr>' +
                        '<td style="padding: 10px;">' + convertedInfo['users'][i].nombre_usuario + '</td>' +
                        '<td style="padding: 10px;">' + convertedInfo['users'][i].telefono + '</td>' +
                        '<td style="padding: 10px;">' + convertedInfo['users'][i].empresa + '</td>' +
                        '<td style="padding: 10px;">' + convertedInfo['users'][i].rol_usuario + '</td>' +
                        '<td style="padding: 10px">' +
                            '<button class="btn btn-success" onclick="editUser('+ convertedInfo['users'][i].ID_usuario + ')">' +
                                '<i class="bi bi-pencil-fill"></i>' +
                            '</button> ' +
                            '<button class="btn btn-danger" onclick="removeUser(' + convertedInfo['users'][i].ID_usuario + ')">' +
                                '<i class="bi bi-person-dash-fill"></i>' +
                            '</button>' +
                        '</td>' +
                    '</tr>';

                }

                $("#listUsers").append(tbody);
                
            }else{

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
                }

            }

        }, 
        error: function (jqXHR, textStatus, errorThrown) { 
            alert('Error'); 
        } 
    }); 
}

function addUser(){
    //Pendiente
}

function removeUser(id){
    
    //Alerta de SweetAlert
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: true
      });
      swalWithBootstrapButtons.fire({
        title: "Estás seguro de eliminar al usuario?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {

            //Se confirmó la eliminación
            var petition = {
                function: 'removeUser',
                idUser: id
            };
            
            $.ajax({ 
                url: '../../Controllers/AdminController.php', 
                type: 'POST', 
                data: petition, 
                success: function (data){
        
                    var convertedInfo = JSON.parse(data);
        
                    if(convertedInfo['success']){
                        
                        swalWithBootstrapButtons.fire({
                            title: "Eliminado",
                            text: "El usuario se ha eliminado.",
                            icon: "success"
                        });

                        location.reload();
                        
                    }else{

                        switch(convertedInfo['error']){
                            case 'ownAccount':
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "No puedes borrar tu cuenta.",
                                    icon: "error"
                                });
                                break;

                            case 'unknown':
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "El usuario no se eliminó correctamente.",
                                    icon: "error"
                                });
                                break;
                        }
        
                    }
        
                }, 
                error: function (jqXHR, textStatus, errorThrown) { 
                    alert('Error'); 
                } 
            });
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire({
            title: "Cancelado",
            text: "No se borró al usuario",
            icon: "error"
          });
        }
      });
}

function editUser(id){
    alert('Se editará: ' + id);
}

loadData();