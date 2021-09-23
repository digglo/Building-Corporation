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
        $gestarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUbicacion = $gestarUbicacion -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeUbicacion'] = $registroUbicacion;
    
        header("location:principal1.php?contenido=vistas/vistasUbicacion/listarUbicacion.php");
    }

    public  function mostrarActualizarUbicacion(){

        $gestarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarUbicacion = $gestarUbicacion -> seleccionarID(array($this->datos['ubi_id']));

        $actualizarDatosUbicacion = $actualizarUbicacion['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosUbicacion']=$actualizarDatosUbicacion;

        header("location:principal1.php?contenido=vistas/vistasUbicacion/vistaActualizarUbicacion.php");
        
    }

    public function confirmarActualizarUbicacion(){

        $gestarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarUbicacion = $gestarUbicacion -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarUbicacion");	

    }

    public function cancelarActualizarUbicacion(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarUbicacion");	

    }

    public function mostrarInsertarUbicacion(){
		
        header("Location: principal1.php?contenido=vistas/vistasUbicacion/vistaIngresarUbicacion.php");

}
    
    public function insertarUbicacion(){
		
        
        $buscarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $ubicacionHallado = $buscarUbicacion->seleccionarId(array($this->datos['ubi_id']));

        if (!$ubicacionHallado['exitoSeleccionId']) {
            $insertarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoUbicacion = $insertarUbicacion->insertar($this->datos);  

            $resultadoInsercionUbicacion = $insertoUbicacion['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['ubi_id'];
            
            header("location:Controlador.php?ruta=listarRol");
            
        }else{
        
            session_start();
            $_SESSION['ubi_id'] = $this->datos['ubi_id'];
            $_SESSION['ubi_direccion'] = $this->datos['ubi_direccion'];			
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarRol");					

        }					
    }	

    public function eliminarUbicacion(){
        $gestarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarUbicacion = $gestarUbicacion -> eliminar(array($this->datos['rolId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarRol");


    }
        
    
    
}

?>