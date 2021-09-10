<?php

include_once PATH . 'controladores/RolControlador.php';
include_once PATH . 'controladores/TipoDocumentoControlador.php';
include_once PATH . 'controladores/ConstructoraControlador.php';

class ControladorPrincipal {

    private $datos = array();

    public function __construct() {

        if (!empty($_POST) && isset($_POST["ruta"])) {
            $this->datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET["ruta"])) {
            $this->datos = $_GET;
        }

        $this->control();
    }

    public function control() {
		
        switch ($this->datos['ruta']) {	
            case "listarRoles":
                $this->listarRoles();
                break;
            case "mostrarActualizarRol":
                $this->mostrarActualizarRol();
                break;
            case "confirmarActualizarRol":
                $this->confirmarActualizarRol();
                break;
            case "cancelarActualizarRol":
                $this->cancelarActualizarRol();
                break;
            case "mostrarInsertarRol":
                $this->mostrarInsertarRol();
                break;
            case "insertarRol":
                $this->insertarRol();
                break;
            case "cancelarInsertarLibro":
                $this->cancelarInsertarRol();
                break;
            case "eliminarRol":
                $this->eliminarRol();
                break;


            case "listarTipoDocumento":
                $this->listarTipoDocumento();
                break;
            case "mostrarActualizarTipoDocumento":
                $this->mostrarActualizarTipoDocumento();
                 break;
            case "confirmarActualizarTipoDocumento":
                $this->confirmarActualizarTipoDocumento();
                break;
            case "cancelarActualizarTipoDocumento":
                $this->cancelarActualizarTipoDocumento();
                break;
            case "mostrarInsertarTipoDocumento":
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

    public function listarRoles() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function mostrarActualizarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function cancelarActualizarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function mostrarInsertarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function insertarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function cancelarInsertarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function eliminarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }





    public function listarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }

    public function mostrarActualizarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }

    public function confirmarActualizarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }

    public function cancelarActualizarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }

    public function mostrarInsertarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }

    public function insertarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }

    public function cancelarInsertarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }

    public function eliminarTipoDocumento() {

        $usuario_sControlador = new TipoDocumentoControlador($this->datos);
    }






    public function listarConstrutora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }

    public function mostrarActualizarConstructora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }

    public function confirmarActualizarConstructora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }

    public function cancelarActualizarConstructora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }

    public function mostrarInsertarConstructora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }

    public function insertarConstructora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }

    public function cancelarInsertarConstructora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }

    public function eliminarConstructora() {

        $ConstuctoraControlador = new ConstuctoraControlador($this->datos);
    }
}

?>