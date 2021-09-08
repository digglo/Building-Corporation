<?php

include_once PATH . 'modelos/ConBdMysql.php';

class UbicacionDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from ubicacion;";

        $registroUbicacion = $this->conexion->prepare($planconsulta);
        $registroUbicacion->execute();

        $listadoRegistrosUbicacion = array();

        while( $registro = $registroUbicacion->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosUbicacion[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosUbicacion;
    }

    public function seleccionarID($sId){

        $consulta="select * from ubicacion where ubi_id=?";

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
            
            $consulta="insert into  ubicacion ";
            $consulta.= " (ubi_direccion, 
                           ubi_id) ";
            $consulta.= " VALUES (:ubi_direccion, 
                                  :ubi_id);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":ubi_direccion", $registro['ubi_direccion']);
            $insertar -> bindParam(":ubi_id", $registro['ubi_id']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $direccion = $registro[0]['ubi_direccion'];
            $ubi_id = $registro[0]['ubi_id'];
            
            if(isset($ubi_id)){
                $consulta = "update ubicacion ";
                $consulta.= "SET  ubi_direccion = ?";
                $consulta.= "WHERE ubi_id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($direccion, $ubi_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM ubicacion WHERE ubi_id = :ubi_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':ubi_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE ubicacion SET ubi_autEstado = ? WHERE ubi_id = ?";
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
                $actualizar = "UPDATE ubicacion SET ubi_autEstado = ? WHERE ubi_id = ?";
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