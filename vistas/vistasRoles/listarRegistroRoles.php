<?php


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
if(isset($_SESSION['listaDeRoles'])){
    $listaDeRoles=$_SESSION['listaDeRoles'];
	 unset($_SESSION['listaDeRoles']);
	
}
?>
    <table id="example1" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead >
            <h3>Listado de la Tabla Rol</h3>
            <tr> 
                <th>Id</th>
                <th>Nombre de el Rol</th> 
                <!--<th>Estado</th>-->
                <th>Actualizar</th> 
                <th>Eliminar</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            if (!empty($listaDeRoles)) {
                foreach ($listaDeRoles as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $listaDeRoles[$i]->rol_id_rol; ?></td>
                        <td><?php echo $listaDeRoles[$i]->rol_tipo_rol; ?></td>
                        <!--<td>d>-->
                        <td><a href="Controlador.php?ruta=mostrarActualizarRol&rolId=<?php echo $listaDeRoles[$i]->rol_id_rol; ?>">Actualizar</a></td>
                        <td><a href="Controlador.php?ruta=eliminarRol&rolId=<?php echo $listaDeRoles[$i]->rol_id_rol; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            $listaDeRoles=null;
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