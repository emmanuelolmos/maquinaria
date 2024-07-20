<?php 

    session_start();

    //Verificar que el usuario haya iniciado sesión
    if(isset($_SESSION['ID_usuario'])){

        /* El usuario inició sesión
           Se dirige a la vista correspondiente */
           
        switch($_SESSION['tipo']){
            case 'SUPERADMIN':
                header('Location: ./app/Views/Admin/init.php');
                break;
            default:
                break;
        }

    }else{
        //Se direcciona al login
        header('Location: ./app/Views/login.php');
    }

?>