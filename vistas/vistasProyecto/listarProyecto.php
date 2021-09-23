<?php

/*echo "<pre>";
print_r($_SESSION['listarTiposDocumentos']);
echo "</pre>";*/

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


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
    </head>
	<h1>Listado de la tabla Proyecto</h1>
    <br>
<body>
<?php
if(isset($_SESSION['listaDeProyecto'])){
	
	 $listaDeProyecto = $_SESSION['listaDeProyecto'];	
}

?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th> 
                <th>Nombre Proyecto</th> 
                <th>Numero Proyecto</th>  
                <th>Descripcion Proyecto</th>
                <th>Id Sede</th>
                <th>Id Recibido</th>
                <th>Id Trabajador</th>
                <th>Id Material Construccion</th>
                <th>Editar</th> 
                <th>Eliminar</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeProyecto as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeProyecto[$i]->pro_id; ?></td>  
                    <td><?php echo $listaDeProyecto[$i]->pro_nombre_proyecto; ?></td>  
                    <td><?php echo $listaDeProyecto[$i]->pro_numero_proyecto; ?></td>   
                    <td><?php echo $listaDeProyecto[$i]->pro_descripcion_proyecto; ?></td>  
                    <td><?php echo $listaDeProyecto[$i]->pro_sede_id; ?></td> 
                    <td><?php echo $listaDeProyecto[$i]->pro_recibido_id; ?></td>  
                    <td><?php echo $listaDeProyecto[$i]->pro_trabajador_id; ?></td> 
                    <td><?php echo $listaDeProyecto[$i]->material_construccion_mat_id; ?></td>
                    <td><a href="Controlador.php?ruta=mostrarActualizarProyecto&idAct=<?php echo $listaDeProyecto[$i]->pro_id; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarProyecto&idAct=<?php echo $listaDeProyecto[$i]->pro_id; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeProyecto=null;
            ?>
        </tbody>
    </table>



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




</body>
</html>