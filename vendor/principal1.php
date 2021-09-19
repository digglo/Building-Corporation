<?php
session_start();

include_once 'modelos/ConstantesConexion.php';
include_once PATH . 'controladores/ManejoSesiones/BloqueDeSeguridad.php';

$seguridad= new BloqueDeSeguridad();
$seguridad->seguridad("login.php");


if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<!DOCTYPE html>

<html>
    <head>
        <title>PROVISIONAL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
		 #provisional{
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 .gestion{
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 #contenido{
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		
        </style>
    </head>
    <body>
	<div id="provisional"> Interface Provisional <?php echo "Bienvenido ".$_SESSION['perNombre']." ". $_SESSION['perApellido']; ?>
	<div> <a href="Controlador.php?ruta=cerrarSesion">Salir</a></div>
	 <div class="gestion">Menú Operaciones en Tabla Libros
	 <br/>
	 <a href="Controlador.php?ruta=listarLibros&pag=0">Listar Libros</a>
     <br/>
	 <?php
	 //echo "<pre>";
	 //print_r($_SESSION);
	 //echo "</pre>";	
if(in_array(1,$_SESSION['rolesEnSesion'])){ 
	 ?>
     <a href="Controlador.php?ruta=mostrarInsertarLibros">Agregar Libros</a>
	 <?php
}
	?>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla X_1
	 <br/>
	 <a href="">Listar X_1</a>
     <br/>
     <a href="">Agregar X_1</a>   	 
	 </div>
	 <div class="gestion">Menú Operaciones en Tabla X_2
	 <br/>
	 <a href="">Listar X_2</a>
     <br/>
     <a href="">Agregar X_2</a>   	 
	 </div>
     <div id="contenido">
		 <br/>
                Zona de Resultados (Aquí la funcionalidad!!!!)
	 <br/>
	 <br/>
	 <?php
	 if(isset($_GET['contenido'])){
		 include($_GET['contenido']);
	 }
	 
	 
	 ?>
	</div>
	</div>

	
	
	
	
	</body>
</html>