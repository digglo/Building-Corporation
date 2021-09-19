<?php

include_once PATH . 'modelos/ConBdMysql.php';

class StockDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from stock;";

        $registroStock = $this->conexion->prepare($planconsulta);
        $registroStock->execute();

        $listadoRegistrosStock = array();

        while( $registro = $registroStock->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosStock[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosStock;
    }

    public function seleccionarID($sId){

        $consulta="select * from stock where sto_id=?";

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
            
            $consulta="insert into  stock ";
            $consulta.= "(sto_id, 
                          sto_cantidad_almacenada, 
                          sto_recibido_id,
                          sto_utilizado_id) ";
            $consulta.= "values (:sto_id, 
                                 :sto_cantidad_almacenada, 
                                 :sto_recibido_id,
                                 :sto_utilizado_id);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":sto_id", $registro['sto_id']);
            $insertar -> bindParam(":sto_cantidad_almacenada", $registro['sto_cantidad_almacenada']);
            $insertar -> bindParam(":sto_recibido_id", $registro['sto_recibido_id']);
            $insertar -> bindParam(":sto_utilizado_id", $registro['sto_utilizado_id']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $cantidadAlmacenado = $registro[0]['sto_cantidad_almacenada'];
            $recibido = $registro[0]['sto_recibido_id'];
            $utilizado = $registro[0]['sto_utilizado_id'];
            $sto_id = $registro[0]['sto_id'];
            
            if(isset($sto_id)){
                $consulta = "update stock ";
                $consulta.= "set  sto_cantidad_almacenada = ?, 
                                  sto_recibido_id = ?,
                                  sto_utilizado_id = ?";
                $consulta.= "where sto_id = ?;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($cantidadAlmacenado, $recibido, $utilizado, $sto_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM stock WHERE sto_id = :sto_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':sto_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE stock SET sto_estado = ? WHERE sto_id = ?";
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
                $actualizar = "UPDATE stock SET sto_estado = ? WHERE sto_id = ?";
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