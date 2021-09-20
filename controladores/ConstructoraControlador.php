<?php

include_once PATH . 'modelos/modeloConstructora/constructoraDAO.php';

class ConstructoraControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->constructoraControlador();
    }
    
    public function constructoraControlador(){
        switch ($this->datos['ruta']) {
            case 'listarConstructora':
                $this->listarConstructora();
                break;
            case 'mostrarActualizarConstructora':
                $this->mostrarActualizarConstructora();
                break;
            case 'confirmarActualizarConstructora':
                 $this -> confirmarActualizarConstructora();
                break;
            case 'cancelarActualizarConstructora':
                 $this -> cancelarActualizarConstructora();
                 break;
            case 'mostrarInsertarConstructora':
                $this -> mostrarInsertarConstructora();
                break;
            case 'insertarConstructora':
                $this -> insertarConstructora();
                break;
            case 'eliminarConstructora':
                $this -> eliminarConstructora();
                break;
        }
    }
    public function listarConstructora(){
        $gestarIdentificacion = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroIdentificacion = $gestarIdentificacion -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeIdentificacion'] = $registroIdentificacion;
    
        header("location:principal.php?contenido=vistas/vistasConstructora/listarConstructora.php");
    }

    public  function mostrarActualizarConstructora(){

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarIdentificacion = $gestarIdentificacion -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosIdentificacion = $actualizarIdentificacion['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosIdentificacion']=$actualizarDatosIdentificacion;

        header("location:principal.php?contenido=vistas/vistasIdentificacion/vistaActualizarIdentificacion.php");
        
    }

    public function confirmarActualizarConstructora(){

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarIdentificacion = $gestarIdentificacion -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarIdentificacion");	

    }

    public function cancelarActualizarConstructora(){

        session_start();
		        header("location:Controlador.php?ruta=listarIdentificacion");	

    }

    public function mostrarInsertarConstructora(){
		
        header("Location: principal.php?contenido=vistas/vistasIdentificacion/vistaIngresarIndentificacion.php");

}
    
    public function insertarConstructora(){
		
        
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

    public function eliminarConstructora(){
        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarIdentificacion = $gestarIdentificacion -> eliminar(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarIdentificacion");


    }
        
    
    
}

?>