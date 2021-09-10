<?php

include_once PATH . 'modelos/modeloTipoDocumento/tipoDocumentoDAO.php';

class TipoDocumentoControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->tipoDocumentoControlador();
    }

    public function tipoDocumentoControlador() {


        switch ($this->datos['ruta']) {
            case "listarTipoDocumento": //provisionalmente para trabajar con datatables
                $this->listarTipoDocumento();
                break;
            case "mostrarActualizarTipoDocumento": //provisionalmente para trabajar con datatables
                $this->mostrarActualizarTipoDocumento();
                break;
            case "confirmarActualizarTipoDocumento": //provisionalmente para trabajar con datatables
                $this->confirmarActualizarTipoDocumento();
                break;
            case "cancelarActualizarTipoDocumento": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarTipoDocumento();
                break;
            case "mostrarInsertarTipoDocumento": //provisionalmente para trabajar con datatables
                $this->mostrarInsertarTipoDocumento();
                break;
            case "insertarTipoDocumento":
                $this->insertarTipoDocumento();
                break;
            case "cancelarInsertarTipoDocumento":
                $this->cancelarInsertarTipoDocumento();
                break;
            case "eliminarTipoDocumento":
                $this->eliminarTipoDocumento();
                break;
        }
    }

    public function listarTipoDocumento() {

        $gestarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroTipoDocumento = $gestarTipoDocumento->seleccionarTodos();

        session_start();

        $_SESSION['listaDeTiposDeDocumento'] = $registroTipoDocumento;

        header("location:principal1.php?contenido=vistas/vistaTipoDocumento/vistaListarRegistroTipoDocumento.php");
    }

    public function mostrarActualizarTipoDocumento() {
        $gestarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeTipoDocumento = $gestarTipoDocumento->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.

        $actualizarDatosTipoDocumento = $consultaDeTipoDocumento['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosTipoDocumento'] = $actualizarDatosTipoDocumento;

        header("location:principal1.php?contenido=vistas/vistaTipoDocumento/vistaActualizarTipoDocumento.php");
    }

    public function confirmarActualizarTipoDocumento() {
        $gestarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarTipoDocumento = $gestarTipoDocumento->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarTipoDocumento");
    }

    public function cancelarActualizarTipoDocumento() {
        session_start();
        header("location:Controlador.php?ruta=listarTipoDocumento");
    }

    public function mostrarInsertarTipoDocumento() {

        session_start();

        header("Location: principal1.php?contenido=vistas/vistaTipoDocumento/vistaInsertarTipoDocumento.php");
    }

    public function insertarTipoDocumento() {

        //Se instancia LibroDAO para insertar
        $buscarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $tipoDocumentoHallado = $buscarTipoDocumento->seleccionarId(array($this->datos['tip_id']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$tipoDocumentoHallado['exitoSeleccionId']) {
            $insertarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoTipoDocumento = $insertarTipoDocumento->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionTipoDocumento = $insertoTipoDocumento['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " ;

            header("location:Controlador.php?ruta=listarTipoDocumento");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['tip_id'] = $this->datos['tip_id'];
            $_SESSION['tip_nombre_documento'] = $this->datos['tip_nombre_documento'];
            $_SESSION['tip_sigla'] = $this->datos['tip_sigla'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['tip_id'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarTipoDocumento");
        }
    }

    public function cancelarInsertarTipoDocumento() {

        session_start();

        header("location:Controlador.php?ruta=listarTipoDocumento");
    }

    public function eliminarTipoDocumento() {
        $gestarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $eliminarTipoDocumento = $gestarTipoDocumento->eliminar(array($this->datos[idAct])); //Se envía datos del libro para actualizar. 				

        session_start();
        header("location:Controlador.php?ruta=listarTipoDocumento");
    }

}

?>