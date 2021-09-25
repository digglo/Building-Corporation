<?php

include_once PATH . 'modelos/ConBdMysql.php';

class ProyectoDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }

    public function seleccionarTodos($Estado){
        $planconsulta = "SELECT * FROM proyecto WHERE pro_estado=:pro_estado;";

        $registroProyecto = $this->conexion->prepare($planconsulta);
        $registroProyecto -> bindParam(":pro_estado", $Estado);

        $registroProyecto->execute();

        $listadoRegistrosProyecto = array();

        while( $registro = $registroProyecto->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosProyecto[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosProyecto;
    }

    public function seleccionarID($sId){

        $consulta="select * from proyecto where pro_id  =?";

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
            
            $consulta="insert into proyecto";
            $consulta.= " (pro_id, 
                           pro_nombre_proyecto,
                           pro_numero_proyecto,
                           pro_tipo_proyecto,
                           pro_descripcion_proyecto,
                           material_construccion_mat_id,
                           pro_sede_id,
                           pro_trabajador_id,
                           pro_recibido_id,
                           pro_fecha_inicio,
                           pro_fecha_fin) ";
            $consulta.= "values (:pro_id, 
                                 :pro_nombre_proyecto,
                                 :pro_numero_proyecto,
                                 :pro_tipo_proyecto,
                                 :pro_descripcion_proyecto,
                                 :material_construccion_mat_id,
                                 :pro_sede_id,
                                 :pro_trabajador_id,
                                 :pro_recibido_id,
                                 :pro_fecha_inicio,
                                 :pro_fecha_fin);";

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":pro_id", $registro['pro_id']);
            $insertar -> bindParam(":pro_nombre_proyecto", $registro['pro_nombre_proyecto']);
            $insertar -> bindParam(":pro_numero_proyecto", $registro['pro_numero_proyecto']);
            $insertar -> bindParam(":pro_tipo_proyecto", $registro['pro_tipo_proyecto']);
            $insertar -> bindParam(":pro_descripcion_proyecto", $registro['pro_descripcion_proyecto']);
            $insertar -> bindParam(":material_construccion_mat_id", $registro['material_construccion_mat_id']);
            $insertar -> bindParam(":pro_sede_id", $registro['pro_sede_id']);
            $insertar -> bindParam(":pro_trabajador_id", $registro['pro_trabajador_id']);
            $insertar -> bindParam(":pro_recibido_id", $registro['pro_recibido_id']);
            $insertar -> bindParam(":pro_fecha_inicio", $registro['pro_fecha_inicio']);
            $insertar -> bindParam(":pro_fecha_fin", $registro['pro_fecha_fin']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $nombreProyecto = $registro[0]['pro_nombre_proyecto'];
            $numeroProyecto = $registro[0]['pro_numero_proyecto'];
            $tipoProyecto = $registro[0]['pro_tipo_proyecto'];
            $descripcionProyecto = $registro[0]['pro_descripcion_proyecto'];
            $materialConstruccion = $registro[0]['material_construccion_mat_id'];
            $sedeId = $registro[0]['pro_sede_id'];
            $trabajadorId = $registro[0]['pro_trabajador_id'];
            $fechaInicio = $registro[0]['pro_fecha_inicio'];
            $fechaFin = $registro[0]['pro_fecha_fin'];
            $recibido = $registro[0]['pro_recibido_id'];
            $pro_id = $registro[0]['pro_id'];
            
            if(isset( $pro_id)){
                $consulta = " update proyecto";
                $consulta.= " set  pro_nombre_proyecto = ?, 
                                   pro_numero_proyecto = ?,
                                   pro_tipo_proyecto = ?,
                                   pro_descripcion_proyecto = ?,
                                   material_construccion_mat_id = ?,
                                   pro_sede_id = ?,
                                   pro_trabajador_id = ?,
                                   pro_fecha_inicio = ?,
                                   pro_fecha_fin = ?,
                                   pro_recibido_id = ?";
                $consulta.= " WHERE pro_id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($nombreProyecto, 
                                                            $numeroProyecto, 
                                                            $tipoProyecto,
                                                            $descripcionProyecto,
                                                            $materialConstruccion,
                                                            $sedeId,
                                                            $trabajadorId,
                                                            $fechaInicio,
                                                            $fechaFin,
                                                            $recibido,
                                                            $pro_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM proyecto WHERE pro_id = :pro_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':pro_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE proyecto SET pro_estado = ? WHERE pro_id = ?";
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
                $actualizar = "UPDATE proyecto SET pro_estado = ? WHERE pro_id = ?";
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