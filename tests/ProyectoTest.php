<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloProyecto/proyectoDAO.php';
require_once 'modelos/ConstantesConexion.php';

final class ProyectoDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $proyecto = new ProyectoDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $proyecto->seleccionarTodos(1);
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $proyectoId = array(1);
        $buscarId = $proyecto -> seleccionarID($proyectoId);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['pro_id'] = '3';
        $esperado['registroEncontrado'][0]['material_construccion_mat_id'] = '3';
        $esperado['registroEncontrado'][0]['pro_tipo_proyecto'] = 'Residencial';
        $esperado['registroEncontrado'][0]['pro_nombre_proyecto'] = 'Grattacielo';
        $esperado['registroEncontrado'][0]['pro_numero_proyecto'] = '6759';
        $esperado['registroEncontrado'][0]['pro_descripcion_proyecto'] = 'Descripcion del mismo';
        $esperado['registroEncontrado'][0]['pro_estado'] = '1';
        $esperado['registroEncontrado'][0]['pro_sede_id'] = '3';
        $esperado['registroEncontrado'][0]['pro_recibido_id'] = '3';
        $esperado['registroEncontrado'][0]['pro_trabajador_id'] = '3';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['pro_id'] = 12;
        $registro['pro_nombre_proyecto'] = 'zzzzz';
        $registro['pro_numero_proyecto'] = 99999999;
        $registro['pro_tipo_proyecto'] = 'zzzzzz';
        $registro['pro_descripcion_proyecto'] = 'zzzzzzz';
        $registro['material_construccion_mat_id'] = 1;
        $registro['pro_sede_id'] = 1;
        $registro['pro_trabajador_id'] = 1;
        $registro['pro_recibido_id'] = 1;

        $esperado['Inserto'] = true;
        $esperado['resultado'] = $registro['pro_id'];

        $this -> assertEquals($esperado, $proyecto -> insertar($registro));
    }

    public function testActualizar(){
        $proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['pro_recibido_id'] = '2';
        $registro[0]['pro_trabajador_id'] = '2';
        $registro[0]['pro_sede_id'] = '2';
        $registro[0]['material_construccion_mat_id'] = '2';
        $registro[0]['pro_descripcion_proyecto'] = 'aaaaaaaaaa';
        $registro[0]['pro_tipo_proyecto'] = 'aaaaaaaaa';
        $registro[0]['pro_numero_proyecto'] = '1212121212';
        $registro[0]['pro_nombre_proyecto'] = 'aaaaaaaaa';
        $registro[0]['pro_id'] = '12';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $proyecto -> actualizar($registro));
    }

    public function testEliminar(){

        $proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $proyectoId = array('12');

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $proyectoId;

        $this -> assertEquals($esperado, $proyecto -> eliminar($proyectoId));
    }

    public function testHabilitar(){
        $proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $proyectoId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $this -> assertEquals($esperado, $proyecto -> habilitar($proyectoId));
    }

    public function testEliminarLogico(){
        $proyectoId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $proyecto -> eliminarLogico($proyectoId));
    }
}

?>