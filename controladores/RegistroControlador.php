<?php

include_once PATH . 'modelos/modeloRegistro/registroDAO.php';
include_once PATH . 'modelos/modeloStock/stockDAO.php';

class RegistroControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->registroControlador();
    }
    
    public function registroControlador(){
        switch ($this->datos['ruta']) {
            case 'listarRegistro':
                $this->listarRegistro();
                break;
            case 'mostrarActualizarRegistro':
                $this->mostrarActualizarRegistro();
                break;
            case 'confirmarActualizarRegistro':
                 $this -> confirmarActualizarRegistro();
                break;
            case 'cancelarActualizarRegistro':
                 $this -> cancelarActualizarRegistro();
                 break;
            case 'mostrarInsertarRegistro':
                $this -> mostrarInsertarRegistro();
                break;
            case 'insertarRegistro':
                $this -> insertarRegistro();
                break;
            case 'eliminarRegistro':
                $this -> eliminarRegistro();
                break;
        }
    }
    public function listarRegistro(){
        $gestarRegistro = new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRegistro = $gestarRegistro -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeRegistro'] = $registroRegistro;
    
        header("location:principal1.php?contenido=vistas/vistasRegistro/listarRegistro.php");
    }

    public  function mostrarActualizarRegistro(){

        $gestarRegistro = new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRegistro = $gestarRegistro -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosRegistro = $actualizarRegistro['registroEncontrado'][0];

        $gestarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroStock = $gestarStock -> seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosRegistro']=$actualizarDatosRegistro;
        $_SESSION['listaDeStock'] = $registroStock;

        header("location:principal1.php?contenido=vistas/vistasRegistro/vistaActualizarRegistro.php");
        
    }

    public function confirmarActualizarRegistro(){

        $gestarRegistro = new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRegistro = $gestarRegistro -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarRegistro");	

    }

    public function cancelarActualizarRegistro(){

        session_start();
		        header("location:Controlador.php?ruta=listarRegistro");	

    }

    public function mostrarInsertarRegistro(){

        $gestarStock = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroStock = $gestarStock -> seleccionarTodos();

        session_start();
        $_SESSION['listaDeStock'] = $registroStock;
		
        header("Location: principal1.php?contenido=vistas/vistasRegistro/vistaIngresarRegistro.php");

}
    
    public function insertarRegistro(){


        $buscarRegistro = new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $registroHallado = $buscarRegistro->seleccionarId(array($this->datos['reg_id']));

        if (!$registroHallado['exitoSeleccionId']) {
            $insertarRegistro = new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoRegistro = $insertarRegistro->insertar($this->datos);  

            $resultadoInsercionRegistro = $insertoRegistro['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['reg_id'];
            
            header("location:Controlador.php?ruta=listarRegistro");
            
        }else{
        
            session_start();
            $_SESSION['reg_id'] = $this->datos['reg_id'];
            $_SESSION['reg_numero_registro'] = $this->datos['reg_numero_registro'];		
            $_SESSION['reg_comentarios'] = $this->datos['reg_comentarios'];	
            $_SESSION['reg_stock_id'] = $this->datos['reg_stock_id'];	
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarRegistro");					

        }					
    }	

    public function eliminarRegistro(){
        $gestarRegistro = new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarRegistro = $gestarRegistro -> eliminar(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarRegistro");


    }
        
    
    
}

?>