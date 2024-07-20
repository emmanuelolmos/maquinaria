<?php 

require_once "../../config/Connection.php";

class User{
    
    public $connection;

    function __construct()
    {
        $this->connection = Connection::ConnectDB();
    }

    function authenticate($phone, $password){
        
        $query = "SELECT * FROM usuarios LEFT JOIN empresa ON empresa.ID_empresa WHERE 
        usuarios.telefono = :telefono AND usuarios.status_usuario = 1";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':telefono', $phone);

        //Manejo de errores

        //Error en la ejecución del query
        if($statement->execute()){

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            //El telefono ingresado no se encuentra registrado o no tiene el estatus requerido
            if(isset($user['nombre_usuario'])){

                //La contraseña no coincide
                if($user['clave'] == $password){

                    //Los datos son correctos, se inicia sesión
                    $_SESSION['ID_usuario'] = $user['ID_usuario'];
                    $_SESSION['nombre'] =  $user['nombre_usuario'];
                    $_SESSION['telefono'] =  $user['telefono'];
                    $_SESSION['tipo'] =  $user['rol_usuario'];
                    $_SESSION['empresa'] =  $user['nombre_empresa'];
                    $_SESSION['ID_empresa'] =  $user['ID_empresa'];
                    
                    return '';

                }else{
                    return 'Contraseña incorrecta';
                }
            }else{
                return 'No encontrado o no autorizado';
            }
        }else{
            return 'Error';
        }

    }

    function getUsers(){
        
        $query = "SELECT * FROM usuarios";

        $statement = $this->connection->prepare($query);
        
        if($statement->execute()){

            $users = $statement->fetchAll();
            
            if(isset($users)){

                return $users;

            }else{
                return 'Empty';
            }

        }else{
            return 'Error';
        }
    }

    function removeUser($id){

        $query = 'DELETE FROM usuarios WHERE ID_usuario = :id';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);

        return $statement->execute();

    }
}

?>