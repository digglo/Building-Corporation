<?php

include_once PATH . 'modelos/modeloStock/StockDAO.php';

class StockControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->StockControlador();
    }
    
    public function StockControlador(){
        switch ($this->datos['ruta']) {
            case 'listarStock':
                $this->listarStock();
                break;
            case 'mostrarActualizarStock':
                $this->mostrarActualizarStock();
                break;
            case 'confirmarActualizarStock':
                 $this -> confirmarActualizarStock();
                break;
            case 'cancelarActualizarStock':
                 $this -> cancelarActualizarIdentificacion();
                 break;
            case 'mostrarInsertarIdentificacion':
                $this -> mostrarInsertarIdentificacion();
                break;
            case 'insertarIdentificacion':
                $this -> insertarIdentificacion();
                break;
            case 'eliminarIdentificacion':
                $this -> eliminarIdentificacion();
                break;
        }
    }
    public function listarIdentificacion(){
        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroIdentificacion = $gestarIdentificacion -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeIdentificacion'] = $registroIdentificacion;
    
        header("location:principal.php?contenido=vistas/vistasIdentificacion/listarIdentificacion.php");
    }

    public  function mostrarActualizarIdentificacion(){

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarIdentificacion = $gestarIdentificacion -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosIdentificacion = $actualizarIdentificacion['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosIdentificacion']=$actualizarDatosIdentificacion;

        header("location:principal.php?contenido=vistas/vistasIdentificacion/vistaActualizarIdentificacion.php");
        
    }

    public function confirmarActualizarIdentificacion(){

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarIdentificacion = $gestarIdentificacion -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualizaci??n realizada.";
            header("location:Controlador.php?ruta=listarIdentificacion");	

    }

    public function cancelarActualizarIdentificacion(){

        session_start();
		        header("location:Controlador.php?ruta=listarIdentificacion");	

    }

    public function mostrarInsertarIdentificacion(){
		
        header("Location: principal.php?contenido=vistas/vistasIdentificacion/vistaIngresarIndentificacion.php");

}
    
    public function insertarIdentificacion(){
		
        
        $buscarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $identificacionHallado = $buscarIdentificacion->seleccionarId(array($this->datos['ide_id']));

        if (!$identificacionHallado['exitoSeleccionId']) {
            $insertarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoIdentificacion = $insertarIdentificacion->insertar($this->datos);  

            $resultadoInsercionIdentificacion = $insertoIdentificacion['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['ide_id'];
            
            header("location:Controlador.php?ruta=listarIdentificacion");
            
        }else{
        
            session_start();
            $_SESSION['ide_id'] = $this->datos['ide_id'];
            $_SESSION['ide_sigla'] = $this->datos['ide_sigla'];		
            $_SESSION['ide_descripcion'] = $this->datos['ide_descripcion'];	
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarIdentificacion");					

        }					
    }	

    public function eliminarIdentificacion(){
        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarIdentificacion = $gestarIdentificacion -> eliminar(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarIdentificacion");


    }
        
    
    
}

?>