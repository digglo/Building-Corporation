<?php

include_once PATH . 'modelos/modeloMaterialConstruccion/material_ConstruccionDAO.php';

class Material_contruccionControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->material_construccionControlador();
    }
    
    public function material_construccionControlador(){
        switch ($this->datos['ruta']) {
            case 'listarMaterial_construccion':
                $this->listarMaterial_construccion();
                break;
            case 'mostrarActualizarMaterial_construccion':
                $this->mostrarActualizarMaterial_construccion();
                break;
            case 'confirmarActualizarMaterial_construccion':
                 $this -> confirmarActualizarMaterial_construccion();
                break;
            case 'cancelarActualizarMaterial_construccion':
                 $this -> cancelarActualizarMaterial_construccion();
                 break;
            case 'mostrarInsertarMaterial_construccion':
                $this -> mostrarInsertarMaterial_construccion();
                break;
            case 'insertarMaterial_construccion':
                $this -> insertarMaterial_construccion();
                break;
            case 'eliminarMaterial_construccion':
                $this -> eliminarMaterial_construccion();
                break;
        }
    }
    public function listarMaterial_construccion (){
        $gestarMaterial_construccion = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroMaterial_construccion = $gestarMaterial_construccion -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeMaterial_construccion'] = $registroMaterial_construccion;
    
        header("location:principal.php?contenido=vistas/vistasMaterial_construccion/listarRegistroMaterial_construccion.php");
    }

    public  function mostrarActualizarMaterial_construccion(){

        $gestarMaterial_construccion = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarMaterial_construccion = $gestarMaterial_construccion -> seleccionarID(array($this->datos['matId']));

        $actualizarDatosMaterial_construccion = $actualizarMaterial_construccion['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosMaterial_construccion']=$actualizarDatosMaterial_construccion;

        header("location:principal.php?contenido=vistas/vistasMaterial_construccion/vistaActualizarMaterial_construccion.php");
        
    }

    public function confirmarActualizarMaterial_construccion(){

        $gestarMaterial_construccion = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarMaterial_construccion = $gestarMaterial_construccion -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarMaterial_construccion");	

    }

    public function cancelarActualizarMaterial_construccion(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarMaterial_construccion");	

    }

    public function mostrarInsertarMaterial_construccion(){
		
        header("Location: principal.php?contenido=vistas/vistasMaterial_construccion/vistaIngresarMaterial_construccion.php");

}
    
    public function insertarMaterial_construccion(){
		
        
        $buscarMaterial_construccion = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        $material_construccionHallado = $buscarMaterial_construccion->seleccionarId(array($this->datos['mat_id']));

        if (!$material_construccionHallado['exitoSeleccionId']) {
            $insertarMaterial_construccion = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoMaterial_construccion = $insertarMaterial_construccion->insertar($this->datos);  

            $resultadoInsercionMaterial_construccion = $insertoMaterial_construccion['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['mat_id'];
            
            header("location:Controlador.php?ruta=listarMaterial_construccion");
            
        }else{
        
            session_start();
            $_SESSION['mat_id'] = $this->datos['mat_id'];
            $_SESSION['mat_id'] = $this->datos['mat_id'];			
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarMaterial_construccion");					

        }					
    }	

    public function eliminarMaterial_construccion(){
        $gestarMaterial_construccion = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $inhabilitarMaterial_construccion = $gestarMaterial_construccion -> eliminar(array($this->datos['mat_id']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarMaterial_construccion");


    }
        
    
    
}

?>