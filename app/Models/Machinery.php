<?php 

define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$CARLOS@2016');
define('SECRET_IV', '101712');

require_once "../../../config/Connection.php";

class Machinery{
    
    public $connection;

    function __construct()
    {
        $this->connection = Connection::ConnectDB();
    }

    function getMachinery(){
        
        //Se obtiene el id de empresa
        $idCompany = $_SESSION['empresa'];

        //Se obtiene el listado de maquinas pertenecientes a la empresa
        $query = 'SELECT * FROM maquinas WHERE empresa = :idCompany ORDER BY nombre_maquina';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':idCompany', $idCompany);

        if($statement->execute()){
            
            $machinery = $statement->fetchAll();

            if(isset($machinery[0]['nombre_maquina'])){

                return $machinery;

            }else{
                return 'Empty';
            }

        }else{
            return 'Error';
        }
    }

    function findMachinery($name){

        //Se obtiene el id de empresa
        $idCompany = $_SESSION['empresa'];
        $nameMachinery = '%' . $name . '%';

        //Se obtiene el listado de maquinas pertenecientes a la empresa
        $query = 'SELECT * FROM maquinas WHERE empresa = :idCompany AND nombre_maquina LIKE :nameMachinery ORDER BY nombre_maquina';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':idCompany', $idCompany);
        $statement->bindParam(':nameMachinery', $nameMachinery);

        if($statement->execute()){
            
            $machinery = $statement->fetchAll();

            if(isset($machinery[0]['nombre_maquina'])){

                return $machinery;

            }else{
                return 'Empty';
            }

        }else{
            return 'Error';
        }

    }

    function findMachineryToStore($name){

        //Se obtiene el id de empresa
        $idCompany = $_SESSION['empresa'];
        //$nameMachinery = '%' . $name . '%';

        //Se obtiene el listado de maquinas pertenecientes a la empresa
        $query = 'SELECT * FROM maquinas WHERE empresa = :idCompany AND nombre_maquina LIKE :nameMachinery ORDER BY nombre_maquina';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':idCompany', $idCompany);
        $statement->bindParam(':nameMachinery', $name);

        if($statement->execute()){
            
            $machinery = $statement->fetchAll();

            if(isset($machinery[0]['nombre_maquina'])){

                return $machinery;

            }else{
                return 'Empty';
            }

        }else{
            return 'Error';
        }

    }

    function sendImageWithApi($image, $option){

        $urlApi = 'http://tallergeorgio.hopto.org:5613/tallergeorgio/api/subirimagenes.php';
        $method = 'post';

        $postData = array(
            'method' => $method,
            'opcion' => $option,
            'image' => new CURLFile($image['tmp_name'])
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $urlApi);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

        $response = curl_exec($curl);

        //Error en la subida de imagenes
        if (curl_errno($curl)) {
            $error = curl_error($curl);
            return false;
        }

        curl_close($curl);

        // Procesar la respuesta de la API y obtener el nombre del archivo subido
        $uploadedFileName = $response;
        return $uploadedFileName;

    }

    function storeMachinery($name, $mark, $model, $serie, $description, $date, $status, $company, $image){

        $query = 'INSERT INTO maquinas
        (nombre_maquina, marca, modelo, nserie, observaciones, fecha_compra, status_maquina, empresa, foto_maquina) 
        VALUES (:nameMachinery, :mark, :model, :serie, :descriptionMachinery, :dateMachinery, :statusMachinery, :company, :imageMachinery)';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':nameMachinery', $name);
        $statement->bindParam(':mark', $mark);
        $statement->bindParam(':model', $model);
        $statement->bindParam(':serie', $serie);
        $statement->bindParam(':descriptionMachinery', $description);
        $statement->bindParam(':dateMachinery', $date);
        $statement->bindParam(':statusMachinery', $status);
        $statement->bindParam(':company', $company);
        $statement->bindParam(':imageMachinery', $image);

        if($statement->execute()){
            return '';
        }else{
            return 'Error';
        }

    }

}

?>