<?php

include_once PATH . 'modelos/modeloProyecto/proyectoDAO.php';
include_once PATH . 'modelos/modeloMaterialConstruccion/material_ConstruccionDAO.php';
include_once PATH . 'modelos/modeloSede/sedeDAO.php';
include_once PATH . 'modelos/modeloTrabajador/trabajadorDAO.php';

class ProyectoControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->proyectoControlador();
    }
    
    public function proyectoControlador(){
        switch ($this->datos['ruta']) {
            case 'listarProyecto':
                $this->listarProyecto();
                break;
            case 'mostrarActualizarProyecto':
                $this->mostrarActualizarProyecto();
                break;
            case 'confirmarActualizarProyecto':
                 $this -> confirmarActualizarProyecto();
                break;
            case 'cancelarActualizarProyecto':
                 $this -> cancelarActualizarProyecto();
                 break;
            case 'mostrarInsertarProyecto':
                $this -> mostrarInsertarProyecto();
                break;
            case 'insertarProyecto':
                $this -> insertarProyecto();
                break;
            case 'eliminarProyecto':
                $this -> eliminarProyecto();
                break;
        }
    }
    public function listarProyecto(){
        $gestarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroProyecto = $gestarProyecto -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeProyecto'] = $registroProyecto;
    
        header("location:principal.php?contenido=vistas/vistasProyecto/listarProyecto.php");
    }

    public  function mostrarActualizarProyecto(){

        $gestarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarProyecto = $gestarProyecto -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosProyecto = $actualizarProyecto['registroEncontrado'][0];

        $gestarMaterialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroMaterialConstruccion = $gestarMaterialConstruccion -> seleccionarTodos();

        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSede = $gestarSede -> seleccionarTodos();

        $gestarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroTrabajador = $gestarTrabajador -> seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosProyecto']=$actualizarDatosProyecto;
        $_SESSION['listaDeMaterialConstruccion'] = $registroMaterialConstruccion;
        $_SESSION['listaDeSede'] = $registroSede;
        $_SESSION['listaDeTrabajador'] = $registroTrabajador;

        header("location:principal.php?contenido=vistas/vistasTrabajador/vistaActualizarTrabajador.php");
        
    }

    public function confirmarActualizarProyecto(){

        $gestarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarProyecto = $gestarProyecto -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarProyecto");	

    }

    public function cancelarActualizarProyecto(){

        session_start();
		        header("location:Controlador.php?ruta=listarProyecto");	

    }

    public function mostrarInsertarProyecto(){

        $gestarMaterialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroMaterialConstruccion = $gestarMaterialConstruccion -> seleccionarTodos();

        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSede = $gestarSede -> seleccionarTodos();

        $gestarTrabajador = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroTrabajador = $gestarTrabajador -> seleccionarTodos();

        session_start();
        $_SESSION['listaDeMaterialConstruccion'] = $registroMaterialConstruccion;
        $_SESSION['listaDeSede'] = $registroSede;
        $_SESSION['listaDeTrabajador'] = $registroTrabajador;
		
        header("Location: principal.php?contenido=vistas/vistasProyecto/vistaIngresarProyecto.php");

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