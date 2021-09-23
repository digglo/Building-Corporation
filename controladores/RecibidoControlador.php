<?php

include_once PATH . 'modelos/modeloRecibido/recibidoDAO.php';

class RecibidoControlador{

    private $datos;

    public function __construct($datos){
        $this->datos = $datos;
        $this->RecibidoControlador();
    }
    
    public function RecibidoControlador(){
        switch ($this->datos['ruta']) {
            case 'listarRecibido':
                $this->listarRecibido();
                break;
            case 'mostrarActualizarRecibido':
                $this->mostrarActualizarRecibido();
                break;
            case 'confirmarActualizarRecibido':
                 $this -> confirmarActualizarRecibido();
                break;
            case 'cancelarActualizarRecibido':
                 $this -> cancelarActualizarRecibido();
                 break;
            case 'mostrarInsertarRecibido':
                $this -> mostrarInsertarRecibido();
                break;
            case 'insertarRecibido':
                $this -> insertarRecibido();
                break;
            case 'eliminarRecibido':
                $this -> eliminarRecibido();
                break;
        }
    }
    public function listarRecibido (){
        $gestarRecibido = new   RecibidoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRecibido = $gestarRecibido -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeRecibido'] = $registroRecibido;
    
        header("location:principal.php?contenido=vistas/vistasRecibido/vistaListarRecibido.php");
    }

    public  function mostrarActualizarRecibido(){

        $gestarRecibido = new RecibidoDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRecibido = $gestarRecibido -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosRecibido = $actualizarRecibido['registroEncontrado'][0];
        

        $gestarMaterialConstruccion = new   MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $materialConstruccion= $gestarMaterialConstruccion -> seleccionarTodos();
    

        session_start();
        $_SESSION['actualizarDatosRecibido']=$actualizarDatosRecibido;
        $_SESSION['listarMaterialConstruccion']=$materialConstruccion;

        header("location:principal.php?contenido=vistas/vistasRecibido/vistaActualizarRecibido.php");
        
    }

    public function confirmarActualizarRecibido(){

        $gestarRecibido = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRecibido = $gestarRecibido -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarRecibido");	

    }

    public function cancelarActualizarRecibido(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarRecibido");	

    }

    public function mostrarInsertarRecibido(){
		
        header("Location: principal.php?contenido=vistas/vistasRecibido/vistaIngresarRecibido.php");

}
    
    public function insertarRecibido(){
		
        
        $buscarRecibido = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $RecibidoHallado = $buscarRecibido->seleccionarId(array($this->datos['rec_id']));

        if (!$RecibidoHallado['exitoSeleccionId']) {
            $insertarRecibido = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoRecibido = $insertarRecibido->insertar($this->datos);  

            $resultadoInsercionRecibido = $insertoRecibido['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['rec_id'];
            
            header("location:Controlador.php?ruta=listarRecibido");
            
        }else{
        
            session_start();
            $_SESSION['rec_id'] = $this->datos['rec_id'];
            $_SESSION['rec_id'] = $this->datos['rec_id'];			
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarRecibido");					

        }					
    }	

    public function eliminarRecibido(){
        $gestarRecibido = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarRecibido = $gestarRecibido -> eliminar(array($this->datos['rec_id']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarRecibido");


    }
        
    
    
}

?>