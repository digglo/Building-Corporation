<?php

include_once PATH . 'modelos/modeloSede/SedeDAO.php';

class SedeControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->SedeControlador();
    }

    public function SedeControlador() {


        switch ($this->datos['ruta']) {
            case "listarSede": //provisionalmente para trabajar con datatables
                $this->listarSede();
                break;
            case "actualizaSede": //provisionalmente para trabajar con datatables
                $this->actualizarSede();
                break;
            case "confirmaActualizarSede": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarSede();
                break;
            case "cancelarActualizarSede": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarConstructora();
                break;
            case "mostrarInsertarSede": //provisionalmente para trabajar con datatables

                $this->mostrarInsertarSede();
                break;

            case "insertarSede": //provisionalmente para trabajar con datatables

                $this->insertarSede();
                break;
        }
    }

    public function listarSede() {

        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSede = $gestarSede->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
       $_SESSION['listaDeSede'] = $registroSede;

        header("location:principal.php?contenido=vistas/vistaSede/vistaListarSede.php");
    }

    public function actualizarSede() {
        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeSede = $gestarSede->seleccionarId(array($this->datos['sed_id'])); //Se consulta el libro para traer los datos.

        $actualizarDatosSede = $consultaDeSede['registroEncontrado'][0];

        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasSede = $gestarCategoriaSede->seleccionarTodos();
        /*         * ************************************************************************* */


        session_start();
        $_SESSION['actualizarDatosSede'] = $actualizarDatosSede;
        $_SESSION['registroCategoriasSede'] = $registroCategoriasSede;

        header("location:principal.php?contenido=vistas/vistasSede/vistaActualizarSede.php");
    }

    public function confirmaActualizarSede() {
        $gestarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarDatosSede= $gestarSede->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarSede");
    }

    public function cancelarActualizarSede() {
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarSede");
    }

    public function mostrarInsertarSede() {



        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasSede = $gestarCategoriaSede->seleccionarTodos();
        /*         * ************************************************************************* */

        session_start();
        $_SESSION['registroCategoriasSede'] = $registroCategoriasSede;
        $registroCategoriasSede = null;

        header("Location: principal.php?contenido=vistas/vistasSede/vistaListarSede.php");
    }

    public function mostrarInsertarSede() {

        //Se instancia LibroDAO para insertar
        $buscarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $SedeHallado = $buscarSede->seleccionarId(array($this->datos['sed_id']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$SedeHallado['exitoSeleccionId']) {
            $insertarSede = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoSede = $insertarSede->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionSede = $insertoSede['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " . $this->datos['sed_id'] . " con éxito.  Agregado Nuevo Constructora con " . $resultadoInsercionConstructora;

            header("location:Controlador.php?ruta=listarSede");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['sed_id'] = $this->datos['sed_id'];
            $_SESSION['sed_constructora_id'] = $this->datos['sed_constructora_id'];
            $_SESSION['sed_ubicacion_id'] = $this->datos['sed_constructora_id'];
            $_SESSION['sed_estado'] = $this->datos['sed_estado'];
            $_SESSION['categoriaSede'] = $this->datos['categoriaSede_sed_Id'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['sed_id'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarSede");
        }
    }

}

?>