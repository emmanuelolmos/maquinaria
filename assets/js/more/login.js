//Función para mostrar u ocultar la contraseña

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
});

//Función para mandar el formulario al controlador

$(document).ready(function () { 
    $('#formLogin').submit(function (e) { 
        e.preventDefault(); 

        //Para el caso que el usuario haya enviado el form con datos erróneos
        $("#error").remove();
         
        var formData = {
            phone: $("#phone").val(),
            password: $("#password").val(),
            function: 'startSession'
        };
        
        $.ajax({ 
            url: '../Controllers/More/SessionController.php', 
            type: 'POST', 
            data: formData, 
            success: function (data){

                var convertedInfo = JSON.parse(data);

                if(convertedInfo['success']){
                    location.href = '../../';
                }else{
                    $("#title").append(
                        '<h3 id="error" class="error text-center text-danger fw-bold mt-1 fs-6">' 
                        + convertedInfo['error'] + 
                        '</h3>'
                    );
                }

            }, 
            error: function (jqXHR, textStatus, errorThrown) { 
                alert('Error'); 
            } 
        }); 
    }); 
}); 