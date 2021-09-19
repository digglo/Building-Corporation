<?php

include_once PATH . 'modelos/ConBdMysql.php';

class RegistroDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from registro;";

        $registroRegistro = $this->conexion->prepare($planconsulta);
        $registroRegistro->execute();

        $listadoRegistrosRegistro = array();

        while( $registro = $registroRegistro->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosRegistro[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosRegistro;
    }

    public function seleccionarID($sId){

        $consulta="select * FROM registro WHERE reg_id=?";

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
            
            $consulta="insert into  registro ";
            $consulta.= "(reg_id, 
                          reg_numero_registro, 
                          reg_comentarios,
                          reg_stock_id) ";
            $consulta.= "values (:reg_id, 
                                 :reg_numero_registro, 
                                 :reg_comentarios,
                                 :reg_stock_id);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":reg_id", $registro['reg_id']);
            $insertar -> bindParam(":reg_numero_registro", $registro['reg_numero_registro']);
            $insertar -> bindParam(":reg_comentarios", $registro['reg_comentarios']);
            $insertar -> bindParam(":reg_stock_id", $registro['reg_stock_id']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $numeroRegistro = $registro[0]['reg_numero_registro'];
            $comentario = $registro[0]['reg_comentarios'];
            $stockId = $registro[0]['reg_stock_id'];
            $reg_id = $registro[0]['reg_id'];
            
            if(isset($reg_id)){
                $consulta = "update registro ";
                $consulta.= "set  reg_numero_registro = ?, 
                                  reg_comentarios = ?,
                                  reg_stock_id = ?";
                $consulta.= "where reg_id = ?;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($numeroRegistro, $comentario, $stockId, $reg_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM registro WHERE reg_id = :reg_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':reg_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE registro SET reg_estado = ? WHERE reg_id = ?";
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
                $actualizar = "UPDATE registro SET reg_estado = ? WHERE reg_id = ?";
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