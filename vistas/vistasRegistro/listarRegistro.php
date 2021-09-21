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
	<h1>Listado de la tabla Registro</h1>
    <br>
<body>
<?php
if(isset($_SESSION['listaDeRegistro'])){
	
	 $listaDeRegistro = $_SESSION['listaDeRegistro'];	
}

?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th> 
                <th>Numero de Registro</th>  
                <th>Comentarios</th>
                <th>Is Stock</th>
                <th>Editar</th> 
                <th>Eliminar</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeRegistro as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeRegistro[$i]->reg_id; ?></td>  
                    <td><?php echo $listaDeRegistro[$i]->reg_numero_registro; ?></td>  
                    <td><?php echo $listaDeRegistro[$i]->reg_comentarios; ?></td>   
                    <td><?php echo $listaDeRegistro[$i]->reg_stock_id; ?></td>
                    <td><a href="Controlador.php?ruta=mostrarActualizarRegistro&idAct=<?php echo $listaDeRegistro[$i]->reg_id; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarRegistro&idAct=<?php echo $listaDeRegistro[$i]->reg_id; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeRegistro=null;
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