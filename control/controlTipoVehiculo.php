<?php 

include_once "../modelo/modeloTipoVehiculo.php";

class controlTipoVehiculo {
    
    public $id;
    public $tipoVehiculo;

    public function ctrRegistro (){
        $objrespuesta = modeloTipoVehiculo::mdlRegistrarTV($this->tipoVehiculo);
        echo json_encode($objrespuesta);
    }
    public function ctrListar (){
        $objrespuesta = modeloTipoVehiculo::mdlListarTV();
        echo json_encode($objrespuesta);
    }
    public function ctrEditar(){
        $objrespuesta = modeloTipoVehiculo::mdlEditarTV($this->id,$this->tipoVehiculo);
        echo json_encode($objrespuesta);
    }
    public function ctrEliminar(){
        $objrespuesta = modeloTipoVehiculo::mdlEliminarTV($this->id);
        echo json_encode($objrespuesta);
    }
}
if (isset($_POST["tipo_vehiculo"])) {
    $Objtipo = new controlTipoVehiculo();
    $Objtipo-> tipoVehiculo = $_POST["tipo_vehiculo"];
    $Objtipo->ctrRegistro();
}
if (isset($_POST["listarDatos"])=="ok") {
    $Objtipo = new controlTipoVehiculo();
    $Objtipo->ctrListar();
}
if (isset($_POST["editNombre"], $_POST["editId"])) {
    $Objtipo = new controlTipoVehiculo();
    $Objtipo-> id = $_POST["editId"];
    $Objtipo-> tipoVehiculo = $_POST["editNombre"];
    $Objtipo->ctrEditar();
}
if (isset($_POST["idEliminarTipo"])) {
    $Objtipo = new controlTipoVehiculo();
    $Objtipo-> id = $_POST["idEliminarTipo"];
    $Objtipo->ctrEliminar();
}