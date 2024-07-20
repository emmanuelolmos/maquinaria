<?php 

session_start();

require "../Models/User.php";

//Se obtiene el modelo
$user = new User();

//Se obtiene la función a realizar
$function = ''; //$_POST['function'];

if(isset($_POST['function'])){
    $function = $_POST['function'];
}

if(isset($_REQUEST['function'])){
    $function = $_REQUEST['function'];
}


//Variables
$error = '';
$data = [];

switch($function){
    case 'startSession':

        //Se verifica que los datos se hayan ingresado correctamente

        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if(empty($phone) || empty($password)){

            $error = 'Es necesario ingresar los datos';

        }else{
            if(!is_numeric($phone) || strlen($phone)!=10){

                $error = 'El número ingresado no es valido';

            }else{

                //Los campos son correctos, se manda al método de autenticar del modelo User
                $error = $user->authenticate($phone, $password);

            }
        }

        //Si hay un error se manda por la variable data
        if(empty($error)){
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['error'] = $error;
        }

        echo json_encode($data);

        break;

    case 'exitSession':

        //Desconfigurar todas las variables de sesión
        $_SESSION = array();

        //Borrar la cookie de sesión si está configurada
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        //Finalmente, destruir la sesión
        session_destroy();
        header("location:../../");

        break;

    default:

        echo '
        <br><br><br>
        <h1 style="text-align: center;">Error en la petición</h1>';

        break;
}

?>