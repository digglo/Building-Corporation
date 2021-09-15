<?php

include_once PATH . 'modelos/modeloTrabajador/trabajadorDAO.php';

class TrabajadorControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->TrabajadorControlador();
    }

    public function TrabajadorControlador() {


        switch ($this->datos['ruta']) {
            case "listarTrabajador": //provisionalmente para trabajar con datatables
                $this->listarTrabajador();
                break;
            case "actualizaTrabajador": //provisionalmente para trabajar con datatables
                $this->actualizarTrabajador();
                break;
            case "confirmaActualizarTrabajador": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarTrabajador();
                break;
            case "cancelarActualizarUbicacion": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarTrabajador();
                break;
            case "mostrarInsertarTrabajador": //provisionalmente para trabajar con datatables

                $this->mostrarInsertarTrabajador();
                break;

            case "insertarTrabajador": //provisionalmente para trabajar con datatables

                $this->insertarTrabajador();
                break;
        }
    }

    public function listarTrabajador() {

        $gestarTrabajador = new trabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroTrabajador = $gestarTrabajador->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
       $_SESSION['listarTrabajador'] = $registroTrabajador;

        header("location:principal.php?contenido=vistas/vistaTrabajador/vistaListarTrabajador.php");
    }

    public function actualizarTrabajador() {
        $gestarTrabajador = new trabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaTrabajador = $gestarTrabajador->seleccionarId(array($this->datos['tra_id'])); //Se consulta el libro para traer los datos.

        $actualizarDatosTrabajador = $consultaTrabajador['registroEncontrado'][0];

        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaTrabajador = new trabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasTrabajador = $gestarCategoriaTrabajador->seleccionarTodos();
        /*         * ************************************************************************* */


        session_start();
        $_SESSION['actualizarDatosTrabajador'] = $actualizarDatosTrabajador;
        $_SESSION['registroCategoriasTrabajador'] = $registroCategoriasTrabajador;

        header("location:principal.php?contenido=vistas/vistasTrabajador/vistaActualizarTrabajador.php");
    }

    public function confirmaActualizarTrabajador() {
        $gestarTrabajador = new trabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarDatosTrabajador= $gestarTrabajador->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarTrabajador");
    }

    public function cancelarActualizarTrabajador() {
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarTrabajador");
    }

    public function mostrarInsertarTrabajador() {



        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaTrabajador= new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasTrabajador = $gestarCategoriaTrabajador->seleccionarTodos();
        /*         * ************************************************************************* */

        session_start();
        $_SESSION['registroCategoriasTrabajador'] = $registroCategoriasTrabajador;
        $registroCategoriasTrabajador = null;

        header("Location: principal.php?contenido=vistas/vistastrabajador/vistaListarTrabajador.php");
    }

    public function mostrarInsertarTrabajador() {

        //Se instancia LibroDAO para insertar
        $buscarTrabajador = new trabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $TrabajadorHallado = $buscarTrabajador->seleccionarId(array($this->datos['tra_id']));
        //Si no existe el libro en la base se procede a insertar ****  		
    if (!$TrabajadorHallado['exitoSeleccionId']) {
        $insertarTrabajador = new trabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $insertoTrabajador = $insertarTrabajador->insertar($this->datos);  //inserción de los campos en la tabla libros 

        $resultadoInsercionSede = $insertoSede['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

        session_start();
        $_SESSION['mensaje'] = "Registrado " . $this->datos['tra_id'] . " con éxito.  Agregado Nuevo Constructora con " . $resultadoInsercionConstructora;

        header("location:Controlador.php?ruta=listarTrabajador");
    } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['tra_id'] = $this->datos['tra_id'];
            $_SESSION['tra_primer_nombre'] = $this->datos['tra_primer_nombre'];
            $_SESSION['tra_primer_apellido'] = $this->datos['tra_primer_apellido'];
            $_SESSION['tra_tipo_documento_id'] = $this->datos['tra_tipo_documento_id'];
            $_SESSION['mensaje'] = "   El código " . $this->datos['tra_id'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarTrabajador");
        }
    }