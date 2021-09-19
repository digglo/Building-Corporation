<?php

include_once PATH . 'modelos/modeloSede/sedeDAO.php';

class SedeControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->SedeControlador();
    }

    public function SedeControlador() {


        switch ($this->datos['ruta']) {
            case "listarSede":
                $this->listarSede();
                break;
            case "mostrarActualizarSede":
                $this->mostrarActualizarSede();
                break;
            case "confirmarActualizarSede":
                $this->confirmarActualizarSede();
                break;
<<<<<<< main
            case "cancelarActualizarSede":
=======
            case "cancelarActualizarSede": //provisionalmente para trabajar con datatables
>>>>>>> Correcciones
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
        
        }
    }

    public function listarSede() {

        $gestarSede = new SedeDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSede = $gestarSede->seleccionarTodos();

        session_start();

        $_SESSION['listaDeSede'] = $registroSede;

        header("location:principal1.php?contenido=vistas/vistaSede/vistaListarSede.php");
    }

    public function mostrarActualizarSede() {
        $gestarSede = new SedeDAO (SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeSede = $gestarSede->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.

        $actualizarDatosSede = $consultaDeSede['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosSede'] = $actualizarDatosSede;

        header("location:principal1.php?contenido=vistas/vistaSede/vistaActualizarSede.php");
    }

    public function confirmarActualizarSede() {
        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarSede = $gestarSede->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarSede");
    }

    public function cancelarActualizarSede() {
        session_start();
        header("location:Controlador.php?ruta=listarSede");
    }

    public function mostrarInsertarSede() {

        session_start();

        header("Location: principal1.php?contenido=vistas/vistaSede/vistaInsertarSede.php");
    }

<<<<<<< main
    public function insertarSede() {
=======
    public function InsertarSede() {
>>>>>>> Correcciones

        //Se instancia LibroDAO para insertar
        $buscarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $SedeHallado = $buscarSede->seleccionarId(array($this->datos['rol_id_rol']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$SedeHallado['exitoSeleccionId']) {
            $insertarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoSede = $insertarSede->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionSede = $insertoSede['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
<<<<<<< main
            $_SESSION['mensaje'] = "Registrado " ;
=======
            $_SESSION['mensaje'] = "Registrado " . $this->datos['sed_id'] . " con éxito.  Agregado Nuevo Constructora con " . $resultadoInsercionSede;
>>>>>>> Correcciones

            header("location:Controlador.php?ruta=listarSede");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['rol_id_rol'] = $this->datos['rol_id_rol'];
            $_SESSION['rol_tipo_rol'] = $this->datos['rol_tipo_rol'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['rol_id_rol'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarSede");
        }
    }

    public function cancelarInsertarSede() {

        session_start();

        header("location:Controlador.php?ruta=listarSede");
    }

    public function eliminarSede() {
        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $eliminarSede = $gestarSede->eliminar(array($this->datos['idAct'])); //Se envía datos del libro para actualizar. 				

        session_start();
        header("location:Controlador.php?ruta=listarRoles");
    }

}

?>