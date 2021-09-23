<?php

    session_start();

    if (isset($_SESSION['mensaje']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido']))
    {
        $mensaje = $_SESSION['mensaje'];
        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        echo "<script languaje='javascript'>alert('$mensaje '+'$nombre '+'$apellido')</script>";
        unset($_SESSION['mensaje']);
        unset($_SESSION['nombre']);
        unset($_SESSION['apellido']);
    }else if (isset($_SESSION['mensaje']))
    {
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
        <title>Building Corporation</title>
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
        </style>
    </head>
    <body>
    <div id="principal">
        <center><font face="Helvetica Neue" size="48" color="#000000">Interfaz</font></center>
        <div class="gestion">Menú Operaciones de Tabla Libros
            <br/>
            <a href="./Controlador.php?ruta=listarRol">Listar Roles</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarRol">Agregar Rol</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Identificacion
            <br/>
            <a href="./Controlador.php?ruta=listarIdentificacion">Listar Identificaciones</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarIdentificacion">Agregar Identificacion</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Constructora
            <br/>
            <a href="./Controlador.php?ruta=listarConstructora">Listar Constructoras</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarConstructora">Agregar Constructora</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Sede
            <br/>
            <a href="./Controlador.php?ruta=listarSede">Listar Sedes</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarSede">Agregar Sede</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Ubicacion
            <br/>
            <a href="./Controlador.php?ruta=listarUbicacion">Listar Ubicaciones</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarUbicacion">Agregar Ubicacion</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Trabajador
            <br/>
            <a href="./Controlador.php?ruta=listarTrabajador">Listar Trabajadores</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarTrabajador">Agregar Trabajadores</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla material_construccion
            <br/>
            <a href="./Controlador.php?ruta=listarMaterial_construccion">Listar Material_construccion</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarMaterial_construccion">Agregar Material_construccion</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Recibido
            <br/>
            <a href="./Controlador.php?ruta=listarRecibido">Listar Recibido</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarRecibido">Agregar Recibido</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Proyecto
            <br/>
            <a href="./Controlador.php?ruta=listarProyecto">Listar Proyectos</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarProyecto">Agregar Proyecto</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Registro
            <br/>
            <a href="./Controlador.php?ruta=listarRegistro">Listar Registros</a>
            <br/>
            <a href="./Controlador.php?ruta=mostrarInsertarRegistro">Agregar Registro</a>
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