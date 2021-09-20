<?php

include_once PATH . 'modelos/modeloConstructora/constructoraDAO.php';
include_once PATH . 'modelos/modeloIdentificacion/IdentificacionDAO.php';
include_once PATH . 'modelos/modeloUsuario_s/Usuario_SDAO.php';

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
        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroConstructora = $gestarConstructora -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeConstructora'] = $registroConstructora;
    
        header("location:principal.php?contenido=vistas/vistasConstructora/listarConstructora.php");
    }

    public  function mostrarActualizarConstructora(){

        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarConstructora = $gestarConstructora -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosConstructora = $actualizarConstructora['registroEncontrado'][0];

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroIdentificacion = $gestarIdentificacion -> seleccionarTodos();

        $gestarUsuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuario = $gestarUsuario -> seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosConstructora']=$actualizarDatosConstructora;
        $_SESSION['listaDeIdentificacion'] = $registroIdentificacion;
        $_SESSION['listaDeUsuario'] = $registroUsuario;

        header("location:principal.php?contenido=vistas/vistasConstructora/vistaActualizarConstructora.php");
        
    }

    public function confirmarActualizarConstructora(){

        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarConstructora = $gestarConstructora -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarConstructora");	

    }

    public function cancelarActualizarConstructora(){

        session_start();
		        header("location:Controlador.php?ruta=listarConstructora");	

    }

    public function mostrarInsertarConstructora(){

        $gestarIdentificacion = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroIdentificacion = $gestarIdentificacion -> seleccionarTodos();

        $gestarUsuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuario = $gestarUsuario -> seleccionarTodos();

        session_start();
        $_SESSION['listaDeIdentificacion'] = $registroIdentificacion;
        $_SESSION['listaDeUsuario'] = $registroUsuario;
		
        header("Location: principal.php?contenido=vistas/vistasConstructora/vistaIngresarConstructora.php");

}
    
    public function insertarConstructora(){


        $buscarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $cosntructoraHallado = $buscarConstructora->seleccionarId(array($this->datos['con_id']));

        if (!$cosntructoraHallado['exitoSeleccionId']) {
            $insertarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoConstructora = $insertarConstructora->insertar($this->datos);  

            $resultadoInsercionConstructora = $insertoConstructora['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['con_id'];
            
            header("location:Controlador.php?ruta=listarConstructora");
            
        }else{
        
            session_start();
            $_SESSION['con_id'] = $this->datos['con_id'];
            $_SESSION['con_nombre_empresa'] = $this->datos['con_nombre_empresa'];		
            $_SESSION['con_numero_documento'] = $this->datos['con_numero_documento'];	
            $_SESSION['con_id_identificacion'] = $this->datos['con_id_identificacion'];		
            $_SESSION['usuario_s_usuld'] = $this->datos['usuario_s_usuld'];
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarIdentificacion");					

        }					
    }	

    public function eliminarConstructora(){
        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarConstructora = $gestarConstructora -> eliminar(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarIdentificacion");


    }
        
    
    
}

?>