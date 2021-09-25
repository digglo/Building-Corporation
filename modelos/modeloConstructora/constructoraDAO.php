<?php

include_once PATH . 'modelos/ConBdMysql.php';

class ConstructoraDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }

    public function seleccionarTodos($Estado){
        $planconsulta = "SELECT * FROM constructora C JOIN identificacion i on c.con_id_identificacion=i.ide_id JOIN usuario_s u on c.usuario_s_usuld=u.usuId WHERE con_estado=:con_estado;";

        $registroConstructora = $this->conexion->prepare($planconsulta);
        $registroConstructora -> bindParam(":con_estado", $Estado);

        $registroConstructora->execute();

        $listadoRegistrosConstructora = array();

        while( $registro = $registroConstructora->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosConstructora[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosConstructora;
    }

    public function seleccionarID($sId){

        $consulta="select * from constructora where con_id=?";

        $lista=$this->conexion->prepare($consulta);
        $lista->execute(array($sId[0]));

        $registroEnco = array();

        while( $registro = $lista->fetch(PDO::FETCH_OBJ)){
            $registroEnco[]=$registro;
        }
          
        if(!empty($registroEnco)){
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEnco];
        }else{
            return ['exitosaSeleccionId' => false, 'registroEncontrado' => $registroEnco];
        }

    }

    public function insertar($registro){

        try {
            
            $consulta="insert into  constructora ";
            $consulta.= "(con_id, 
                          con_nombre_empresa, 
                          con_numero_documento,
                          con_id_identificacion,
                          usuario_s_usuld) ";
            $consulta.= "values (:con_id, 
                                 :con_nombre_empresa, 
                                 :con_numero_documento,
                                 :con_id_identificacion,
                                 :usuario_s_usuld);" ;

            $insertar=$this->conexion->prepare($consulta);


            $insertar -> bindParam(":con_id", $registro['con_id']);
            $insertar -> bindParam(":con_nombre_empresa", $registro['con_nombre_empresa']);
            $insertar -> bindParam(":con_numero_documento", $registro['con_numero_documento']);
            $insertar -> bindParam(":con_id_identificacion", $registro['con_id_identificacion']);
            $insertar -> bindParam(":usuario_s_usuld", $registro['usuario_s_usuld']);


            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $nombreEmpresa = $registro[0]['con_nombre_empresa'];
            $numeroDocumento = $registro[0]['con_numero_documento'];
            $identificacion = $registro[0]['con_id_identificacion'];
            $usuario = $registro[0]['usuario_s_usuld'];
            $con_id = $registro[0]['con_id'];
            
            if(isset($con_id)){
                $consulta = "UPDATE constructora ";
                $consulta .= "SET  con_nombre_empresa = ?,
                                   con_numero_documento = ?,
                                   con_id_identificacion = ?,
                                   usuario_s_usuld = ?";
                $consulta .= "WHERE con_id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($nombreEmpresa, $numeroDocumento, $identificacion,  $usuario, $con_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "delete from constructora where con_id = :con_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':con_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE constructora SET con_estado = ? WHERE con_id = ?";
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
                $actualizar = "UPDATE constructora SET con_estado = ? WHERE con_id = ?";
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