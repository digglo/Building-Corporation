<?php

include_once PATH . 'modelos/ConBdMysql.php';

class SedeDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from sede;";

        $registroSede = $this->conexion->prepare($planconsulta);
        $registroSede->execute();

        $listadoRegistrosSede = array();

        while( $registro = $registroSede->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosSede[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosSede;
    }

    public function seleccionarID($sId){

        $consulta="select * from sede where sede_id=?";

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
            
            $consulta="insert into sede ";
            $consulta.= "(sede_id, 
                          sede_nombre_sede,
                          sede_ubicacion_id,
                          sede_constructora_id) ";
            $consulta.= " values (:sede_id, 
                                 :sede_nombre_sede,
                                 :sede_ubicacion_id,
                                 :sede_constructora_id);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":sede_id", $registro['sede_id']);
            $insertar -> bindParam(":sede_nombre_sede", $registro['sede_nombre_sede']);
            $insertar -> bindParam(":sede_ubicacion_id", $registro['sede_ubicacion_id']);
            $insertar -> bindParam(":sede_constructora_id", $registro['sede_constructora_id']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $nombreSede = $registro[0]['sede_nombre_sede'];
            $ubicacion = $registro[0]['sede_ubicacion_id'];
            $constructora = $registro[0]['sede_constructora_id'];
            $sede_id = $registro[0]['sede_id'];
            
            if(isset($sede_id)){
                $consulta = "update sede ";
                $consulta.= " SET  sede_nombre_sede = ?, 
                                   sede_ubicacion_id = ?, 
                                   sede_constructora_id = ?";
                $consulta.= " WHERE sede_id = ? ;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($nombreSede, $ubicacion, $constructora,  $sede_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM sede WHERE sede_id = :sede_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':sede_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE sede SET sede_estado = ? WHERE sede_id = ?";
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
                $actualizar = "UPDATE sede SET sede_estado = ? WHERE sede_id = ?";
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