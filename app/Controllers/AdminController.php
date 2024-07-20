<?php 

session_start();

require "../Models/User.php";

//Se obtiene la función a realizar
$function = '';

if(isset($_POST['function'])){
    $function = $_POST['function'];
}

if(isset($_REQUEST['function'])){
    $function = $_REQUEST['function'];
}

//Variables
$error = '';
$data = [];

//Variables adicionales
$idUser = '';

if(isset($_POST['idUser'])){
    $idUser = $_POST['idUser'];
}

switch($function){
    case 'getUsers':

        //Se obtiene el modelo
        $user = new User();

        //Obtención de usuarios
        $users = $user->getUsers();

        //Condición en caso de error o no haya registros
        if($users == 'Error' || $users == 'Empty'){
            $data['success'] = false;
            $data['error'] = $users;
        }else{
            $data['success'] = true;
            $data['users'] = $users;
        }
        
        echo json_encode($data);
        
        break;

    case 'editUser':
        echo $idUser;
        break;

    case 'removeUser':

        //Comprobación de que el ID no sea el mismo de la sesión
        if($_SESSION['ID_usuario'] == $idUser){
            $data['success'] = false;
            $data['error'] = 'ownAccount';
        }else{

            //Se obtiene el modelo
            $user = new User();

            //Eliminación de usuario
            if($user->removeUser($idUser)){
                $data['success'] = true;
            }else{
                $data['success'] = false;
                $data['error'] = 'unknown';
            }
            
        }

        echo json_encode($data);

        break;

    default:

        echo '
        <br><br><br>
        <h1 style="text-align: center;">Error en la petición</h1>';

        break;
}

?>