<?php
session_start();

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
	<div id="provisional"> Interface Provisional
	     <div class="gestion">Menú Operaciones en Tabla Rol
	       <br/>
	         <a href="Controlador.php?ruta=listarRoles&pag=0">Listar Roles</a>
           <br/>
              <a href="Controlador.php?ruta=mostrarInsertarRol">Agregar Rol</a>   	 
	     </div>
	     <div class="gestion">Menú Operaciones en Tabla Rol
	       <br/>
	         <a href="Controlador.php?ruta=listarTipoDocumento&pag=0">Listar Tipos de Documento</a>
           <br/>
              <a href="Controlador.php?ruta=mostrarInsertarTipoDocumento">Agregar Tipo de Documento</a>   	 
	     </div>
		 <div class="gestion">Menú Operaciones en Constructora
	       <br/>
	         <a href="Controlador.php?ruta=listarConstrutora&pag=0">Listar Constructoras</a>
           <br/>
              <a href="Controlador.php?ruta=mostrarInsertarConstructora">Agregar Constructora</a>   	 
	     </div>
<<<<<<< HEAD
		 <div class="gestion">Menú Operaciones en Sede
	       <br/>
	         <a href="Controlador.php?ruta=listarSede&pag=0">Listar Sede</a>
           <br/>
              <a href="Controlador.php?ruta=mostrarInsertarSede">Agregar Sede</a>   	 
=======
		 <div class="gestion">Menú Operaciones en Recibido
	       <br/>
	         <a href="Controlador.php?ruta=listarRecibido&pag=0">Listar Materiales Recibidos</a>
           <br/>
              <a href="Controlador.php?ruta=mostrarInsertarRecibido">Agregar Material Recibido</a>   	 
	     </div>
		 <div class="gestion">Menú Operaciones en Utilizado
	       <br/>
	         <a href="Controlador.php?ruta=listarUtilizado&pag=0">Listar Materiales Utilizado</a>
           <br/>
              <a href="Controlador.php?ruta=mostrarInsertarUtilizado">Agregar Material Utilizado</a>   	 
>>>>>>> main
	     </div>
	 
		 <div class="gestion">Menú Operaciones en Ubicacion
	       <br/>
	         <a href="Controlador.php?ruta=listarUbicacion&pag=0">Listar Ubicacion</a>
           <br/>
              <a href="Controlador.php?ruta=mostrarInsertarUbicacion">Agregar Ubicacion</a>   	 
	     </div>

     <div id="contenido">
		 <br/>
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