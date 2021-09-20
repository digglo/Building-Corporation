<?php

include_once PATH . 'modelos/modeloTrabajador/trabajadorDAO.php';
include_once PATH . 'modelos/modeloIdentificacion/IdentificacionDAO.php';
include_once PATH . 'modelos/modeloSede/sedeDAO.php';

class TrabajadorControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->trabajadorControlador();
    }
    
    public function trabajadorControlador(){
        switch ($this->datos['ruta']) {
            case 'listarTrabajador':
                $this->listarTrabajador();
                break;
            case 'mostrarActualizarTrabajador':
                $this->mostrarActualizarTrabajador();
                break;
            case 'confirmarActualizarTrabajador':
                 $this -> confirmarActualizarTrabajador();
                break;
            case 'cancelarActualizarTrabajador':
                 $this -> cancelarActualizarTrabajador();
                 break;
            case 'mostrarInsertarTrabajador':
                $this -> mostrarInsertarTrabajador();
                break;
            case 'insertarTrabajador':
                $this -> insertarTrabajador();
                break;
            case 'eliminarTrabajador':
                $this -> eliminarTrabajador();
                break;
        }
    }
    public function listarTrabajador(){
        $gestarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroTrabajador = $gestarTrabajador -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeTrabajador'] = $registroTrabajador;
    
        header("location:principal.php?contenido=vistas/vistasTrabajador/listarTrabajador.php");
    }

    public  function mostrarActualizarTrabajador(){

        $gestarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarTrabajador = $gestarTrabajador -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosTrabajador = $actualizarTrabajador['registroEncontrado'][0];

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroIdentificacion = $gestarIdentificacion -> seleccionarTodos();

        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSede = $gestarSede -> seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosTrabajador']=$actualizarDatosTrabajador;
        $_SESSION['listaDeIdentificacion'] = $registroIdentificacion;
        $_SESSION['listaDeSede'] = $registroSede;

        header("location:principal.php?contenido=vistas/vistasTrabajador/vistaActualizarTrabajador.php");
        
    }

    public function confirmarActualizarTrabajador(){

        $gestarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarTrabajador = $gestarTrabajador -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarTrabajador");	

    }

    public function cancelarActualizarTrabajador(){

        session_start();
		        header("location:Controlador.php?ruta=listarTrabajador");	

    }

    public function mostrarInsertarConstructora(){

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroIdentificacion = $gestarIdentificacion -> seleccionarTodos();

        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSede = $gestarSede -> seleccionarTodos();

        session_start();
        $_SESSION['listaDeIdentificacion'] = $registroIdentificacion;
        $_SESSION['listaDeUsuario'] = $registroSede;
		
        header("Location: principal.php?contenido=vistas/vistasTrabajador/vistaIngresarTrabajador.php");

}
    
    public function insertarTrabajador(){


        $buscarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $trabajadorHallado = $buscarTrabajador->seleccionarId(array($this->datos['tra_id']));

        if (!$trabajadorHallado['exitoSeleccionId']) {
            $insertarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoTrabajador = $insertarTrabajador->insertar($this->datos);  

            $resultadoInsercionTrabajador = $insertoTrabajador['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['tra_id'];
            
            header("location:Controlador.php?ruta=listarTrabajador");
            
        }else{
        
            session_start();
            $_SESSION['tra_id'] = $this->datos['tra_id'];
            $_SESSION['tra_primer_nombre'] = $this->datos['tra_primer_nombre'];		
            $_SESSION['tra_segundo_nombre'] = $this->datos['tra_segundo_nombre'];	
            $_SESSION['tra_primer_apellido'] = $this->datos['tra_primer_apellido'];		
            $_SESSION['tra_segundo_nombre'] = $this->datos['tra_segundo_nombre'];
            $_SESSION['tra_identificacion_id'] = $this->datos['tra_identificacion_id'];
            $_SESSION['tra_sede_id'] = $this->datos['tra_sede_id'];
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarTrabajador");					

        }					
    }	

    public function eliminarTrabajador(){
        $gestarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarTrabajador = $gestarTrabajador -> eliminar(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarTrabajador");


    }
        
    
    
}

?>