<?php
//echo "<pre>";
//print_r($_SESSION['listaDeLibros']);
//echo "</pre>";

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
        <!--**************************************** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
        <!--**************************************** -->
    </head>
	
	<body>
<?php
<<<<<<< HEAD
<<<<<<< HEAD:vistas/vistasUsuarios_S_Roles/listarRegistroUsuarios_S_Roles.php
=======
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1
if(isset($_SESSION['listaDeUsuarios_Roles'])){
	
    $listaDeUsuarios_Roles=$_SESSION['listaDeUsuarios_Roles'];
	 unset($_SESSION['listaDeUsuarios_Roles']);
<<<<<<< HEAD
=======
if(isset($_SESSION['listaDeUsuarios'])){
	
    $listaDeUsuarios=$_SESSION['listaDeUsuarios'];
	 unset($_SESSION['listaDeUsuarios']);
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1:vistas/vistasUsuarios_S/listarUsuariosInactivos.php
=======
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1
	
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
<<<<<<< HEAD
<<<<<<< HEAD:vistas/vistasUsuarios_S_Roles/listarRegistroUsuarios_S_Roles.php
=======
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1
            <h3>Listado de la Tabla Rol y Usuarop</h3>
            <tr>
                <th>Usuario</th> 
                <th>Rol</th>
                <!--<th>Estado</th>-->
                <th>Eliminar</th> 
<<<<<<< HEAD
=======
            <h3>Listado de Usuarios inhabilitados </h3>
            <tr> 
                <th>Id</th>
                <th>Correo</th> 
                <th>Contraseña</th>
                <!--<th>Estado</th>-->
                <th>Habilitar</th> 
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1:vistas/vistasUsuarios_S/listarUsuariosInactivos.php
=======
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
<<<<<<< HEAD
<<<<<<< HEAD:vistas/vistasUsuarios_S_Roles/listarRegistroUsuarios_S_Roles.php
=======
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1
            foreach ($listaDeUsuarios_Roles as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeUsuarios_Roles[$i]->usuId; ?></td>  
                    <td><?php echo $listaDeUsuarios_Roles[$i]->rolId; ?></td>
                    <!--<td>d>-->
                    <td><a href="Controlador.php?ruta=eliminarUsuarios&usuId=<?php echo $listaDeUsuarios_Roles[$i]->id_usuario_s; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
<<<<<<< HEAD
=======
            foreach ($listaDeUsuarios as $key => $value) {
                ?>
                <tr> 
                    <td><?php echo $listaDeUsuarios[$i]->usuId; ?></td> 
                    <td><?php echo $listaDeUsuarios[$i]->usuLogin; ?></td>  
                    <td><?php echo $listaDeUsuarios[$i]->usuPassword; ?></td>
                    <!--<td>d>-->  
                    <td><a href="Controlador.php?ruta=habilitarUsuario&usuId=<?php echo $listaDeUsuarios[$i]->usuId; ?>" onclick="return confirm('Está seguro de habilitar el registro?')">Habilitar</a></td>  
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1:vistas/vistasUsuarios_S/listarUsuariosInactivos.php
=======
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1
                </tr>   
                <?php
                $i++;
            }
<<<<<<< HEAD
<<<<<<< HEAD:vistas/vistasUsuarios_S_Roles/listarRegistroUsuarios_S_Roles.php
            $listaDeUsuarios=null;
=======
            $listaDeRoles=null;
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1:vistas/vistasUsuarios_S/listarUsuariosInactivos.php
=======
            $listaDeUsuarios=null;
>>>>>>> 7e6d1c786ac87d46f8f568b186701f9e16568cc1
            ?>
        </tbody>
    </table>


    <!--**************************************** -->  
    <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
    <!--**************************************** -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#example').DataTable({
                                pageLength: 5,
                                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
                            });
                        });
    </script>     
    <!--**************************************** -->
    <!--**************************************** -->   



</body>
</html>