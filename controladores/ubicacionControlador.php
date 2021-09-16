<?php

include_once PATH . 'modelos/modeloUbicacion/ubicacionDAO.php';

class UbicacionControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->UbicacionControlador();
    }

    public function UbicacionControlador() {


        switch ($this->datos['ruta']) {
            case "listarUbicacion": //provisionalmente para trabajar con datatables
                $this->listarUbicacion();
                break;
            case "actualizaSede": //provisionalmente para trabajar con datatables
                $this->actualizarUbicacion();
                break;
            case "confirmaActualizarSede": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarUbicacion();
                break;
            case "cancelarActualizarUbicacion": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarUbicacion();
                break;
            case "mostrarInsertarUbicacion": //provisionalmente para trabajar con datatables

                $this->mostrarInsertarUbicacion();
                break;

            case "insertarUbicacion": //provisionalmente para trabajar con datatables

                $this->insertarUbicacion();
                break;
        }
    }

    public function listarUbicacion() {
      

        $gestarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUbicacion = $gestarUbicacion->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
       $_SESSION['listarUbicacion'] = $registroUbicacion;

        header("location:principal.php?contenido=vistas/vistaUbicacion/vistaListarUbicacion.php");
    }

    public function actualizarUbicacion() {
        $gestarUbicacion = new ubicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeUbicacion = $gestarUbicacion->seleccionarId(array($this->datos['ubi_id'])); //Se consulta el libro para traer los datos.

        $actualizarDatosUbicacion = $consultaDeUbicacion['registroEncontrado'][0];

        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasUbicacion = $gestarCategoriaUbicacion->seleccionarTodos();
        /*         * ************************************************************************* */


        session_start();
        $_SESSION['actualizarDatosUbicacion'] = $actualizarDatosUbicacion;
        $_SESSION['registroCategoriasUbicacion'] = $registroCategoriasUbicacion;

        header("location:principal.php?contenido=vistas/vistasUbicacion/vistaActualizarUbicacion.php");
    }

    public function confirmaActualizarUbicacion() {
        $gestarUbicacion = new ubicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarDatosUbicacion= $gestarUbicacion->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarUbicacion");
    }

    public function cancelarActualizarUbicacion() {
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarUbicacion");
    }

    public function mostrarInsertarUbicacion() {



        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaUbicacion= new ubicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasUbicacion = $gestarCategoriaUbicacion->seleccionarTodos();
        /*         * ************************************************************************* */

        session_start();
        $_SESSION['registroCategoriasUbicacion'] = $registroCategoriasUbicacion;
        $registroCategoriasUbicacion = null;

        header("Location: principal.php?contenido=vistas/vistasUbicacion/vistaListarUbicacion.php");
    }

    public function insertarUbicacion() {

        //Se instancia LibroDAO para insertar
        $buscarUbicacion = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $UbicacionHallado = $buscarUbicacion->seleccionarId(array($this->datos['ubi_id']));
        //Si no existe el libro en la base se procede a insertar ****  		
    if (!$UbicacionHallado['exitoSeleccionId']) {
        $insertarUbicacion = new ubicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $insertoUbicacion = $insertarUbicacion->insertar($this->datos);  //inserción de los campos en la tabla libros 

        $resultadoInsercionUbicacion = $insertoUbicacion['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

        session_start();
        $_SESSION['mensaje'] = "Registrado " . $this->datos['ubi_id'] . " con éxito.  Agregado Nuevo Constructora con " . $resultadoInsercionUbicacion;

        header("location:Controlador.php?ruta=listarUbicacion");
    } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['ubi_id'] = $this->datos['ubi_id'];
            $_SESSION['ubi_direccion'] = $this->datos['ubi_direccion'];
            $_SESSION['mensaje'] = "   El código " . $this->datos['ubi_id'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarUbicacion");
        }
    }
}
?> 
