<?php

    include_once PATH . 'controladores/ConstructoraControlador.php';
    include_once PATH . 'controladores/IdentificacionControlador.php';
    include_once PATH . 'controladores/RolControlador.php';
    include_once PATH . 'controladores/SedeControlador.php';
    include_once PATH . 'controladores/UbicacionControlado.php';
    include_once PATH . 'controladores/TrabajadorControlador.php';
    include_once PATH . 'controladores/Material_construccionControlador.php';
    include_once PATH . 'controladores/RecibidoControlador.php';
    include_once PATH . 'controladores/ProyectoControlador.php';
    include_once PATH . 'controladores/RegistroControlador.php';
    include_once PATH . 'controladores/Usuario_sControlador.php';
    include_once PATH . 'controladores/StockControlador.php';

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
                case 'mostrarInsertarRol':
                    $this->mostrarInsertarRol();
                    break;
                case 'insertarRol':
                    $this->insertarRol();
                    break;
                case 'eliminarRol':
                    $this->eliminarRol();
                    break;

                case "gestionDeRegistro":
                    $this->gestionDeRegistro();
                    break;

                case "gestionDeAcceso":
                    $this->gestionDeAcceso();
                    break;

                case "cerrarSesion":

                    $this->cerrarSesion();
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
                case 'mostrarInsertarIdentificacion':
                    $this -> mostrarInsertarIdentificacion();
                    break;
                case 'insertarIdentificacion':
                    $this -> insertarIdentificacion();
                    break;
                case 'eliminarIdentificacion':
                    $this -> eliminarIdentificacion();
                    break;
                case 'listarIdentificacionInactivos':
                    $this -> listarIdentificacionInactivos();
                    break;
                case 'habilitarIdentificacion':
                    $this -> habilitarIdentificacion();
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
                case 'mostrarInsertarConstructora':
                    $this -> mostrarInsertarConstructora();
                    break;
                case 'insertarConstructora':
                    $this -> insertarConstructora();
                    break;
                case 'eliminarConstructora':
                    $this -> eliminarConstructora();
                    break;
                case 'listarConstructoraInactivos':
                    $this -> listarConstructoraInactivos();
                    break;
                case 'habilitarConstructora':
                    $this -> habilitarConstructora();
                    break;





                case 'listarSede':
                    $this -> listarSede();
                    break;
                case 'mostrarActualizarSede':
                    $this -> mostrarActualizarSede();
                    break;
                case 'confirmarActualizarSede':
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
                case 'mostrarInsertarUbicacion':
                    $this -> mostrarInsertarUbicacion();
                    break;
                case 'insertarUbicacion':
                    $this -> insertarUbicacion();
                    break;
                case 'eliminarUbicacion':
                    $this -> eliminarUbicacion();
                    break;






                case 'listarTrabajador':
                    $this -> listarTrabajador();
                    break;
                case 'mostrarActualizarTrabajador':
                    $this -> mostrarActualizarTrabajador();
                    break;
                case 'confirmarActualizarTrabajador':
                    $this -> confirmarActualizarTrabajador();
                    break;
                case 'mostrarInsertarTrabajador':
                    $this -> mostrarInsertarTrabajador();
                    break;
                case 'insertarTrabajador':
                    $this -> insertarTrabajador();
                    break;
                case 'eliminarTrabajador':
                    $this -> eliminarTrabajador();
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






                case 'listarRecibido':
                    $this -> listarRecibido();
                    break;
                case 'mostrarActualizarRecibido':
                    $this -> mostrarActualizarRecibido();
                    break;
                case 'confirmarActualizarRecibido':
                    $this -> confirmarActualizarRecibido();
                    break;
                case 'mostrarInsertarRecibido':
                    $this -> mostrarInsertarRecibido();
                    break;
                case 'insertarRecibido':
                    $this -> insertarRecibido();
                    break;
                case 'eliminarRecibido':
                    $this -> eliminarRecibido();
                    break;






                case 'listarProyecto':
                    $this->listarProyecto();
                    break;
                case 'mostrarActualizarProyecto':
                    $this->mostrarActualizarProyecto();
                    break;
                case 'confirmarActualizarProyecto':
                    $this->confirmarActualizarProyecto();
                    break;
                case 'mostrarInsertarProyecto':
                    $this->mostrarInsertarProyecto();
                    break;
                case 'insertarProyecto':
                    $this->insertarProyecto();
                    break;
                case 'eliminarProyecto':
                    $this->eliminarProyecto();
                    break;
                case 'listarProyectoInactivos':
                    $this->listarProyectoInactivos();
                    break;
                case 'habilitarProyecto':
                    $this->habilitarProyecto();
                    break;







                case 'listarRegistro':
                    $this->listarRegistro();
                    break;
                case 'mostrarActualizarRegistro':
                    $this->mostrarActualizarRegistro();
                    break;
                case 'confirmarActualizarRegistro':
                    $this->confirmarActualizarRegistro();
                    break;
                case 'mostrarInsertarRegistro':
                    $this->mostrarInsertarRegistro();
                    break;
                case 'insertarRegistro':
                    $this->insertarRegistro();
                    break;
                case 'eliminarRegistro':
                    $this->eliminarRegistro();
                    break;





                case 'listarStock':
                    $this->listarStock();
                    break;
                    case 'mostrarActualizarStock':
                        $this->mostrarActualizarStock();
                        break;
                    case 'confirmarActualizarStock':
                        $this->confirmarActualizarStock();
                        break;
                    case 'mostrarInsertarStock':
                        $this->mostrarInsertarStock();
                        break;
                    case 'insertarStock':
                        $this->insertarStock();
                        break;
                    case 'eliminarStock':
                        $this->eliminarStock();
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

        public function gestionDeRegistro() {

            $usuario_sControlador = new Usuario_sControlador($this->datos);
        }

        public function gestionDeAcceso()
        {

            $usuario_sControlador = new Usuario_sControlador($this->datos);
        }

        public function cerrarSesion()
        {

            $usuario_sControlador = new Usuario_sControlador($this->datos);
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

        public function listarIdentificacionInactivos(){
            $identificacionControlador = new IdentificacionControlador($this -> datos);
        }

        public function habilitarIdentificacion(){
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

        public function listarConstructoraInactivos(){
            $constructoraControlador = new ConstructoraControlador($this -> datos);
        }

        public function habilitarConstructora(){
            $constructoraControlador = new ConstructoraControlador($this -> datos);
        }








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







        public function listarTrabajador(){
            $ubicacionControlador = new TrabajadorControlador($this -> datos);
        }

        public function mostrarActualizarTrabajador(){
            $ubicacionControlador = new TrabajadorControlador($this -> datos);
        }

        public function confirmarActualizarTrabajador(){
            $ubicacionControlador = new TrabajadorControlador($this -> datos);
        }

        public function cancelarActualizarTrabajador(){
            $ubicacionControlador = new TrabajadorControlador($this -> datos);
        }

        public function mostrarInsertarTrabajador(){
            $ubicacionControlador = new TrabajadorControlador($this -> datos);
        }

        public function insertarTrabajador(){
            $ubicacionControlador = new TrabajadorControlador($this -> datos);
        }

        public function eliminarTrabajador(){
            $ubicacionControlador = new TrabajadorControlador($this -> datos);
        }






        public function listarRecibido(){
            $RecibidoControlador = new RecibidoControlador($this -> datos);
        }

        public function mostrarActualizarRecibido(){
            $RecibidoControlador = new RecibidoControlador($this -> datos);
        }

        public function confirmarActualizarRecibido(){
            $RecibidoControlador = new RecibidoControlador($this -> datos);
        }

        public function cancelarActualizarRecibido(){
            $RecibidoControlador = new RecibidoControlador($this -> datos);
        }

        public function mostrarInsertarRecibido(){
            $RecibidoControlador = new RecibidoControlador($this -> datos);
        }

        public function insertarRecibido(){
            $RecibidoControlador = new RecibidoControlador($this -> datos);
        }

        public function eliminarRecibido(){
            $RecibidoControlador = new RecibidoControlador($this -> datos);
        }






        public function listarMaterial_construccion(){
            $material_construccionControlador = new Material_contruccionControlador($this->datos);
        }

        public function mostrarActualizarMaterial_construccion(){
            $rolesControlador = new Material_contruccionControlador($this->datos);
        }

        public function confirmarActualizarMaterial_construccion(){
            $material_construccionControlador = new Material_contruccionControlador($this->datos);
        }

        public function cancelarActualizarMaterial_construccion(){
            $material_construccionControlador = new Material_contruccionControlador($this->datos);
        }

        public function mostrarInsertarMaterial_construccion(){
            $material_construccionControlador = new Material_contruccionControlador($this->datos);
        }

        public function insertarMaterial_construccion(){
            $material_construccionControlador = new Material_contruccionControlador($this->datos);
        }

        public function eliminarMaterial_construccion(){
            $material_construccionControlador = new Material_contruccionControlador($this->datos);
        }






        public function listarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function mostrarActualizarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function confirmarActualizarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function cancelarActualizarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function mostrarInsertarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function insertarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function eliminarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function listarProyectoInactivos(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }

        public function habilitarProyecto(){
            $proyectoControlador = new ProyectoControlador($this -> datos);
        }








        public function listarRegistro(){
            $registroControlador = new RegistroControlador($this -> datos);
        }

        public function mostrarActualizarRegistro(){
            $registroControlador = new RegistroControlador($this -> datos);
        }

        public function confirmarActualizarRegistro(){
            $registroControlador = new RegistroControlador($this -> datos);
        }

        public function cancelarActualizarRegistro(){
            $registroControlador = new RegistroControlador($this -> datos);
        }

        public function mostrarInsertarRegistro(){
            $registroControlador = new RegistroControlador($this -> datos);
        }

        public function insertarRegistro(){
            $registroControlador = new RegistroControlador($this -> datos);
        }

        public function eliminarRegistro(){
            $registroControlador = new RegistroControlador($this -> datos);
        }





        
        public function listarStock(){
            $stockControlador = new StockControlador($this -> datos);
        }

        public function mostrarActualizarStock(){
            $stockControlador = new StockControlador($this -> datos);
        }

        public function confirmarActualizarStock(){
            $stockControlador = new StockControlador($this -> datos);
        }

        public function cancelarActualizarStock(){
            $stockControlador = new StockControlador($this -> datos);
        }

        public function mostrarInsertarStock(){
            $stockControlador = new StockControlador($this -> datos);
        }

        public function insertarStock(){
            $stockControlador = new StockControlador($this -> datos);
        }

        public function eliminarStock(){
            $stockControlador = new StockControlador($this -> datos);
        }
    }
?>