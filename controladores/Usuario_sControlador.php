<?php

require_once PATH . 'modelos/modeloConstructora/constructoraDAO.php';
require_once PATH . 'modelos/modeloUsuario_s/Usuario_sDAO.php';
require_once PATH . 'modelos/modeloRol/RolDAO.php';
require_once PATH . 'modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php';
include_once PATH . 'controladores/ManejoSesiones/BloqueDeSeguridad.php';

class Usuario_sControlador
{
    private $datos = array();

    public function __construct($datos)
    {
        $this->datos = $datos;
        $this->usuario_sControlador();
    }

    public function usuario_sControlador()
    {

        switch ($this->datos["ruta"])
        {

            case "gestionDeRegistro":

                $this -> gestionDeRegistro();

                break;

            case "gestionDeAcceso":

                $this->gestionDeAcceso();

                break;
				
            case "cerrarSesion":

                $this->cerrarSesion();

                break;				
				
        }
    }

    function gestionDeRegistro() 
    {

        $gestarUsuario_s = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
//Se revisa si existe la persona en la base 
        $existeUsuario_s = $gestarUsuario_s->seleccionarId(array($this->datos["con_numero_documento"], $this->datos['usulogin']));
        //print_r($existeUsuario_s);
//Si no existe la persona en la base se procede a insertar
        if (0 == $existeUsuario_s['exitoSeleccionId']) 
        {
//se encripta la contraseña que viene
//inserción de los campos en la tabla usuario_s
            $this->datos["password"] = md5($this->datos["password"]); //Encriptamos password para guardar en la base de datos  					
            $insertoUsuario_s = $gestarUsuario_s->insertar($this->datos);
            //print_r($insertoUsuario_s);
            $exitoInsercionUsuario_s = $insertoUsuario_s['inserto'];
            $resultadoInsercionUsuario_s = $insertoUsuario_s['resultado'];
            $gestarPersona = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
//Id 'usuID' con quedó insertado el usuario, con el fin que quede el mismo en la tabla 'persona'
            $this->datos['usuario_s_usuId'] = $resultadoInsercionUsuario_s;
//inserción de los campos en la tabla persona
            $insertoPersona = $gestarPersona->insertar($this->datos);
            $exitoInsercionPersona = $insertoPersona['inserto']; //indica si se logró inserción de los campos en la tabla persona
            $resultadoInsercionPersona = $insertoPersona['resultado']; //***Si logró insertar trae el id con que quedó la persona de lo contrario la excepción o fallo					
// SE ASIGNA UN ROL GENÉRICO (en este ejemplo x) AL USUARIO REGISTRADO//
            $asignarRol = new Usuario_s_rolesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $asignarRol->insertar(array($resultadoInsercionUsuario_s, 1)); //Se envía el id con que quedó el usuario_s y el id del rol 

            session_start(); //se abre sesión para almacenar en ella el mensaje de inserción   
            $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema"; //mensaje de inserción					

            header("location:login.php");
        } else {//Si la persona ya existe se abre sesión para almacenar en ella el mensaje de NO inserción y devolver datos al formulario por medio de la sesión
            session_start();
            $_SESSION['con_nombre_empresa'] = $this->datos['con_nombre_empresa'];
            $_SESSION['con_numero_documento'] = $this->datos['con_numero_documento'];
            $_SESSION['usulogin'] = $this->datos['usulogin'];
            $_SESSION['mensaje'] = "El usuario ya existe en el sistema.";
            header("location:registro.php");
        }
    }

    public function gestionDeAcceso() 
    {

        $gestarUsuario_s = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

        //$this->datos["password"] = md5($this->datos["password"]); //Encriptamos password para que coincida con la base de datos
        //print_r($this->datos["password"]);
        $this->datos["con_numero_documento"] = ""; //Para logueo crear ésta variable límpia por cuanto se utiliza el mismo método de registrarse a continuación
        $existeUsuario_s = $gestarUsuario_s->seleccionarId(array($this->datos["con_numero_documento"], $this->datos['usulogin'], $this->datos["password"])); //Se revisa si existe la persona en la base

        if ((0 != $existeUsuario_s['exitoSeleccionId']) && ($existeUsuario_s['registroEncontrado'][0]->usulogin == $this->datos['usulogin']))
        {

            session_start(); //se abre sesión para almacenar en ella el mensaje
            $_SESSION['mensaje'] = "Bienvenido a nuestra Aplicación."; //mensaje
            $_SESSION['perNombre'] = $existeUsuario_s['registroEncontrado'][0]->con_nombre_empresa; // para mensaje de bienvenida
            //Consultamos los roles de la persona logueada
            $consultaRoles = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $rolesUsuario = $consultaRoles->seleccionarID(array($existeUsuario_s['registroEncontrado'][0]->con_numero_documento));
            $cantidadRoles = count($rolesUsuario['registroEncontrado']);
            $rolesEnSesion = array();
            for ($i = 0; $i < $cantidadRoles; $i++)
            {
                $rolesEnSesion[] = $rolesUsuario['registroEncontrado'][$i]->rolId;
            }

            //ABRIR  SESION**************************
            $sesionPermitida = new ClaseSesion(); // se abre la sesión
            $sesionPermitida->crearSesion(array($existeUsuario_s['registroEncontrado'][0], "", $rolesEnSesion)); //Se envìa a la sesiòn los datos del usuario logeado					

            header("location:principal.php");
        } else {
            session_start(); //se abre sesión para almacenar en ella el mensaje de inserción
            $_SESSION['mensaje'] = "Credenciales de acceso incorrectas"; //mensaje de inserción
            header("location:login.php");
        }
    }
	public function cerrarSesion()
    {
        $cerrarSesion = new ClaseSesion();
        $cerrarSesion->cerrarSesion(); // Se cierra la sesión
    }
}