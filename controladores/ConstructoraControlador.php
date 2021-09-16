<?php

include_once '../modelos/modeloConstructora/constructoraDAO.php';
include_once '../modelos/modeloUsuario_s/Usuario_SDAO.php';
include_once '../modelos/modeloTipoDocumento/tipoDocumentoDAO.php';

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
        $actualizarDatosConstructora = $gestarConstructora->actualizar(array($this->datos)); 		

        session_start();
        header("location:Controlador.php?ruta=listarConstrutora");
    }

    public function cancelarActualizarConstructora() {
        session_start();
        header("location:Controlador.php?ruta=listarConstrutora");
    }

    public function mostrarInsertarConstructora() {

        $gestarTipoDocumento = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $listarTipoDocumento = $gestarTipoDocumento->seleccionarTodos();

        $gestarUsuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $listarUsuario = $gestarUsuario->seleccionarTodos();

        session_start();
        $_SESSION['actualizarDatosTipoDocumento'] = $listarTipoDocumento;
        $_SESSION['actualizarDatosUsuario'] = $listarUsuario;

        header("Location: principal1.php?contenido=vistas/vistaConstructora/vistaInsertarConstructora.php");
    }

    public function insertarConstructora() {

        //Se instancia LibroDAO para insertar
        $buscarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $constructoraHallado = $buscarConstructora->seleccionarId(array($this->datos['con_id']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$constructoraHallado['exitoSeleccionId']) {
            $insertarConstructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoConstructora = $insertarConstructora->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionTipoDocumento = $insertoTipoDocumento['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " ;

            header("location:Controlador.php?ruta=listarConstrutora");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['con_id'] = $this->datos['con_id'];
            $_SESSION['con_nombre_empresa'] = $this->datos['con_nombre_empresa'];
            $_SESSION['con_numero_documento'] = $this->datos['con_numero_documento'];
            $_SESSION['con_id_tipo_documento'] = $this->datos['con_id_tipo_documento'];
            $_SESSION['usuario_s_usuId'] = $this->datos['usuario_s_usuId'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['con_id'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarConstructora");
        }
    }

    public function cancelarInsertarConstructora() {

        session_start();

        header("location:Controlador.php?ruta=listarTipoDocumento");
    }

    public function eliminarConstructora() {
        $gestarTipoDocumento = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $eliminarTipoDocumento = $gestarTipoDocumento->eliminar(array($this->datos[idAct])); //Se envía datos del libro para actualizar. 				

        session_start();
        header("location:Controlador.php?ruta=listarConstrutora");
    }

}

?>