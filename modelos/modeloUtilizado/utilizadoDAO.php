<?php

include_once PATH . 'modelos/ConBdMysql.php';

class UtilizadoDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from utilizado;";

        $registroUtilizado = $this->conexion->prepare($planconsulta);
        $registroUtilizado->execute();

        $listadoRegistrosUtilizado = array();

        while( $registro = $registroUtilizado->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosUtilizado[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosUtilizado;
    }

    public function seleccionarID($sId){

        $consulta="select * from utilizado where uti_id=?";

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
            
            $consulta="insert into  utilizado ";
            $consulta.= "(uti_id, 
                          uti_cantidad_utilizado) ";
            $consulta.= "values (:uti_id, 
                                 :uti_cantidad_utilizado);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":uti_id", $registro['uti_id']);
            $insertar -> bindParam(":uti_cantidad_utilizado", $registro['uti_cantidad_utilizado']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $cantidadUtilizado = $registro[0]['uti_cantidad_utilizado'];
            $uti_id = $registro[0]['uti_id'];
            
            if(isset($uti_id)){
                $consulta = "update utilizado ";
                $consulta.= "set  uti_cantidad_utilizado = ?";
                $consulta.= "where uti_id = ?;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($cantidadUtilizado, $uti_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM utilizado WHERE uti_id = :uti_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':uti_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE utilizado SET uti_autEstado = ? WHERE uti_id = ?";
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
                $actualizar = "UPDATE utilizado SET uti_autEstado = ? WHERE uti_id = ?";
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