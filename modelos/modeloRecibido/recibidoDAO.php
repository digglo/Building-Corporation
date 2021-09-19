<?php

include_once PATH . 'modelos/ConBdMysql.php';

class RecibidoDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from recibido;";

        $registroRecibido = $this->conexion->prepare($planconsulta);
        $registroRecibido->execute();

        $listadoRegistrosRecibido = array();

        while( $registro = $registroRecibido->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosRecibido[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosRecibido;
    }

    public function seleccionarID($sId){

        $consulta="select * from recibido where rec_id=?";

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

            
            $consulta="insert into recibido ";
            $consulta.= " (rec_id, 
                           rec_numero_factura, 
                           rec_cantidad_recibido,
                           rec_mat_id) ";
            $consulta.= " values (:rec_id, 
                                  :rec_numero_factura, 
                                  :rec_cantidad_recibido,
                                  :rec_mat_id);" ;


            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":rec_id", $registro['rec_id']);
            $insertar -> bindParam(":rec_numero_factura", $registro['rec_numero_factura']);
            $insertar -> bindParam(":rec_cantidad_recibido", $registro['rec_cantidad_recibido']);
            $insertar -> bindParam(":rec_mat_id", $registro['rec_mat_id']);


            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $factura = $registro[0]['rec_numero_factura'];
            $cantidadRecibido = $registro[0]['rec_cantidad_recibido'];
            $materialConstruccion = $registro[0]['rec_mat_id'];
            $fechaRecibido = $registro[0]['rec_fecha_recibido'];
            $rec_id = $registro[0]['rec_id'];
            
            if(isset($rec_id)){
                $consulta = "update recibido ";
                $consulta.= " set  rec_numero_factura = ?, 
                                   rec_cantidad_recibido = ?,
                                   rec_mat_id = ?,
                                   rec_fecha_recibido = ?";
                $consulta.= " where rec_id = ?;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($factura, $cantidadRecibido, $materialConstruccion, $fechaRecibido, $rec_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "delete from recibido where rec_id = :rec_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':rec_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE recibido SET rec_estado
                = ? WHERE rec_id = ?";
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
                $actualizar = "UPDATE recibido SET rec_estado
                = ? WHERE rec_id = ?";
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