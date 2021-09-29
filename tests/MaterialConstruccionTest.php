<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloMaterialConstruccion/material_ConstruccionDAO.php';
require_once 'modelos/ConstantesConexion.php';

final class MaterialConstruccionDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $materialConstruccion = new MaterialConstruccionDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $materialConstruccion->seleccionarTodos();
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $materialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $materialConstruccionId = array(1);
        $buscarId = $materialConstruccion -> seleccionarID($materialConstruccionId);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['pro_id'] = '3';
        $esperado['registroEncontrado'][0]['material_construccion_mat_id'] = '3';
        $esperado['registroEncontrado'][0]['mat_nombre_material'] = 'Eternit';
        $esperado['registroEncontrado'][0]['mat_tipo_material'] = 'cubierta';
        $esperado['registroEncontrado'][0]['mat_precio'] = '32000';
        $esperado['registroEncontrado'][0]['mat_estado'] = '1';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $materialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['mat_id'] = 12;
        $registro['mat_nombre_material'] = 'zzzzz';
        $registro['mat_precio'] = 99999999;
        $registro['mat_tipo_material'] = 'zzzzzz';

        $esperado['Inserto'] = true;
        $esperado['resultado'] = $registro['mat_id'];

        $this -> assertEquals($esperado, $materialConstruccion -> insertar($registro));
    }

    public function testActualizar(){
        $materialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['mat_tipo_material'] = 'aaaaaaaaa';
        $registro[0]['mat_precio'] = '1212121212';
        $registro[0]['mat_nombre_material'] = 'aaaaaaaaa';
        $registro[0]['mat_id'] = '12';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $materialConstruccion -> actualizar($registro));
    }

    public function testEliminar(){

        $materialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $materialConstruccionId = array('12');

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $materialConstruccionId;

        $this -> assertEquals($esperado, $materialConstruccion -> eliminar($materialConstruccionId));
    }

    public function testHabilitar(){
        $materialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $materialConstruccionId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $this -> assertEquals($esperado, $materialConstruccion -> habilitar($materialConstruccionId));
    }

    public function testEliminarLogico(){
        $materialConstruccionId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $materialConstruccion = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $materialConstruccion -> eliminarLogico($materialConstruccionId));
    }
}

?>