<?php

include_once '../modelos/modeloRol/RolDAO.php';

class RolControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->rolControlador();
    }

    public function rolControlador() {


        switch ($this->datos['ruta']) {
            case "listarRoles": //provisionalmente para trabajar con datatables
                $this->listarRoles();
                break;
            case "mostrarActualizarRol": //provisionalmente para trabajar con datatables
                $this->mostrarActualizarRol();
                break;
            case "confirmarActualizarRol": //provisionalmente para trabajar con datatables
                $this->confirmarActualizarRol();
                break;
            case "cancelarActualizarRol": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarRol();
                break;
            case "mostrarInsertarRol": //provisionalmente para trabajar con datatables
                $this->mostrarInsertarRol();
                break;
            case "insertarRol":
                $this->insertarRol();
                break;
            case "cancelarInsertarRol":
                $this->cancelarInsertarRol();
                break;
            case "eliminarRol":
                $this->eliminarRol();
                break;
        }
    }

    public function listarRoles() {

        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroRol = $gestarRoles->seleccionarTodos();

        session_start();

        $_SESSION['listaDeRoles'] = $registroRol;

        header("location:principal1.php?contenido=vistas/vistaRol/vistaListarRegistroRoles.php");
    }

    public function mostrarActualizarRol() {
        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeRol = $gestarRoles->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.

        $actualizarDatosRol = $consultaDeRol['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosRol'] = $actualizarDatosRol;

        header("location:principal1.php?contenido=vistas/vistaRol/vistaActualizarRol.php");
    }

    public function confirmarActualizarRol() {
        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarRol = $gestarRoles->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarRoles");
    }

    public function cancelarActualizarRol() {
        session_start();
        header("location:Controlador.php?ruta=listarRoles");
    }

    public function mostrarInsertarRol() {

        session_start();

        header("Location: principal1.php?contenido=vistas/vistaRol/vistaInsertarRol.php");
    }

    public function insertarRol() {

        //Se instancia LibroDAO para insertar
        $buscarRol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $RolHallado = $buscarRol->seleccionarId(array($this->datos['rol_id_rol']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$RolHallado['exitoSeleccionId']) {
            $insertarRol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoRol = $insertarRol->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionRol = $insertoRol['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " ;

            header("location:Controlador.php?ruta=listarRoles");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['rol_id_rol'] = $this->datos['rol_id_rol'];
            $_SESSION['rol_tipo_rol'] = $this->datos['rol_tipo_rol'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['rol_id_rol'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarRol");
        }
    }

    public function cancelarInsertarRol() {

        session_start();

        header("location:Controlador.php?ruta=listarRoles");
    }

    public function eliminarRol() {
        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $eliminarRol = $gestarRoles->eliminar(array($this->datos['idAct'])); //Se envía datos del libro para actualizar. 				

        session_start();
        header("location:Controlador.php?ruta=listarRoles");
    }

}

?>