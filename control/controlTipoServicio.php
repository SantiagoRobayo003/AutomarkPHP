<?php

include_once "../modelo/modeloTipoServicio.php";

class controlTipoServicio
{

    public $id;
    public $tipoServicio;

    public function ctrRegistro()
    {
        $objrespuesta = modeloTipoServicio::mdlRegistrarTS($this->tipoServicio);
        echo json_encode($objrespuesta);
    }
    public function ctrListar()
    {
        $objrespuesta = modeloTipoServicio::mdlListarTS();
        echo json_encode($objrespuesta);
    }
    public function ctrEditar()
    {
        $objrespuesta = modeloTipoServicio::mdlEditarTS($this->id, $this->tipoServicio);
        echo json_encode($objrespuesta);
    }
    public function ctrEliminar()
    {
        $objrespuesta = modeloTipoServicio::mdlEliminarTS($this->id);
        echo json_encode($objrespuesta);
    }
}
if (isset($_POST["tipo_servicio"])) {
    $Objtipo = new controlTipoServicio();
    $Objtipo->tipoServicio = $_POST["tipo_servicio"];
    $Objtipo->ctrRegistro();
}
if (isset($_POST["listarDatos"]) == "ok") {
    $Objtipo = new controlTipoServicio();
    $Objtipo->ctrListar();
}
if (isset($_POST["editNombre"], $_POST["editId"])) {
    $Objtipo = new controlTipoServicio();
    $Objtipo->id = $_POST["editId"];
    $Objtipo->tipoServicio = $_POST["editNombre"];
    $Objtipo->ctrEditar();
}
if (isset($_POST["idEliminarTipo"])) {
    $Objtipo = new controlTipoServicio();
    $Objtipo->id = $_POST["idEliminarTipo"];
    $Objtipo->ctrEliminar();
}
