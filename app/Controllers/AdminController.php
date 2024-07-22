<?php 

session_start();

require "../Models/User.php";
require "../Models/Company.php";

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
    
    case 'insertUser':

        //Se guardan los datos enviados
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $company = isset($_POST['company']) ? $_POST['company'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';

        //Se comprueba que los datos se hayan ingresado correctamente
        if(empty($name) || empty($phone) || empty($password) || empty($company) || empty($role) || empty($status)){

            $error = 'Es necesario ingresar los datos completos';

        }else{
            
            if(!is_numeric($phone) || strlen($phone)!=10){

                $error = 'El número ingresado no es valido';

            }else{

                //Lista de roles
                switch($role){
                    case '1':
                        $role = 'SUPERADMIN';
                        break;
                }

                //Se obtiene el modelo
                $user = new User();

                //Los campos son correctos, se manda al método addUser del modelo User
                $error = $user->addUser($name, $phone, $password, $company, $role, $status);

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
    
    case 'getCompanies':

        //Se obtiene el modelo
        $company = new Company();

        //Obtención de empresas
        $companies = $company->getCompanies();

        //Condición en caso de error o no haya registros
        if($companies == 'Error' || $companies == 'Empty'){
            $data['success'] = false;
            $data['error'] = $companies;
        }else{
            $data['success'] = true;
            $data['companies'] = $companies;
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