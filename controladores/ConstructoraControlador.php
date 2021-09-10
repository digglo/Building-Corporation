<?php

include_once PATH . 'modelos/modeloConstructora/constructoraDAO.php';
include_once PATH . 'modelos/modeloUsuario_s/Usuario_SDAO.php';
include_once PATH . 'modelos/modeloTipoDocumento/tipoDocumentoDAO.php';

class ConstuctoraControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->constructoraControlador();
    }

    public function constructoraControlador() {


        switch ($this->datos['ruta']) {
            case "listarConstrutora":
                $this->listarConstrutora();
                break;
            case "mostrarActualizarConstructora":
                $this->mostrarActualizarConstructora();
                break;
            case "confirmarActualizarConstructora":
                $this->confirmarActualizarConstructora();
                break;
            case "cancelarActualizarConstructora":
                $this->cancelarActualizarConstructora();
                break;
            case "mostrarInsertarConstructora":
                $this->mostrarInsertarConstructora();
                break;
            case "insertarConstructora":
                $this->insertarConstructora();
                break;
            case "cancelarInsertarConstructora":
                $this->cancelarInsertarConstructora();
                break;
            case "eliminarConstructora":
                $this->eliminarConstructora();
                break;
        }
    }

    public function listarConstrutora() {

        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroConstructora = $gestarConstructora->seleccionarTodos();

        session_start();

        $_SESSION['listaDeConstructora'] = $registroConstructora;

        header("location:principal1.php?contenido=vistas/vistaConstructora/vistaListarRegistroConstructora.php");
    }

    public function mostrarActualizarConstructora() {
        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeConstructora = $gestarConstructora->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.

        $actualizarDatosConstructora = $consultaDeConstructora['registroEncontrado'][0];

        $gestarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $listarConstructora = $gestarTipoDocumento->seleccionarTodos();

        $gestarUsuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $listarUsuario = $gestarUsuario->seleccionarTodos();


        session_start();
        $_SESSION['actualizarDatosConstructora'] = $actualizarDatosConstructora;
        $_SESSION['actualizarDatosTipoDocumento'] = $listarConstructora;
        $_SESSION['actualizarDatosUsuario'] = $listarUsuario;

        header("location:principal1.php?contenido=vistas/vistaConstructora/vistaActualizarConstructora.php");
    }

    public function confirmarActualizarConstructora() {
        $gestarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarDatosConstructora = $gestarConstructora->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarConstrutora");
    }

    public function cancelarActualizarConstructora() {
        session_start();
        header("location:Controlador.php?ruta=listarConstrutora");
    }

    public function mostrarInsertarConstructora() {

        session_start();

        header("Location: principal1.php?contenido=vistas/vistaTipoDocumento/vistaInsertarTipoDocumento.php");
    }

    public function insertarConstructora() {

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

    public function cancelarInsertarConstructora() {

        session_start();

        header("location:Controlador.php?ruta=listarTipoDocumento");
    }

    public function eliminarConstructora() {
        $gestarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $eliminarTipoDocumento = $gestarTipoDocumento->eliminar(array($this->datos[idAct])); //Se envía datos del libro para actualizar. 				

        session_start();
        header("location:Controlador.php?ruta=listarTipoDocumento");
    }

}

?>