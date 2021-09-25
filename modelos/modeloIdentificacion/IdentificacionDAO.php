<?php
include_once 'modelos/ConBdMysql.php';


class IdentificacionDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }

    public function seleccionarTodos($Estado){
        $planconsulta = "SELECT * FROM identificacion WHERE ide_estado=:ide_estado;";

        $registroTipoDocumento = $this->conexion->prepare($planconsulta);
        $registroTipoDocumento -> bindParam(":ide_estado", $Estado);

        $registroTipoDocumento->execute();

        $listadoRegistrosTipoDocumento = array();

        while( $registro = $registroTipoDocumento->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosTipoDocumento[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosTipoDocumento;
    }

    public function seleccionarID($sId){

        $consulta="select * FROM identificacion WHERE ide_id=?";

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
            
            $consulta="INSERT INTO identificacion (ide_id, ide_sigla, ide_descripcion) VALUES (:ide_id, :ide_sigla, :ide_descripcion);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":ide_sigla", $registro['ide_sigla']);
            $insertar -> bindParam(":ide_id", $registro['ide_id']);
            $insertar -> bindParam(":ide_descripcion", $registro['ide_descripcion']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $sigla = $registro[0]['ide_sigla'];
            $descipcion = $registro[0]['ide_descripcion'];
            $ide_id = $registro[0]['ide_id'];
            
            if(isset($ide_id)){
                $consulta = "UPDATE identificacion SET  ide_sigla = ?, ide_descripcion = ?
                WHERE ide_id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($sigla, $descipcion, $ide_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM identificacion WHERE ide_id = :ide_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':ide_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE identificacion SET ide_estado  = ? WHERE ide_id  = ?";
                $actualizar = $this->conexion->prepare($actualizar);
                $actualizar = $actualizar->execute(array($Estado, $sId[0]));
                return ['actualizacion' => $actualizar, 'mensaje' => 'Resgistro Activado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => false, $pdoExc->errorInfo[2]];
        }
    }

    public function eliminarLogico($sId = array()){

        try {
            $Estado = 0;

            if(isset($sId[0])){
                $actualizar = "UPDATE identificacion SET ide_estado  = ? WHERE ide_id  = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($Estado, $sId[0]));
                return ['actualizacion' => true, 'mensaje' => 'Resgistro Desactivado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => false, 'mensaje' => $pdoExc];
        }
        
    }

    }

?>