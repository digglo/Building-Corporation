<?php

include_once PATH . 'modelos/modeloSede/sedeDAO.php';
include_once PATH . 'modelos/modeloUbicacion/ubicacionDAO.php';
include_once PATH . 'modelos/modeloConstructora/constructoraDAO.php';

class SedeControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->sedeControlador();
    }
    
    public function sedeControlador(){
        switch ($this->datos['ruta']) {
            case 'listarSede':
                $this->listarSede();
                break;
            case 'mostrarActualizarSede':
                $this->mostrarActualizarSede();
                break;
            case 'confirmarActualizarSede':
                 $this -> confirmarActualizarSede();
                break;
            case 'cancelarActualizarSede':
                 $this -> cancelarActualizarSede();
                 break;
            case 'mostrarInsertarSede':
                $this -> mostrarInsertarSede();
                break;
            case 'insertarSede':
                $this -> insertarSede();
                break;
            case 'eliminarSede':
                $this -> eliminarSede();
                break;
        }
    }
    public function listarSede(){
        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSede = $gestarSede -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeSede'] = $registroSede;
    
        header("location:principal1.php?contenido=vistas/vistasSede/listarSede.php");
    }

    public  function mostrarActualizarSede(){


        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarSede = $gestarSede -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosSede = $actualizarSede['registroEncontrado'][0];

        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroConstructora = $gestarConstructora -> seleccionarTodos();

        $gestarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUbicacion = $gestarUbicacion -> seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosSede']=$actualizarDatosSede;
        $_SESSION['listaDeConstructora'] = $registroConstructora;
        $_SESSION['listaDeUbicacion'] = $registroUbicacion;

        header("location:principal1.php?contenido=vistas/vistasConstructora/vistaActualizarConstructora.php");
        
    }

    public function confirmarActualizarSede(){

        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarSede = $gestarSede -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarSede");	

    }

    public function cancelarActualizarSede(){

        session_start();
		        header("location:Controlador.php?ruta=listarSede");	

    }

    public function mostrarInsertarSede(){

        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroConstructora = $gestarConstructora-> seleccionarTodos();

        $gestarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUbicacion = $gestarUbicacion -> seleccionarTodos();

        session_start();
        $_SESSION['listaDeConstructora'] = $registroConstructora;
        $_SESSION['listaDeUbicacion'] = $registroUbicacion;
		
        header("Location: principal1.php?contenido=vistas/vistasSede/vistaIngresarSede.php");

}
    
    public function insertarSede(){


        $buscarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $sedeHallado = $buscarSede->seleccionarId(array($this->datos['sede_id']));

        if (!$sedeHallado['exitoSeleccionId']) {
            $insertarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoSede = $insertarSede->insertar($this->datos);  

            $resultadoInsercionSede = $insertoSede['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['sede_id'];
            
            header("location:Controlador.php?ruta=listarSede");
            
        }else{
        
            session_start();
            $_SESSION['sede_id'] = $this->datos['sede_id'];
            $_SESSION['sede_nombre_sede'] = $this->datos['sede_nombre_sede'];		
            $_SESSION['sede_constructora_id'] = $this->datos['sede_constructora_id'];	
            $_SESSION['sede_ubicacion_id'] = $this->datos['sede_ubicacion_id'];	
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarSede");					

        }					
    }	

    public function eliminarSede(){
        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarSede = $gestarSede -> eliminar(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarSede");


    }
        
    
    
}

?>