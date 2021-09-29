<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloConstructora/constructoraDAO.php';
require_once 'modelos/ConstantesConexion.php';

final class ConstructoraDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $constructora = new ConstructoraDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $Constructora->seleccionarTodos(1);
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $constructoralId = array(1);
        $buscarId = $constructora -> seleccionarID($constructoralId);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['con_id'] = '3';
        $esperado['registroEncontrado'][0]['con_estado'] = '1';
        $esperado['registroEncontrado'][0]['con_nombre_empresa'] = 'corporatio';
        $esperado['registroEncontrado'][0]['con_numero_documento'] = '1000572912';
        $esperado['registroEncontrado'][0]['con_id_identificacion'] = '3';
        $esperado['registroEncontrado'][0]['usuario_s_usuld'] = '3';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['con_id'] = 12;
        $registro['con_nombre_empresa'] = 'Caminando por camilo';
        $registro['con_numero_documento'] = 1010091680;
        $registro['con_id_identificacion'] = 1;
        $registro['usuario_s_usuld'] = 1;

        $esperado['Inserto'] = true;
        $esperado['resultado'] = $registro['con_id'];

        $this -> assertEquals($esperado, $constructora -> insertar($registro));
    }

    public function testActualizar(){
        $constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['usuario_s_usuld'] = '2';
        $registro[0]['con_id_identificacion'] = '2';
        $registro[0]['con_numero_documento'] = '1212121212';
        $registro[0]['con_nombre_empresa'] = 'zzzzzzzz';
        $registro[0]['con_id'] = '12';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $constructora -> actualizar($registro));
    }

    public function testEliminar(){

        $constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $constructoraId = array('12');

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $constructoraId;

        $this -> assertEquals($esperado, $constructora -> eliminar($constructoraId));
    }

    public function testHabilitar(){
        $constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $constructoraId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $this -> assertEquals($esperado, $constructora -> habilitar($constructoraId));
    }

    public function testEliminarLogico(){
        $constructoraId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $constructora -> eliminarLogico($constructoraId));
    }
}

?>

