<?php

session_start();

if (isset($_SESSION['mensaje']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
    $mensaje = $_SESSION['mensaje'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    echo "<script languaje='javascript'>alert('$mensaje '+'$nombre '+'$apellido')</script>";
    unset($_SESSION['mensaje']);
    unset($_SESSION['nombre']);
    unset($_SESSION['apellido']);
}else if (isset($_SESSION['mensaje'])){
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola bebe</title>
    <style type="text/css"> 
        #principal{
            width: 80%;
            border: black 3px solid;
            margin-left: auto;
            margin-right: auto;
        }
        .gestion{
            width: 90%;
            border: black 3px solid;
            margin-left: auto;
            margin-right: auto;
        }
        #contenido{
            width: 90%;
            border: black 3px solid;
            margin-left: auto;
            margin-right: auto;
        }
        .imagenEasy{
            display: block;
            position: relative;
            top: 77px;
            left: 170px;
            margin: -80px;
        }
        .imagenSena{
            display: block;
            position: relative;
            top: 35px;
            left: 945px;
            margin: -80px;
            
        }
    </style>
</head>
<body>
    <div id="principal">
                <img class="imagenEasy" src="./Logo.png" width="120" height="120">
                <img class="imagenSena" src="./LogoSena.png" width="120" height="120">
                <center><font face="Helvetica Neue" size="48" color="#000000">Interfaz<br/>EasyParking</font></center>
        <div class="gestion">Menú Operaciones de Tabla Libros
            <br/>
            <a href="./Controlador.php?ruta=listarLibros">Listar Libros</a>
            <br/>
            <a href="./Controlador.php?ruta=agregarLibro">Agregar</a>
            <br>
                <a href="./Controlador.php?ruta=listarLibrosInactivos">Listar Libros Inactivos</a>
                
        </div>
        <div class="gestion">Menú Operaciones de Tabla Rol
            <br>
            <a href="./Controlador.php?ruta=listarRoles">Listar Roles</a>
            <br>
            <a href="./Controlador.php?ruta=mostrarInsertarRoles">Agregar</a>
            <br>
            <a href="./Controlador.php?ruta=listarRolesInactivos">Listar Roles Inactivos</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Usuario_s
            <br>
            <a href="./Controlador.php?ruta=listarUsuarios">Listar Usuarios</a>
            <br>
            <a href="./Controlador.php?ruta=mostrarInsertarUsuarios">Agregar</a>
            <br>
            <a href="./Controlador.php?ruta=listarUsuariosInactivos">Listar Usuarios Inactivos</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Usuario_s_roles
            <br>
            <a href="./Controlador.php?ruta=listarUsuarios_SRoles">Listar roles del usuario </a>
            <br>
            <a>Agregar</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Tickets
            <br>
            <a href="./Controlador.php?ruta=listarTickets">Listar Tickets</a>
            <br>
            <a href="./Controlador.php?ruta=mostrarInsertarticket">Agregar Ticket</a>
            <br>
            <a href="./Controlador.php?ruta=listarTicketsInactivos">Listar Tickets Inactivos</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Vehículos
            <br>
            <a href="./Controlador.php?ruta=listarVehiculos">Listar Vehículos</a>
            <br>
            <a href="./Controlador.php?ruta=mostrarInsertarVehiculos">Agregar Vehiculo</a>
            <br>
            <a href="./Controlador.php?ruta=listarVehiculosInactivos">Listar Vehiculos Inactivos</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Reportes
            <br>
            <a href="./Controlador.php?ruta=listarReportes">Listar Reportes</a>
            <br>
            <a href="./Controlador.php?ruta=mostrarInsertarReportes">Agregar Reporte</a>
            <br>
            <a href="./Controlador.php?ruta=listarReportesInactivos">Listar Reportes Inactivos</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Empleados
            <br>
            <a>Listar Empleados</a>
            <br>
            <a>Agregar Empleado</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Tipos de Documentos
            <br>
            <a href="./Controlador.php?ruta=listarTiposDocumentos">Listar Tipos de Documentos</a>
            <br>
            <a>Agregar Tipo de Documento</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Tarifas
            <br>
            <a>Listar Tarifas</a>
            <br>
            <a>Agregar Tarifa</a>
        </div>
        <div id="contenido">
            <?php
            if(isset($_GET['contenido'])){
                include($_GET['contenido']);
            }

            ?>
        </div>
    </div>
</body>
</html>