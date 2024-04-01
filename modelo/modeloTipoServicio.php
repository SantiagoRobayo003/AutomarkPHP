<?php

include_once "conexion.php";

class modeloTipoServicio
{
    public static function mdlRegistrarTS($tipoServicio)
    {
        $mensaje = array();
        try {
            $sql = "INSERT INTO tipo_servicio (nombre_tipo_servicio) VALUES (:nombre_tipo_servicio)";
            $Objrespuesta = Conexion::conectar()->prepare($sql);
            $Objrespuesta->bindParam(":nombre_tipo_servicio", $tipoServicio);
            if ($Objrespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Tipo de servicio registrado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al registrar el Tipo de servicio");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
    public static function mdlListarTS()
    {
        $listarTipos = null;
        try {
            $sql = "SELECT * FROM tipo_servicio";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->execute();
            $listarTipos = $objRespuesta->fetchAll();
            $objRespuesta = null;
        } catch (Exception $e) {
            
            $listarTipos = $e->getMessage();
        }
        return $listarTipos;
    }
    public static function mdlEditarTS($id, $tipoServicio)
    {
        $mensaje = array();
        try {
            $sql = "UPDATE tipo_servicio SET idtipo_servicio=:idtipo_servicio,nombre_tipo_servicio=:nombre_tipo_servicio WHERE idtipo_servicio=:idtipo_servicio";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->bindParam(":idtipo_servicio", $id);
            $objRespuesta->bindParam(":nombre_tipo_servicio", $tipoServicio);

            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Tipo de servicio editado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al editar el Tipo de vehiculo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
    public static function mdlEliminarTS($id)
    {
        $mensaje = array();
        try {
            $sql = "DELETE FROM tipo_servicio WHERE idtipo_servicio=:idtipo_servicio";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->bindParam(":idtipo_servicio", $id);
            if ($objRespuesta->execute()) {
                $mensaje = array("codigo" => "200", "mensaje" => "Tipo de servicio eliminado correctamente");
            } else {
                $mensaje = array("codigo" => "425", "mensaje" => "Error al eliminar el Tipo de servicio");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
        }
        return $mensaje;
    }
}
