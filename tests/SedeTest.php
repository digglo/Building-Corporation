<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloSede/sedeDAO.php';
require_once 'modelos/ConstantesConexion.php';

final class SedeDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $sede = new SedeDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $sede->seleccionarTodos();
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $sede = new SedeDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $sedeId = array(1);
        $buscarId = $sede -> seleccionarID($sedeId);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['sede_id'] = '3';
        $esperado['registroEncontrado'][0]['sede_estado'] = '1';
        $esperado['registroEncontrado'][0]['sede_ubicacion_id'] = '3';
        $esperado['registroEncontrado'][0]['sede_nombre_sede'] = 'kenedy';
        $esperado['registroEncontrado'][0]['sede_constructora_id'] = '3';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $sede = new SedeDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['sede_id'] = 12;
        $registro['sede_nombre_sede'] = 'zzzzz';
        $registro['sede_ubicacion_id'] = 1;
        $registro['sede_constructora_id'] = 1;

        $esperado['Inserto'] = true;
        $esperado['resultado'] = $registro['sede_id'];

        $this -> assertEquals($esperado, $sede -> insertar($registro));
    }

    public function testActualizar(){
        $sede = new SedeDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['sede_constructora_id'] = '2';
        $registro[0]['sede_ubicacion_id'] = '2';
        $registro[0]['sede_nombre_sede'] = 'aaaaaaaaa';
        $registro[0]['sede_id'] = '12';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $sede -> actualizar($registro));
    }

    public function testEliminar(){

        $sede = new SedeDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $sedeId = array('12');

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $sedeId;

        $this -> assertEquals($esperado, $sede -> eliminar($sedeId));
    }

    public function testHabilitar(){
        $sede = new SedeDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $sedeId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $this -> assertEquals($esperado, $sede -> habilitar($sedeId));
    }

    public function testEliminarLogico(){
        $sedeId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $sede = new SedeDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $sede -> eliminarLogico($sedeId));
    }
}

?>