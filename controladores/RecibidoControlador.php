<?php

include_once PATH . 'modelos/modeloRecibido/recibidoDAO.php';
include_once PATH . 'modelos/modeloMaterialConstruccion/material_ConstruccionDAO.php';

class RecibidoControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->recibidoControlador();
    }

    public function recibidoControlador() {


        switch ($this->datos['ruta']) {
            case "listarRecibido": //provisionalmente para trabajar con datatables
                $this->listarRecibido();
                break;
            case "mostrarActualizarRecibido": //provisionalmente para trabajar con datatables
                $this->mostrarActualizarRecibido();
                break;
            case "confirmarActualizarRecibido": //provisionalmente para trabajar con datatables
                $this->confirmarActualizarRecibido();
                break;
            case "cancelarActualizarRecibido": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarRecibido();
                break;
            case "mostrarInsertarRecibido": //provisionalmente para trabajar con datatables
                $this->mostrarInsertarRecibido();
                break;
            case "insertarRecibido":
                $this->insertarRecibido();
                break;
            case "cancelarInsertarRecibido":
                $this->cancelarInsertarRecibido();
                break;
            case "eliminarRecibido":
                $this->eliminarRecibido();
                break;
        }
    }

    public function listarRecibido() {

        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRecibido = $gestarRecibido->seleccionarTodos();

        session_start();

        $_SESSION['listaDeRecibidos'] = $registroRecibido;

        header("location:principal1.php?contenido=vistas/vistaRecibido/vistaListarRecibido.php");
    }

    public function mostrarActualizarRecibido() {
        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeRecibido = $gestarRecibido->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.

        $actualizarDatosRecibido = $consultaDeRecibido['registroEncontrado'][0];

        $gestarMaterialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $listarMaterialConstruccion = $gestarMaterialConstruccion->seleccionarTodos();


        session_start();
        $_SESSION['actualizarDatosRecibido'] = $actualizarDatosRecibido;
        $_SESSION['listarMaterialesConstruccion'] = $listarMaterialConstruccion;

        header("location:principal1.php?contenido=vistas/vistaRecibido/vistaActualizarRecibido.php");
    }

    public function confirmarActualizarRecibido() {
        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRecibido = $gestarRecibido->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarRecibido");
    }

    public function cancelarActualizarRecibido() {
        session_start();
        header("location:Controlador.php?ruta=listarRecibido");
    }

    public function mostrarInsertarRecibido() {

        session_start();

        header("Location: principal1.php?contenido=vistas/vistaRecibido/vistaInsertarRecibido.php");
    }

    public function insertarRecibido() {


        //Se instancia LibroDAO para insertar
        $buscarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $RecibidoHallado = $buscarRecibido->seleccionarId(array($this->datos['rec_id']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$RecibidoHallado['exitoSeleccionId']) {

            $insertarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoRecibido = $insertarRecibido->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionRecibido = $insertoRecibido['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " ;

            header("location:Controlador.php?ruta=listarRecibido");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['rec_id'] = $this->datos['rec_id'];
            $_SESSION['rec_material_construccion_id'] = $this->datos['rec_material_construccion_id'];
            $_SESSION['rec_num_factura'] = $this->datos['rec_num_factura'];
            $_SESSION['rec_cantidad_recibido'] = $this->datos['rec_cantidad_recibido'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['rec_id'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarRecibido");
        }
    }

    public function cancelarInsertarRecibido() {

        session_start();

        header("location:Controlador.php?ruta=listarRecibido");
    }

    public function eliminarRol() {
        $gestarRecibido = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $eliminarRecibido = $gestarRecibido->eliminar(array($this->datos[idAct])); //Se envía datos del libro para actualizar. 				

        session_start();
        header("location:Controlador.php?ruta=listarRecibido");
    }

}

?>