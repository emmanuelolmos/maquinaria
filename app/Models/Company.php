<?php 

require_once "../../../config/Connection.php";

class Company{
    
    public $connection;

    function __construct()
    {
        $this->connection = Connection::ConnectDB();
    }

    function getCompanies(){
        
        $query = "SELECT * FROM empresa";

        $statement = $this->connection->prepare($query);
        
        if($statement->execute()){

            $companies = $statement->fetchAll();
            
            if(isset($companies)){

                return $companies;

            }else{
                return 'Empty';
            }

        }else{
            return 'Error';
        }
    }

    function getCompany(){

        $id = $_SESSION['empresa'];

        $query = 'SELECT * FROM empresa WHERE ID_empresa = :id';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);

        if($statement->execute()){

            $company = $statement->fetch(PDO::FETCH_ASSOC);

            if(isset($company['nombre_empresa'])){
                return $company;
            }else{
                return 'Empty';
            }
            
        }else{
            return 'Error';
        }
    }

    function removeCompany($id){

        $query = 'DELETE FROM empresa WHERE ID_empresa = :id';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);

        return $statement->execute();

    }
}

?>