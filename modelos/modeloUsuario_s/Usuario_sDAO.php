<?php

include_once PATH . 'modelos/ConBdMysql.php';

class Usuario_sDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM usuario_s;";

        $registroRol = $this->conexion->prepare($planconsulta);
        $registroRol->execute();

        $listadoRegistrosRol = array();

        while( $registro = $registroRol->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosRol[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosRol;
    }

    public function seleccionarID($sId){

        if (!isset($sId[2])) { //si la consulta no viene con el password (PARA REGISTRARSE)
            $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
            $planConsulta .= " where p.perDocumento= ? or u.usuLogin = ? ;";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute(array($sId[0], $sId[1]));
        }
        if (isset($sId[2])) {//si la consulta viene con el password (PARA LOGUEARSE)
            $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
            $planConsulta .= " where u.usuLogin= ? and u.usuPassword = ? ;";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute(array($sId[1], $sId[2]));
        }
        if (!isset($sId[1]) && !isset($sId[2])) {//si la consulta viene con solo el documento (PARA ENCONTRAR PERSONA)
            $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
            $planConsulta .= " where p.perDocumento = ? ;";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute(array($sId[0]));
        }

        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }

        if (isset($registroEncontrado[0]->usuId) && $registroEncontrado[0]->usuId != FALSE) {
            return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado];
        }

    }

    public function insertar($registro){

        try {
            
            $consulta="INSERT INTO usuario_s (usuLogin, usuPassword) VALUES (:usuLogin, :usuPassword);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":usuLogin", $registro['email']);
            $insertar -> bindParam(":usuPassword", $registro['password']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $login = $registro[0]['usuLogin'];
            $password = $registro[0]['usuPassword'];
            $usuId = $registro[0]['usuId'];
            
            if(isset($usuId)){
                $consulta = "UPDATE usuario_s SET  usuLogin = ?, usuPassword = ?
                WHERE usuId = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($login, $password, $usuId));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM usuario_s WHERE usuId = :usuId;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':usuId', $sId[0],PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreBd();

        if(!empty($resultado)){
            return ['eliminado' => true, 'registroEliminado' => array($sId[0])];
        }else{
            return ['eliminado' => false, 'registroEliminado' => array($sId[0])];
        }

    }

    public function habilitar($sId = array()){

        try {
            $Estado = 1;

            if(isset($sId[0])){
                $actualizar = "UPDATE usuario_s SET usuEstado = ? WHERE usuId = ?";
                $actualizar = $this->conexion->prepare($actualizar);
                $actualizar = $actualizar->execute(array($Estado, $sId[0]));
                return ['actualizacion' => $actualizar, 'mensaje' => 'Resgistro Activado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizar, $pdoExc->errorInfo[2]];
        }
    }

    public function eliminarLogico($sId = array()){

        try {
            $Estado = 0;

            if(isset($sId[0])){
                $actualizar = "UPDATE usuario_s SET usuEstado = ? WHERE usuId = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($Estado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Desactivado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    }

?>


