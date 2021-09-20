<?php

include_once PATH . 'controladores/ConstructoraControlador.php';
include_once PATH . 'controladores/IdentificacionControlador.php';
include_once PATH . 'controladores/RolControlador.php';
<<<<<<< HEAD
include_once PATH . 'controladores/Material_construccionControlador.php';

=======
include_once PATH . 'controladores/SedeControlador.php';
include_once PATH . 'controladores/UbicacionControlador.php';


>>>>>>> 189ed0ac4c10b73f3359ecb64b0a776039e6bd1d
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


<<<<<<< HEAD
=======




>>>>>>> 189ed0ac4c10b73f3359ecb64b0a776039e6bd1d

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
<<<<<<< HEAD
                
           
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


=======









            case 'listarSede':
                $this -> listarSede();
                break;
            case 'mostrarActualizarSede':
                $this -> mostrarActualizarSede();
                break;
            case 'confirmarActualizarSede':
                $this -> confirmarActualizarSede();
                break;
            case 'cancelarActualizarSede':
                $this -> confirmarActualizarSede();
                break;
            case 'mostrarInsertarSede':
                $this -> mostrarInsertarSede();
                break;
            case 'insertarSede':
                $this -> insertarSede();
                break;
            case 'eliminarSede':
                $this -> eliminarSede();
                break;







            case 'listarUbicacion':
                $this -> listarUbicacion();
                break;
            case 'mostrarActualizarUbicacion':
                $this -> mostrarActualizarUbicacion();
                break;
            case 'confirmarActualizarUbicacion':
                $this -> confirmarActualizarUbicacion();
                break;
            case 'cancelarActualizarUbicacion':
                $this -> confirmarActualizarUbicacion();
                break;
            case 'mostrarInsertarUbicacion':
                $this -> mostrarInsertarUbicacion();
                break;
            case 'insertarUbicacion':
                $this -> insertarUbicacion();
                break;
            case 'eliminarUbicacion':
                $this -> eliminarUbicacion();
                break;
>>>>>>> 189ed0ac4c10b73f3359ecb64b0a776039e6bd1d
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

<<<<<<< HEAD
=======





>>>>>>> 189ed0ac4c10b73f3359ecb64b0a776039e6bd1d



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





<<<<<<< HEAD
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


=======




    public function listarSede(){
        $sedeControlador = new SedeControlador($this -> datos);
    }

    public function mostrarActualizarSede(){
        $sedeControlador = new SedeControlador($this -> datos);
    }

    public function confirmarActualizarSede(){
        $sedeControlador = new SedeControlador($this -> datos);
    }

    public function cancelarActualizarSede(){
        $sedeControlador = new SedeControlador($this -> datos);
    }

    public function mostrarInsertarSede(){
        $sedeControlador = new SedeControlador($this -> datos);
    }

    public function insertarSede(){
        $sedeControlador = new SedeControlador($this -> datos);
    }

    public function eliminarSede(){
        $sedeControlador = new SedeControlador($this -> datos);
    }









    public function listarUbicacion(){
        $ubicacionControlador = new UbicacionControlador($this -> datos);
    }

    public function mostrarActualizarUbicacion(){
        $ubicacionControlador = new UbicacionControlador($this -> datos);
    }

    public function confirmarActualizarUbicacion(){
        $ubicacionControlador = new UbicacionControlador($this -> datos);
    }

    public function cancelarActualizarUbicacion(){
        $ubicacionControlador = new UbicacionControlador($this -> datos);
    }

    public function mostrarInsertarUbicacion(){
        $ubicacionControlador = new UbicacionControlador($this -> datos);
    }

    public function insertarUbicacion(){
        $ubicacionControlador = new UbicacionControlador($this -> datos);
    }

    public function eliminarUbicacion(){
        $ubicacionControlador = new UbicacionControlador($this -> datos);
    }
>>>>>>> 189ed0ac4c10b73f3359ecb64b0a776039e6bd1d

}


?>