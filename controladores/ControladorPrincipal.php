<?php

include_once PATH . 'controladores/RolControlador.php';
include_once PATH . 'controladores/TipoDocumentoControlador.php';
include_once PATH . 'controladores/ConstructoraControlador.php';
include_once PATH . 'controladores/RecibidoControlador.php';
include_once PATH . 'controladores/UtilizadoControlador.php';

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
                $this->listarRol();
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



<<<<<<< HEAD
            case "listarSede":
                $this->listarSede();
                break;
            case "mostrarActualizarSede":
                $this->mostrarActualizarSede();
                break;
            case "confirmarActualizarSede":
                $this->confirmarActualizarSede();
                break;
            case "cancelarActualizarSede":
                $this->cancelarActualizarSede();
                break;
            case "mostrarInsertarSede":
                $this->mostrarInsertarSede();
                break;
            case "insertarSede":
                $this->insertarSede();
                break;
            case "cancelarInsertarSede":
                $this->cancelarInsertarSede();
                break;
            case "eliminarSede":
                $this->eliminarSede();
                break;
                
                

                

            case "listarUbicacion":
                $this->listarUbicacion();
                break;
            case "mostrarActualizarUbicacion":
                $this->mostrarActualizarUbicacion();
                break;
            case "confirmarActualizarUbicacion":
                $this->confirmarActualizarUbicacion();
                break;
            case "cancelarActualizarUbicacion":
                $this->cancelarActualizarUbicacion();
                break;
            case "mostrarInsertarUbicacion":
                $this->mostrarInsertarUbicacion();
                break;
            case "insertarUbicacion":
                $this->insertarUbicacion();
                break;
            case "cancelarInsertarUbicacion":
                $this->cancelarInsertarUbicacion();
                break;
            case "eliminarUbicacion":
                $this->eliminarUbicacion();
                break;    
        
=======

            case "listarRecibido":
                $this->listarRecibido();
                break;
            case "mostrarActualizarRecibido":
                $this->mostrarActualizarRecibido();
                break;
            case "confirmarActualizarRecibido":
                $this->confirmarActualizarRecibido();
                break;
            case "cancelarActualizarRecibido":
                $this->cancelarActualizarRecibido();
                break;
            case "mostrarInsertarRecibido":
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




            case "listarUtilizado":
                $this->listarUtilizado();
                break;
            case "mostrarActualizarUtilizado":
                $this->mostrarActualizarUtilizado();
                break;
            case "confirmarActualizarUtilizado":
                $this->confirmarActualizarUtilizado();
                break;
            case "cancelarActualizarUtilizado":
                $this->cancelarActualizarUtilizado();
                break;
            case "mostrarInsertarUtilizado":
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
>>>>>>> main
        }
    }

    public function listarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function mostrarActualizarRol() {

        $usuario_sControlador = new RolControlador($this->datos);
    }

    public function confirmarActualizarRol() {

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



<<<<<<< HEAD
      


=======

 
>>>>>>> main
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




<<<<<<< HEAD
    public function listarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }

    public function mostrarActualizarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }
    
    public function confirmarActualizarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }

    public function cancelarActualizarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }

    public function mostrarInsertarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }

    public function insertarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }

    public function cancelarInsertarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }

    public function eliminarSede() {

        $usuario_sControlador = new sedeControlador($this->datos);
    }


        public function listarUbicacion() {

            $usuario_sControlador = new UbicacionControlador($this->datos);
        }
    
        public function mostrarActualizarUbicacion() {
    
            $usuario_sControlador = new UbicacionControlador($this->datos);
        }

        public function confirmarActualizarUbicacion() {

            $usuario_sControlador = new UbicacionControlador($this->datos);
        }
    
        public function cancelarActualizarUbicacion() {
    
            $usuario_sControlador = new UbicacionControlador($this->datos);
        }
    
        public function mostrarInsertarUbicacion() {
    
            $usuario_sControlador = new UbicacionControlador($this->datos);
        }
    
        public function insertarUbicacion() {
    
            $usuario_sControlador = new UbicacionControlador($this->datos);
        }
    
        public function cancelarInsertarUbicacion() {
    
            $usuario_sControlador = new UbicacionControlador($this->datos);
        }
    
        public function eliminarUbicacion() {
    
            $usuario_sControlador = new UbicacionControlador($this->datos);
        }    



        
=======

    public function listarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }

    public function mostrarActualizarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }

    public function confirmarActualizarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }

    public function cancelarActualizarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }

    public function mostrarInsertarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }

    public function insertarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }

    public function cancelarInsertarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }

    public function eliminarRecibido() {

        $ConstuctoraControlador = new RecibidoControlador($this->datos);
    }





    public function listarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }

    public function mostrarActualizarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }

    public function confirmarActualizarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }

    public function cancelarActualizarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }

    public function mostrarInsertarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }

    public function insertarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }

    public function cancelarInsertarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }

    public function eliminarUtilizado() {

        $ConstuctoraControlador = new UtilizadoControlador($this->datos);
    }
>>>>>>> main
}

?>



