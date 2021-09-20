<?php


include_once PATH . 'controladores/IdentificacionControlador.php';
include_once PATH . 'controladores/RolControlador.php';
include_once PATH . 'controladores/Material_construccionControlador.php';

class ControladorPrincipal
{


    private $datos = array();

    public function __construct()
    {

        if (!empty($_POST) && isset($_POST['ruta'])) {
            $this->datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET['ruta'])) {
            $this->datos = $_GET;
        }

        $this->control();
    }

    public function control()
    {
        switch ($this->datos['ruta']) {
            case 'listarRol':
                $this->listarRol();
                break;
            case 'mostrarActualizarRol':
                $this->mostrarActualizarRol();
                break;
            case 'confirmarActualizarRol':
                $this->confirmarActualizarRol();
                break;
            case 'cancelarActualizarRol':
                $this->confirmarActualizarRol();
                break;
            case 'mostrarInsertarRol':
                $this->mostrarInsertarRol();
                break;
            case 'insertarRol':
                $this->insertarRol();
                break;
            case 'eliminarRol':
                $this->eliminarRol();
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
                
           
            case 'listarMaterial_construccion':
                $this->listarMaterial_construccion();
                break;
            case 'mostrarActualizarMaterial_construccion':
                $this->mostrarActualizarMaterial_construccion();
                break;
            case 'confirmarActualizarMaterial_construccion':
                $this->confirmarActualizarMaterial_construccion();
                break;
            case 'cancelarActualizarMaterial_construccion':
                $this->cancelarActualizarMaterial_construccion();
                break;
            case 'mostrarInsertarMaterial_construccion':
                $this->mostrarInsertarMaterial_construccion();
                break;
            case 'insertarMaterial_construccion':
                $this->insertarMaterial_construccion();
                break;
            case 'eliminarMaterial_construccion':
                $this->eliminarMaterial_construccion();
                break;
            case 'gestionDeAcceso':
                $this->gestionDeAccesoMaterial_construccion();
                break;


        }
    }

    public function listarRol()
    {
        $rolesControlador = new RolControlador($this->datos);
    }

    public function mostrarActualizarRol()
    {
        $rolesControlador = new RolControlador($this->datos);
    }

    public function confirmarActualizarRol()
    {
        $rolesControlador = new RolControlador($this->datos);
    }

    public function cancelarActualizarRol()
    {
        $rolesControlador = new RolControlador($this->datos);
    }

    public function mostrarInsertarRol()
    {
        $rolesControlador = new RolControlador($this->datos);
    }

    public function insertarRol()
    {
        $rolesControlador = new RolControlador($this->datos);
    }

    public function eliminarRol()
    {
        $rolesControlador = new RolControlador($this->datos);
    }

    public function gestionDeAcceso()
    {
        $rolesControlador = new gestionDeAcceso($this->datos);
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





    public function listarMaterial_construccion()
    {
        $material_construccionControlador = new Material_contruccionControlador($this->datos);
    }

    public function mostrarActualizarMaterial_construccion()
    {
        $rolesControlador = new Material_contruccionControlador($this->datos);
    }

    public function confirmarActualizarMaterial_construccion()
    {
        $material_construccionControlador = new Material_contruccionControlador($this->datos);
    }

    public function cancelarActualizarMaterial_construccion()
    {
        $material_construccionControlador = new Material_contruccionControlador($this->datos);
    }

    public function mostrarInsertarMaterial_construccion()
    {
        $material_construccionControlador = new Material_contruccionControlador($this->datos);
    }

    public function insertarMaterial_construccion()
    {
        $material_construccionControlador = new Material_contruccionControlador($this->datos);
    }

    public function eliminarMaterial_construccion()
    {
        $material_construccionControlador = new Material_contruccionControlador($this->datos);
    }

    public function gestionDeAccesoMaterial_construccion()
    {
        $material_construccionControlador = new Material_contruccionControlador($this->datos);
    }



}


?>