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
            case 'listarProyectoInactivos':
                $this -> listarProyectoInactivos();
                break;
            case 'habilitarProyecto':
                $this -> habilitarProyecto();
                break;
        }
    }
    public function listarProyecto(){
        $gestarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroProyecto = $gestarProyecto -> seleccionarTodos(1);
    
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

        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRecibido = $gestarRecibido -> seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosProyecto']=$actualizarDatosProyecto;
        $_SESSION['listaDeMaterialConstruccion'] = $registroMaterialConstruccion;
        $_SESSION['listaDeSede'] = $registroSede;
        $_SESSION['listaDeTrabajador'] = $registroTrabajador;
        $_SESSION['listaDeRecibido'] = $registroRecibido;

        header("location:principal.php?contenido=vistas/vistasProyecto/vistaActualizarProyecto.php");
        
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

        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRecibido = $gestarRecibido -> seleccionarTodos();

        session_start();
        $_SESSION['listaDeMaterialConstruccion'] = $registroMaterialConstruccion;
        $_SESSION['listaDeSede'] = $registroSede;
        $_SESSION['listaDeTrabajador'] = $registroTrabajador;
        $_SESSION['listaDeRecibido'] = $registroRecibido;
		
        header("Location: principal.php?contenido=vistas/vistasProyecto/vistaIngresarProyecto.php");

}
    
    public function insertarProyecto(){


        $buscarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $proyectoHallado = $buscarProyecto->seleccionarId(array($this->datos['pro_id']));

        if (!$proyectoHallado['exitoSeleccionId']) {
            $insertarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoProyecto = $insertarProyecto->insertar($this->datos);  

            $resultadoInsercionProyecto = $insertoProyecto['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['pro_id'];
            
            header("location:Controlador.php?ruta=listarProyecto");
            
        }else{
        
            session_start();
            $_SESSION['pro_id'] = $this->datos['pro_id'];
            $_SESSION['pro_nombre_proyecto'] = $this->datos['pro_nombre_proyecto'];		
            $_SESSION['pro_numero_proyecto'] = $this->datos['pro_numero_proyecto'];	
            $_SESSION['pro_descripcion_proyecto'] = $this->datos['pro_descripcion_proyecto'];		
            $_SESSION['pro_sede_id'] = $this->datos['pro_sede_id'];
            $_SESSION['pro_recibido_id'] = $this->datos['pro_recibido_id'];
            $_SESSION['material_construccion_mat_id'] = $this->datos['material_construccion_mat_id'];
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarProyecto");					

        }					
    }	

    public function eliminarProyecto(){
        $gestarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarProyecto = $gestarProyecto -> eliminarLogico(array($this->datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarProyecto");


    }

    public function listarProyectoInactivos(){
        $gestarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $listarInactivos = $gestarProyecto -> seleccionarTodos(0);

        session_start();

        $_SESSION['listaDeProyecto'] = $listarInactivos;

        header("location:principal.php?contenido=vistas/vistasProyecto/listarProyectoInactivos.php");
    }

    public function habilitarProyecto(){
        $gestarProyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarProyecto = $gestarProyecto -> habilitar(array($this -> datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Habilitado";
        header("location:Controlador.php?ruta=listarProyectoInactivos");
    }
        
    
    
}

?>