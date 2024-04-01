<?php

include_once "../modelo/modeloInsumos.php";

class controlInsumos {
    public $id;
    public $name;
    public $description;
    public $value;

    public function ctrRegistrarInsumos(){
        $ObjRespuesta = modeloInsumos::mdlRegistrarInsumos($this->name,$this->description,$this->value);
        echo json_encode($ObjRespuesta);
    }
    public function ctrListarInsumos(){
        $ObjRespuesta = modeloInsumos::mdlListarInsumos();
        echo json_encode($ObjRespuesta);
    }
    public function ctrEditarInsumos (){
        $ObjRespuesta = modeloInsumos::mdlEditarInsumo($this->name,$this->description,$this->value,$this->id);
        echo json_encode($ObjRespuesta);
    }
    public function ctrEliminarInsumos(){
        $ObjRespuesta = modeloInsumos::mdlEliminarInsumo($this->id);
        echo json_encode($ObjRespuesta);
    }
}
if (isset($_POST["nombre_insumo"],$_POST["descripcion_insumo"],$_POST["valor_insumo"])) {
    $ObjInsumos = new controlInsumos();
    $ObjInsumos->name = $_POST["nombre_insumo"];
    $ObjInsumos->description = $_POST["descripcion_insumo"];
    $ObjInsumos->value = $_POST["valor_insumo"];
    $ObjInsumos -> ctrRegistrarInsumos();
}

if (isset($_POST["listarInsumos"])=="ok") {
    $ObjInsumos = new controlInsumos();
    $ObjInsumos->ctrListarInsumos();
}

if (isset($_POST["editNombre"],$_POST["editDescripcion"],$_POST["editValor"],$_POST["editId"])) {
    $ObjInsumos = new controlInsumos();
    $ObjInsumos-> name = $_POST["editNombre"];
    $ObjInsumos-> description = $_POST["editDescripcion"];
    $ObjInsumos-> value = $_POST["editValor"];
    $ObjInsumos-> id = $_POST["editId"];
    $ObjInsumos->ctrEditarInsumos();
}

if (isset($_POST["idEliminarUsuario"])) {
    $ObjInsumos = new controlInsumos();
    $ObjInsumos->id = $_POST["idEliminarUsuario"];
    $ObjInsumos->ctrEliminarInsumos();
}