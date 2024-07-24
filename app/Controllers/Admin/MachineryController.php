<?php 

session_start();

require "../../Models/User.php";
require "../../Models/Company.php";
require "../../Models/Machinery.php";

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

switch($function){
    case 'getCompany':

        //Se obtiene el modelo
        $company = new Company();

        //Obtención de los datos de la empresa
        $result = $company->getCompany();

        //Condición en caso de error o no haya registros
        if($result == 'Error' || $result == 'Empty'){
            $data['success'] = false;
            $data['error'] = $result;
        }else{
            $data['success'] = true;
            $data['company'] = $result;
        }
        
        echo json_encode($data);
        
        break;
    
    case 'getMachinery':

        //Se obtiene el modelo
        $machinery = new Machinery();

        //Obtención de la lista de maquinaria
        $result = $machinery->getMachinery();

        //Condición en caso de error o no haya registros
        if($result == 'Error' || $result == 'Empty'){
            $data['success'] = false;
            $data['error'] = $result;
        }else{
            $data['success'] = true;
            $data['machinery'] = $result;
        }

        echo json_encode($data);

        break;

    case 'findMachinery':

        //Se obtiene el modelo
        $machinery = new Machinery();

        //Se obtiene el nombre a buscar
        $name = $_POST['name'];

        if($name == ''){

            //Obtención de la lista de maquinaria
            $result = $machinery->getMachinery();

        }else{

            //Obtención de la lista de maquinaria
            $result = $machinery->findMachinery($name);

        }

        //Condición en caso de error o no haya registros
        if($result == 'Error' || $result == 'Empty'){
            $data['success'] = false;
            $data['error'] = $result;
        }else{
            $data['success'] = true;
            $data['machinery'] = $result;
        }

        echo json_encode($data);

        break;

    case 'insertMachinery':

        //Se guardan los datos enviados

        $name = isset($_POST['inputNameAddMachineryModal']) ? $_POST['inputNameAddMachineryModal'] : '';
        $mark = isset($_POST['inputMarkAddMachineryModal']) ? $_POST['inputMarkAddMachineryModal'] : '';
        $model = isset($_POST['inputModelAddMachineryModal']) ? $_POST['inputModelAddMachineryModal'] : '';
        $serie = isset($_POST['inputSerieAddMachineryModal']) ? $_POST['inputSerieAddMachineryModal'] : '';
        $description = isset($_POST['inputDescriptionAddMachineryModal']) ? $_POST['inputDescriptionAddMachineryModal'] : '';
        $date = isset($_POST['inputDateAddMachineryModal']) ? $_POST['inputDateAddMachineryModal'] : '';
        $status = isset($_POST['selectStatusAddMachineryModal']) ? $_POST['selectStatusAddMachineryModal'] : '';
        $company = isset($_POST['selectCompanyAddMachineryModal']) ? $_POST['selectCompanyAddMachineryModal'] : '';
        $image = isset($_FILES['inputImageAddMachineryModal']) ? $_FILES['inputImageAddMachineryModal'] : '';

        //Se comprueba que los datos se hayan ingresado correctamente
        if(empty($name) || empty($mark) || empty($model) || empty($serie) || empty($description) || empty($date) || empty($status) || empty($company) || empty($image)){

            $error = 'Es necesario ingresar los datos completos';

        }else{

            //Se comprueba que no haya una maquina con el mismo nombre
            $machinery = new Machinery();

            $result = $machinery->findMachineryToStore($name);

            if($result == 'Empty'){

                //Todos los datos son correctos

                //Se guarda la imagen con la API
                $option = 13;
                $nameImage = $machinery->sendImageWithApi($image, $option);
                
                //Se guarda el registro
                $result = $machinery->storeMachinery($name, $mark, $model, $serie, $description, $date, $status, $company, $nameImage);

                if($result == ''){

                    $error = $result;
                    
                }else{
                    $error = 'Error en la inserción del registro';
                }

            }else{
                 
                $error = 'Ya hay una maquina con el mismo nombre';

                if($result == 'Error'){

                    $error = 'Error en la consulta de maquinaria';
                   
                }
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

    /*
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

        break;*/

    default:

        echo '
        <br><br><br>
        <h1 style="text-align: center;">Error en la petición</h1>';

        break;
}

?>