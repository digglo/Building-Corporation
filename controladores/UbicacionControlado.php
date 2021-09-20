<?php

include_once PATH . 'modelos/modeloUbicacion/ubicacionDAO.php';

class UbicacionControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->ubicacionControlador();
    }
    
    public function ubicacionControlador(){
        switch ($this->datos['ruta']) {
            case 'listarUbicacion':
                $this->listarUbicacion();
                break;
            case 'mostrarActualizarUbicacion':
                $this->mostrarActualizarUbicacion();
                break;
            case 'confirmarActualizarUbicacion':
                 $this -> confirmarActualizarUbicacion();
                break;
            case 'cancelarActualizarUbicacion':
                 $this -> cancelarActualizarUbicacion();
                 break;
            case 'mostrarInsertarUbicacion':
                $this -> mostrarInsertarUbicacion();
                break;
            case 'insertarUbicacion':
                $this -> insertarUbicacion();
                break;
            case 'eliminarUbicacion':
                $this -> eliminarUbicacion();
                break;
        }
    }
    public function listarUbicacion(){
        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRoles = $gestarRoles -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeRoles'] = $registroRoles;
    
        header("location:principal.php?contenido=vistas/vistasRoles/listarRegistroRoles.php");
    }

    public  function mostrarActualizarUbicacion(){

        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRoles = $gestarRoles -> seleccionarID(array($this->datos['rolId']));

        $actualizarDatosRoles = $actualizarRoles['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosRoles']=$actualizarDatosRoles;

        header("location:principal.php?contenido=vistas/vistasRoles/vistaActualizarRol.php");
        
    }

    public function confirmarActualizarUbicacion(){

        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRoles = $gestarRoles -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarRol");	

    }

    public function cancelarActualizarUbicacion(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarRol");	

    }

    public function mostrarInsertarRol(){
		
        header("Location: principal.php?contenido=vistas/vistasRoles/vistaIngresarRol.php");

}
    
    public function insertarRol(){
		
        
        $buscarRol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $rolHallado = $buscarRol->seleccionarId(array($this->datos['rol_id_rol']));

        if (!$rolHallado['exitoSeleccionId']) {
            $insertarRol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoRol = $insertarRol->insertar($this->datos);  

            $resultadoInsercionRol = $insertoRol['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['rol_id_rol'];
            
            header("location:Controlador.php?ruta=listarRol");
            
        }else{
        
            session_start();
            $_SESSION['rol_id_rol'] = $this->datos['rol_id_rol'];
            $_SESSION['rol_tipo_rol'] = $this->datos['rol_tipo_rol'];			
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarRol");					

        }					
    }	

    public function eliminarRol(){
        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarRoles = $gestarRoles -> eliminar(array($this->datos['rolId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarRol");


    }
        
    
    
}

?>