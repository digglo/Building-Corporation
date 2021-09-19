 <?php


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

    
}


?>