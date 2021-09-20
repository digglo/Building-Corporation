 <?php


include_once PATH . 'controladores/IdentificacionControlador.php';
include_once PATH . 'controladores/RolControlador.php';


class ControladorPrincipal{

    private $datos = array();
    
    public function __construct(){

        if (!empty($_POST) && isset($_POST['ruta'])) {
            $this -> datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET['ruta'])) {
            $this -> datos = $_GET;
        }

        $this -> control();
    }

    public function control(){
        switch ($this->datos['ruta']) {
            case 'listarRol':
                $this -> listarRol();
                break;
            case 'mostrarActualizarRol':
                $this -> mostrarActualizarRol();
                break;
            case 'confirmarActualizarRol':
                $this -> confirmarActualizarRol();
                break;
            case 'cancelarActualizarRol':
                $this -> confirmarActualizarRol();
                break;
            case 'mostrarInsertarRol':
                $this -> mostrarInsertarRol();
                break;
            case 'insertarRol':
                $this -> insertarRol();
                break;
            case 'eliminarRol':
                $this -> eliminarRol();
                break;






            case 'listarIdentificacion':
                $this -> listarIdentificacion();
                break;
            case 'mostrarActualizarIdentificacion':
                $this -> mostrarActualizarIdentificacion();
                break;
            case 'confirmarActualizarIdentificacion':
                $this -> confirmarActualizarIdentificacion();
                break;
            case 'cancelarActualizarIdentificacion':
                $this -> confirmarActualizarIdentificacion();
                break;
            case 'mostrarInsertarIdentificacion':
                $this -> mostrarInsertarIdentificacion();
                break;
            case 'insertarIdentificacion':
                $this -> insertarIdentificacion();
                break;
            case 'eliminarIdentificacion':
                $this -> eliminarIdentificacion();
                break;
            






                
            case 'listarConstructora':
                $this -> listarConstructora();
                break;
            case 'mostrarActualizarConstructora':
                $this -> mostrarActualizarConstructora();
                break;
            case 'confirmarActualizarConstructora':
                $this -> confirmarActualizarConstructora();
                break;
            case 'cancelarActualizarConstructora':
                $this -> confirmarActualizarConstructora();
                break;
            case 'mostrarInsertarConstructora':
                $this -> mostrarInsertarConstructora();
                break;
            case 'insertarConstructora':
                $this -> insertarConstructora();
                break;
            case 'eliminarConstructora':
                $this -> eliminarConstructora();
                break;
        }
    }

   public function listarRol(){
        $rolesControlador = new RolControlador($this -> datos);
    }

    public function mostrarActualizarRol(){
        $rolesControlador = new RolControlador($this -> datos);
    }

    public function confirmarActualizarRol(){
        $rolesControlador = new RolControlador($this -> datos);
    }

    public function cancelarActualizarRol(){
        $rolesControlador = new RolControlador($this -> datos);
    }

    public function mostrarInsertarRol(){
        $rolesControlador = new RolControlador($this -> datos);
    }

    public function insertarRol(){
        $rolesControlador = new RolControlador($this -> datos);
    }

    public function eliminarRol(){
        $rolesControlador = new RolControlador($this -> datos);
    }








    public function listarIdentificacion(){
        $identificacionControlador = new IdentificacionControlador($this -> datos);
    }

    public function mostrarActualizarIdentificacion(){
        $identificacionControlador = new IdentificacionControlador($this -> datos);
    }

    public function confirmarActualizarIdentificacion(){
        $identificacionControlador = new IdentificacionControlador($this -> datos);
    }

    public function cancelarActualizarIdentificacion(){
        $identificacionControlador = new IdentificacionControlador($this -> datos);
    }

    public function mostrarInsertarIdentificacion(){
        $identificacionControlador = new IdentificacionControlador($this -> datos);
    }

    public function insertarIdentificacion(){
        $identificacionControlador = new IdentificacionControlador($this -> datos);
    }

    public function eliminarIdentificacion(){
        $identificacionControlador = new IdentificacionControlador($this -> datos);
    }







    public function listarConstructora(){
        $constructoraControlador = new ConstructoraControlador($this -> datos);
    }

    public function mostrarActualizarConstructora(){
        $constructoraControlador = new ConstructoraControlador($this -> datos);
    }

    public function confirmarActualizarConstructora(){
        $cosntructoraControlador = new ConstructoraControlador($this -> datos);
    }

    public function cancelarActualizarConstructora(){
        $constructoraControlador = new ConstructoraControlador($this -> datos);
    }

    public function mostrarInsertarConstructora(){
        $constructoraControlador = new ConstructoraControlador($this -> datos);
    }

    public function insertarConstructora(){
        $constructoraControlador = new ConstructoraControlador($this -> datos);
    }

    public function eliminarConstructora(){
        $constructoraControlador = new ConstructoraControlador($this -> datos);
    }

    
}


?>