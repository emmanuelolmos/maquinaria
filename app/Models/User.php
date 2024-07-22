<?php 

require_once "../../../config/Connection.php";

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

    function getUser($id){

        //Consulta para obtener el usuario
        $query = 'SELECT * FROM usuarios WHERE ID_usuario = :id';

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);

        if($statement->execute()){

            $userFound = $statement->fetchAll();

            return $userFound;//[0]['telefono'];
        }else{
            return 'Error';
        }
    }

    function addUser($name, $phone, $password, $company, $role, $status){

        //Antes de generar el registro se comprueba que no haya un registro con el mismo nombre o número teléfonico
        $query = 'SELECT * FROM usuarios WHERE nombre_usuario = :nameUser OR telefono = :phone';
        
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':nameUser', $name);
        $statement->bindParam(':phone', $phone);

        if($statement->execute()){

            $users = $statement->fetchAll();

            //Se comprueba que el query haya obtenido registros o no
            if(!isset($users[0]['telefono'])){

                //Se procede a crear el usuario
                $query = 'INSERT INTO usuarios (nombre_usuario, telefono, clave, empresa, status_usuario, rol_usuario) 
                VALUES (:nameUser, :phone, :passwordUser, :company, :statusUser, :roleUser)';

                $statement = $this->connection->prepare($query);
                $statement->bindParam(':nameUser', $name);
                $statement->bindParam('phone', $phone);
                $statement->bindParam('passwordUser', $password);
                $statement->bindParam(':company', $company);
                $statement->bindParam(':statusUser', $status);
                $statement->bindParam(':roleUser', $role);

                if($statement->execute()){

                    return '';

                }else{
                    return 'Error';
                }

            }else{
                return 'El nombre o teléfono ingresado ya se encuentra registrado';
            }

        }else{
            return 'Error';
        }

    }

    function updateUser($id, $name, $phone, $password, $company, $role, $status){

        //Se verifica que el nombre o telefono no se encuentre ya registrado
        $query = 'SELECT * FROM usuarios WHERE ID_usuario != :id AND nombre_usuario = :nameUser 
        OR ID_usuario != :id AND telefono = :phone';
        
        $statement = $this->connection->prepare($query);

        $statement->bindParam('id', $id);
        $statement->bindParam('nameUser', $name);
        $statement->bindParam('phone', $phone);

        if($statement->execute()){
            
            $users = $statement->fetchAll();

            if(!isset($users[0]['telefono'])){

                //Ya se verificó

                //Se realiza el query para actualizar usuario
                $query = 'UPDATE usuarios SET nombre_usuario = :nameUser, telefono = :phone, 
                clave = :passwordUser, empresa = :company, status_usuario = :statusUser, 
                rol_usuario = :roleUser WHERE ID_usuario = :id';

                $statement = $this->connection->prepare($query);

                $statement->bindParam('nameUser', $name);
                $statement->bindParam('phone', $phone);
                $statement->bindParam('passwordUser', $password);
                $statement->bindParam('company', $company);
                $statement->bindParam('statusUser', $status);
                $statement->bindParam('roleUser', $role);
                $statement->bindParam('id', $id);

                if($statement->execute()){
                    return '';
                }else{
                    return 'Error';
                }
                
            }else{
                return 'El nombre o teléfono ingresado ya se encuentra registrado';
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