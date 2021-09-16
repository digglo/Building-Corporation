<?php

include_once PATH . 'modelos/modeloUtilizado/utilizadoDAO.php';

class UtilizadoControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->rolControlador();
    }

    public function rolControlador() {


        switch ($this->datos['ruta']) {
            case "listarUtilizado": //provisionalmente para trabajar con datatables
                $this->listarUtilizado();
                break;
            case "mostrarActualizarUtilizado": //provisionalmente para trabajar con datatables
                $this->mostrarActualizarUtilizado();
                break;
            case "confirmarActualizarUtilizado": //provisionalmente para trabajar con datatables
                $this->confirmarActualizarUtilizado();
                break;
            case "cancelarActualizarUtilizado": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarUtilizado();
                break;
            case "mostrarInsertarUtilizado": //provisionalmente para trabajar con datatables
                $this->mostrarInsertarUtilizado();
                break;
            case "insertarUtilizado":
                $this->insertarUtilizado();
                break;
            case "cancelarInsertarUtilizado":
                $this->cancelarInsertarUtilizado();
                break;
            case "eliminarUtilizado":
                $this->eliminarUtilizado();
                break;
        }
    }

    public function listarUtilizado() {
        $gestarUtitlizado  = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUtilizado = $gestarUtitlizado->seleccionarTodos();

        session_start();

        $_SESSION['listaDeUtilizados'] = $registroUtilizado;

        header("location:principal1.php?contenido=vistas/vistaUtilizado/vistaListarUtilizado.php");
    }

    public function mostrarActualizarUtilizado() {
        $gestarUtilizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeUtilizado = $gestarUtilizado->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.

        $actualizarDatosUtilizado = $consultaDeUtilizado['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosUtilizado'] = $actualizarDatosUtilizado;

        header("location:principal1.php?contenido=vistas/vistaUtilizado/vistaActualizarUtilizado.php");
    }

    public function confirmarActualizarUtilizado() {
        $gestarUtilizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarUtilizado = $gestarUtilizado->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarUtilizado");
    }

    public function cancelarActualizarUtilizado() {
        session_start();
        header("location:Controlador.php?ruta=listarUtilizado");
    }

    public function mostrarInsertarUtilizado() {

        session_start();

        header("Location: principal1.php?contenido=vistas/vistaUtilizado/vistaInsertarUtilizado.php");
    }

    public function insertarUtilizado() {

        //Se instancia LibroDAO para insertar
        $buscarUtilizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $utilizadoHallado = $buscarUtilizado->seleccionarId(array($this->datos['uti_id']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$utilizadoHallado['exitoSeleccionId']) {
            $insertarUtilizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoUtilizado = $insertarUtilizado->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionUtilizado = $insertoUtilizado['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " ;

            header("location:Controlador.php?ruta=listarUtilizado");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['uti_id'] = $this->datos['uti_id'];
            $_SESSION['uti_cantidad_utilizado'] = $this->datos['uti_cantidad_utilizado'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['uti_id'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarUtilizado");
        }
    }

    public function cancelarInsertarUtilizado() {

        session_start();

        header("location:Controlador.php?ruta=listarUtilizado");
    }

    public function eliminarUtilizado() {
        $gestarUtilizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $eliminarUtilizado = $gestarUtilizado->eliminar(array($this->datos[idAct])); //Se envía datos del libro para actualizar. 				

        session_start();
        header("location:Controlador.php?ruta=listarUtilizado");
    }

}

?>