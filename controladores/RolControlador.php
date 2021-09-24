<?php

include_once PATH . 'modelos/modeloRol/RolDAO.php';

class RolControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->RolControlador();
    }
    
    public function RolControlador(){
        switch ($this->datos['ruta']) {
            case 'listarRol':
                $this->listarRol();
                break;
            case 'mostrarActualizarRol':
                $this->mostrarActualizarRol();
                break;
            case 'confirmarActualizarRol':
                 $this -> confirmarActualizarRol();
                break;
            case 'cancelarActualizarRol':
                 $this -> cancelarActualizarRol();
                 break;
            case 'mostrarInsertarRol':
                $this -> mostrarInsertarRol();
                break;
            case 'insertarRol':
                $this -> insertarRol();
                break;
            case 'eliminarRol':
                $this -> eliminarRol();
                break;
        }
    }
    public function listarRol(){
        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRoles = $gestarRoles -> seleccionarTodos(1);
    
        session_start();
    
        $_SESSION['listaDeRoles'] = $registroRoles;
    
        header("location:principal.php?contenido=vistas/vistasRoles/listarRegistroRoles.php");
    }

    public  function mostrarActualizarRol(){

        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRoles = $gestarRoles -> seleccionarID(array($this->datos['rolId']));

        $actualizarDatosRoles = $actualizarRoles['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosRoles']=$actualizarDatosRoles;

        header("location:principal.php?contenido=vistas/vistasRoles/vistaActualizarRol.php");
        
    }

    public function confirmarActualizarRol(){

        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRoles = $gestarRoles -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarRol");	

    }

    public function cancelarActualizarRol(){

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