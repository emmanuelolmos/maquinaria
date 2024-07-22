<?php
    session_start();

    //Se verifica que el usuario haya iniciado sesión
    if(!isset($_SESSION['ID_usuario'])){
        header('Location: ../../../');
    }else{
        //Se verifica que el usuario tenga el rol correcto
        if($_SESSION['tipo'] != 'SUPERADMIN'){
            header('Location: ../../');
        }
    }

    //Carga de archivo .env
    $env = parse_ini_file('../../../.env')
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
</head>
<body>

    <?php
        include '../Components/Admin/navbar.php';
    ?>

    <div class="card shadow" style="margin-left: 40px; margin-right: 40px; margin-top:40px;">
        <div class="d-flex justify-content-between p-2 bg-primary text-white" style="margin-left: 20px; margin-right: 20px; margin-top:40px">

        <div>
            <h1 class="fs-5" style="margin-left: 20px; margin-top:5px;">
                Administrar usuarios
            </h1>
        </div>
        <div>
            <button class="btn btn-secondary" onclick="loadCompanies()" data-bs-toggle="modal" data-bs-target="#addUserModal" style="margin-right: 30px;">
                <i class="bi bi-person-plus-fill"></i> Agregar
            </button>
        </div>
           
        </div>

        <div id="divUsers" class="p-2" style="margin-left: 10px; margin-right: 10px; margin-top:10px">
            <table id="tableUsers" class="text-center" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="background-color: #BDBDBD; padding: 10px;" scope="col">NOMBRE</th>
                        <th style="background-color: #BDBDBD; padding: 10px;" scope="col">TELEFONO</th>
                        <th style="background-color: #BDBDBD; padding: 10px;" scope="col">EMPRESA</th>
                        <th style="background-color: #BDBDBD; padding: 10px;" scope="col">CARGO</th>
                        <th style="background-color: #BDBDBD; padding: 10px;" scope="col">OPCIONES</th>
                    </tr>
                </thead>

                <tbody id="listUsers">
                    
                </tbody>
            </table>
        </div>

        <br>
      
    </div>
    
    <!-- Modales -->
    <?php
        include 'Modals/addUser.php';
        include 'Modals/editUser.php';
    ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.js"></script>
    <script src="../../../assets/js/admin/init.js"></script>

</body>
</html>