<?php

include_once "conexion.php";
class modeloTipoVehiculo
{
    public static function mdlRegistrarTV($tipoVehiculo)
    {
        $mensaje = array();
        try {
            $sql = "INSERT INTO tipo_vehiculo (idtipo_vehiculo, nombre_tipo_vehiculo) VALUES (:idtipo_vehiculo,:nombre_tipo_vehiculo)";
            $Objrespuesta = Conexion::conectar()->prepare($sql);
            $Objrespuesta->bindParam(":idtipo_vehiculo", $id);
            $Objrespuesta->bindParam(":nombre_tipo_vehiculo", $tipoVehiculo);
            if ($Objrespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Tipo de vehiculo registrado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al registrar el Tipo de vehiculo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        } 
        return $mensaje;
    }
    public static function mdlListarTV()
    {
        $listarTipos = null;
        try {
            $sql = "SELECT * FROM tipo_vehiculo";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->execute();
            $listarTipos = $objRespuesta->fetchAll();
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarTipos = $e->getMessage();
        }
        return $listarTipos;
    }
    public static function mdlEditarTV($id, $tipoVehiculo)
    {
        $mensaje = array();
        try {
            $sql = "UPDATE tipo_vehiculo SET idtipo_vehiculo=:idtipo_vehiculo,nombre_tipo_vehiculo=:nombre_tipo_vehiculo WHERE idtipo_vehiculo=:idtipo_vehiculo";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->bindParam(":idtipo_vehiculo", $id);
            $objRespuesta->bindParam(":nombre_tipo_vehiculo", $tipoVehiculo);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Tipo de vehiculo editado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al editar el Tipo de vehiculo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
    public static function mdlEliminarTV($id)
    {
        $mensaje = array();
        try {
            $sql = "DELETE FROM tipo_vehiculo WHERE idtipo_vehiculo=:idtipo_vehiculo";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->bindParam(":idtipo_vehiculo", $id);
            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Tipo de vehiculo eliminado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al eliminar el Tipo de vehiculo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}
