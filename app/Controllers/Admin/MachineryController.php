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