<?php

include_once PATH . 'modelos/ConBdMysql.php';

class TrabajadorDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from trabajador;";

        $registroTrabajador = $this->conexion->prepare($planconsulta);
        $registroTrabajador->execute();

        $listadoRegistrosTrabajador = array();

        while( $registro = $registroTrabajador->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosTrabajador[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosTrabajador;
    }

    public function seleccionarID($sId){

        $consulta="select * from trabajador where tra_id=?";

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
            
            $consulta="insert into  trabajador ";
            $consulta.= "(tra_id, 
                          tra_primer_nombre, 
                          tra_segundo_nombre,
                          tra_primer_apellido,
                          tra_segundo_apellido,
                          tra_tipo_documento_id,
                          tra_sede_id) ";
            $consulta.= "values (:tra_id, 
                                 :tra_primer_nombre, 
                                 :tra_segundo_nombre,
                                 :tra_primer_apellido,
                                 :tra_segundo_apellido,
                                 :tra_tipo_documento_id,
                                 :tra_sede_id);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":tra_id", $registro['tra_id']);
            $insertar -> bindParam(":tra_primer_nombre", $registro['tra_primer_nombre']);
            $insertar -> bindParam(":tra_segundo_nombre", $registro['tra_segundo_nombre']);
            $insertar -> bindParam(":tra_primer_apellido", $registro['tra_primer_apellido']);
            $insertar -> bindParam(":tra_segundo_apellido", $registro['tra_segundo_apellido']);
            $insertar -> bindParam(":tra_tipo_documento_id", $registro['tra_tipo_documento_id']);
            $insertar -> bindParam(":tra_sede_id", $registro['tra_sede_id']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $primerNombre = $registro[0]['tra_primer_nombre'];
            $segundoNombre = $registro[0]['tra_segundo_nombre'];
            $primerApellido = $registro[0]['tra_primer_apellido'];
            $segundoApellido = $registro[0]['tra_segundo_apellido'];
            $tipoDocumento = $registro[0]['tra_tipo_documento_id'];
            $sede = $registro[0]['tra_sede_id'];
            $tra_id = $registro[0]['tra_id'];
            
            if(isset($tra_id)){
                $consulta = "update trabajador ";
                $consulta.= "set  tra_primer_nombre = ?, 
                                  tra_segundo_nombre = ?,
                                  tra_primer_apellido = ?,
                                  tra_segundo_apellido = ?,
                                  tra_tipo_documento_id = ?,
                                  tra_sede_id = ?";
                $consulta.= "where tra_id = ?;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $tipoDocumento, $sede, $tra_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM trabajador WHERE tra_id = :tra_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':tra_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE trabajador SET tra_autEstado = ? WHERE tra_id = ?";
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
                $actualizar = "UPDATE trabajador SET tra_autEstado = ? WHERE tra_id = ?";
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