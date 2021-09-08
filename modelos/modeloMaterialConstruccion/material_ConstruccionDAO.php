<?php

include_once PATH . 'modelos/ConBdMysql.php';

class MaterialConstruccionDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from material_construccion;";

        $registroMaterialConstruccion = $this->conexion->prepare($planconsulta);
        $registroMaterialConstruccion->execute();

        $listadoRegistrosMaterialConstruccion = array();

        while( $registro = $registroMaterialConstruccion->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosMaterialConstruccion[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosMaterialConstruccion;
    }

    public function seleccionarID($sId){

        $consulta="SELECT * FROM material_construccion WHERE mat_id=?";

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
            
            $consulta="insert into material_construccion (mat_id, mat_nombre_material, mat_precio, mat_tipo_material) VALUES (:mat_id, :mat_nombre_material, :mat_precio, :mat_tipo_material);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":mat_id", $registro['mat_id']);
            $insertar -> bindParam(":mat_nombre_material", $registro['mat_nombre_material']);
            $insertar -> bindParam(":mat_precio", $registro['mat_precio']);
            $insertar -> bindParam(":mat_tipo_material", $registro['mat_tipo_material']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $mat_id = $registro[0]['mat_id'];
            $nombreMaterial = $registro[0]['mat_nombre_material'];
            $precio = $registro[0]['mat_precio'];
            $tipoMaterial = $registro[0]['mat_tipo_material'];
            
            if(isset($mat_id)){
                $consulta = "update material_construccion";
                $consulta.=" SET  mat_nombre_material = ?, mat_precio = ?, mat_tipo_material = ? ";
                $consulta.=" WHERE mat_id = ?;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array( $nombreMaterial, $precio, $tipoMaterial,$mat_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM material_construccion WHERE mat_id = :mat_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':mat_id', $sId[0],PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreBd();

        if(!empty($resultado)){
            return ['eliminado' => true, 'registroEliminado' => array($sId[0])];
        }else{
            return ['eliminado' => false, 'registroEliminado' => array($sId[0])];
        }

    }

    //falta el estado de esta tabla

    public function habilitar($sId = array()){

        try {
            $Estado = 1;

            if(isset($sId[0])){
                $actualizar = "UPDATE material_construccion SET rol_autEstado = ? WHERE mat_id = ?";
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
                $actualizar = "UPDATE rol SET rol_autEstado = ? WHERE rol_id_rol = ?";
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