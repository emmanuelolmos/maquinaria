<?php 

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

}

?>