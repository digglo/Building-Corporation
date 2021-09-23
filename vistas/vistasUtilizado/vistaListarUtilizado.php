<?php

/*echo "<pre>";
print_r($_SESSION['listarUtilizado']);
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
        <link rel="stylesheet" typ|e="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
    </head>
	<h1>Listado de la tabla Utilizado</h1>
    <br>
<body>
<?php
if(isset($_SESSION['listaDeUtilizado'])){
	
	 $listaDeUtilizado = $_SESSION['listaDeUtilizado'];	
}

?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th> 
                <th>Fecha Utilizado</th> 
                <th>Cantidad Utilizado</th>  
                <th>Editar</th> 
                <th>Eliminar</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeUtilizado as  $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeUtilizado[$i]->uti_id; ?></td>  
                    <td><?php echo $listaDeConstructora[$i]->uti_fecha_uso; ?></td>  
                    <td><?php echo $listaDeConstructora[$i]->uti_cantidad_utilizado; ?></td>    
                    <td><a href="Controlador.php?ruta=mostrarActualizarUtilizado&idAct=<?php echo $listaDeUtilizado[$i]->uti_id; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarUtilizado&idAct=<?php echo $listaDeUtilizado[$i]->uti_id; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeUtilizado=null;
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

