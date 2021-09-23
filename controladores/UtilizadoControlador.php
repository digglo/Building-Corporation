<?php

include_once PATH . 'modelos/modeloUtilizado/UtilizadoDAO.php';

class UtilizadoControlador{

    private $datos;

    public function __construct($datos){
        $this->datos = $datos;
        $this->UtilizadoControlador();
    }
    
    public function UtilizadoControlador(){
        switch ($this->datos['ruta']) {
            case 'listarUtilizado':
                $this->listarUtilizado();
                break;
            case 'mostrarActualizarUtilizado':
                $this->mostrarActualizarUtilizado();
                break;
            case 'confirmarActualizarUtilizado':
                 $this -> confirmarActualizarUtilizado();
                break;
            case 'cancelarActualizarUtilizado':
                 $this -> cancelarActualizarUtiizado();
                 break;
            case 'mostrarInsertarUtilizado':
                $this -> mostrarInsertarUtilizado();
                break;
            case 'insertarUtilizado':
                $this -> insertarUtilizado();
                break;
            case 'eliminarUtilizado':
                $this -> eliminarUtilizado();
                break;
        }
    }
    public function listarUtilizado (){
        $gestarUtilizado = new UtilizadoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUtilizado = $gestarUtilizado -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeUtilizado'] = $registroUtilizado;
    
        header("location:principal.php?contenido=vistas/vistasUtilizado/vistaListarUtilizado.php");
    }

    public  function mostrarActualizarUtilizado(){

        $gestarUtilizado = new UtilizadoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarUtilizado= $gestarUtilizado -> seleccionarID(array($this->datos['uti_id']));

        $actualizarDatosUtilizado = $actualizarUtilizado['registroEncontrado'][0];
        

        $gestarUtilizado = new  UtilizadoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUtilizado = $gestarUtilizado -> seleccionarTodos();
    

        session_start();
        $_SESSION['actualizarDatosUtilizado']=$actualizarDatosUtilizado;

        header("location:principal.php?contenido=vistas/vistasUtilizado/vistaActualizarUtilizado.php");
        
    }

    public function confirmarActualizarUtilizado(){

        $gestarUtilizado = new UtilizadoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarUtilizado = $gestarUtilizado -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarUtilizado");	

    }

    public function cancelarActualizarUtilizado(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarUtilizado");	

    }

    public function mostrarInsertarUtilizado(){
		
        header("Location: principal.php?contenido=vistas/vistasUtilizado/vistaIngresarUtilizado.php");

}
    
    public function insertarUtilizado(){
		
        
        $buscarUtilizado = new UtilizadoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $UtilizadoHallado = $buscarUtilizado->seleccionarId(array($this->datos['uti_id']));

        if (!$UtilizadoHallado['exitoSeleccionId']) {
            $insertarRecibido = new UtilizadoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoUtilizado = $insertarUtilizado->insertar($this->datos);  

            $resultadoInsercionUtilizado = $insertoUtilizado'resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['uti_id'];
            
            header("location:Controlador.php?ruta=listarUtilizado");
            
        }else{
        
            session_start();
            $_SESSION['uti_id'] = $this->datos['uti_id'];
            $_SESSION['uti_id'] = $this->datos['uti_id'];			
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarUtilizado");					

        }					
    }	

    public function eliminarUtilizado(){
        $gestarUtilizado = new UtilizadoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarUtilizado = $gestarUtilizado -> eliminar(array($this->datos['uti_id']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarUtilizado");


    }
        
    
    
}

?>