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
if(isset($_SESSION['listaDeMaterial_construccion'])){
	
    $listaDeMaterial_construccion=$_SESSION['listaDeMaterial_construccion'];
	 unset($_SESSION['listaDeMaterial_construccion']);
	
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <h3>Listado de la Tabla Material_construccion</h3>
            <tr> 
                <th>Id</th>
                <th>Nombre Material Construccion</th>
                <th>Precio Material</th>
                <!--<th>Estado</th>-->
                <th>Actualizar</th> 
                <th>Eliminar</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeMaterial_construccion as $key => $value) {
                ?>
                <tr> 
                    <td><?php echo $listaDeMaterial_construccion[$i]->mat_id; ?></td> 
                    <td><?php echo $listaDeMaterial_construccion[$i]->mat_nombre_material; ?></td>  
                    <td><?php echo $listaDeMaterial_construccion[$i]->mat_precio_material; ?></td>  
                   
                    <!--<td>d>--> 
                    <td><a href="Controlador.php?ruta=mostrarActualizarMaterial_construccion&material_construccionId=<?php echo $listaDeMaterial_construccion[$i]->mat_id; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarMaterial_construccion&material_construccionId=<?php echo $listaDeMaterial_construccion[$i]->mat_id; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeMaterial_construccion=null;
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