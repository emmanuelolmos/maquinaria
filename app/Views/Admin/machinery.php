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
    <title>Maquinarias</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
</head>
<body>

    <?php
        include '../Components/Admin/navbar.php';
    ?>

    <div class="card shadow" style="margin-left: 40px; margin-right: 40px; margin-top:40px;">

        <div id="divNameCompany" class="ms-3 mt-4">
            <!-- Nombre de la empresa -->
        </div>

        <div class="d-flex justify-content-between p-2 bg-primary text-white mt-2 ms-3 me-3">

        <div>
            <h1 class="fs-5" style="margin-left: 20px; margin-top:5px;">
                Administrar maquinas
            </h1>
        </div>

        <div>
            <input class="border rounded-1" type="text" style="width: 400px; margin-top:5px;" placeholder="Ingresa el nombre de la maquina a buscar">
        </div>

        <div>
            <button class="btn btn-secondary" onclick="loadCompanies()" data-bs-toggle="modal" data-bs-target="#addUserModal" style="margin-right: 30px;">
                <i class="bi bi-plus-circle"></i></i> Agregar
            </button>
        </div>
    
        </div>

        <br>
      
    </div>
    
    <!-- Modales -->
    <?php
        //Pendientes
    ?>

    <!-- Scripts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>-->
    <script src="../../../assets/js/jquery/jquery.min.js"></script>
    <script src="../../../assets/js/bootstrap/bootstrap.bundle.js"></script>
    <script src="../../../assets/js/admin/machinery.js"></script>

</body>
</html>