<?php

include_once PATH . 'modelos/modeloStock/stockDAO.php';
include_once PATH . 'modelos/modeloRecibido/recibidoDAO.php';
include_once PATH . 'modelos/modeloUtilizado/utilizadoDAO.php';

class StockControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->stockControlador();
    }
    
    public function stockControlador(){
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
                 $this -> cancelarActualizarStock();
                 break;
            case 'mostrarInsertarStock':
                $this -> mostrarInsertarStock();
                break;
            case 'insertarStock':
                $this -> insertarStock();
                break;
            case 'eliminarStock':
                $this -> eliminarStock();
                break;
        }
    }
    public function listarStock(){
        $gestarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroStock = $gestarStock -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeStock'] = $registroStock;
    
        header("location:principal.php?contenido=vistas/vistasStock/listarStock.php");
    }

    public  function mostrarActualizarStock(){

        $gestarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarStock = $gestarStock -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosStock = $actualizarStock['registroEncontrado'][0];

        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRecibido = $gestarRecibido -> seleccionarTodos();

        $gestarUtilizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUtilizado = $gestarUtilizado -> seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosStock']=$actualizarDatosStock;
        $_SESSION['listaDeRecibido'] = $registroRecibido;
        $_SESSION['listaDeUtilizado'] = $registroUtilizado;

        header("location:principal.php?contenido=vistas/vistasStock/vistaActualizarStock.php");
        
    }

    public function confirmarActualizarStock(){

        $gestarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarStock = $gestarStock -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarStock");	

    }

    public function cancelarActualizarStock(){

        session_start();
		        header("location:Controlador.php?ruta=listarStock");	

    }

    public function mostrarInsertarStock(){

        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRecibido = $gestarRecibido -> seleccionarTodos();

        $gestarUtilizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUtilizado = $gestarUtilizado -> seleccionarTodos();

        session_start();
        $_SESSION['listaDeRecibido'] = $registroRecibido;
        $_SESSION['listaDeUtilizado'] = $registroUtilizado;
		
        header("Location: principal.php?contenido=vistas/vistasStock/vistaIngresarStock.php");

}
    
    public function insertarStock(){


        $buscarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $stockHallado = $buscarStock->seleccionarId(array($this->datos['sto_id']));

        if (!$stockHallado['exitoSeleccionId']) {
            $insertarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoStock = $insertarStock->insertar($this->datos);  

            $resultadoInsercionStock = $insertoStock['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['sto_id'];
            
            header("location:Controlador.php?ruta=listarStock");
            
        }else{
        
            session_start();
            $_SESSION['sto_id'] = $this->datos['sto_id'];
            $_SESSION['sto_cantidad_almacenada'] = $this->datos['sto_cantidad_almacenada'];		
            $_SESSION['sto_utilizado_id'] = $this->datos['sto_utilizado_id'];	
            $_SESSION['sto_recibido_id'] = $this->datos['sto_recibido_id'];	
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarStock");					

        }					
    }	

    public function eliminarStock(){
        $gestarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarStock = $gestarStock -> eliminar(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarStock");


    }
        
    
    
}

?>