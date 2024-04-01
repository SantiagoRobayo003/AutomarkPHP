<?php

include_once "conexion.php";

class modeloInsumos {
    public static function mdlRegistrarInsumos($name,$description,$value){
        $mensaje = array();
        try {
            $sql = "INSERT INTO insumos (nombre_insumo,descripcion_insumo,valor_insumo)VALUES (:nombre_insumo,:descripcion_insumo,:valor_insumo)";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->bindParam(":nombre_insumo",$name);
            $objRespuesta->bindParam(":descripcion_insumo",$description);
            $objRespuesta->bindParam(":valor_insumo",$value);
            if ($objRespuesta->execute()){
                $mensaje = array("codigo"=>"200","mensaje"=>"Insumo registrado correctamente");
            }else{
                $mensaje = array("codigo"=>"425","mensaje"=>"Error al registrar el Insumo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo"=>"425","mensaje"=>$e->getMessage());
        }
        return $mensaje;
    }
    
    public static function mdlListarInsumos(){
        $listarInsumos = null;
        try {
            $sql = "SELECT * FROM insumos";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->execute();
            $listarInsumos = $objRespuesta->fetchAll();
            $objRespuesta = null;
        } catch (Exception $e) {
            $listarInsumos = $e->getMessage();
        }
        return $listarInsumos;
    }

    public static function mdlEditarInsumo($name,$description,$value,$id){
        $mensaje = array();
        try {
            $objRespuesta = Conexion::conectar()->prepare("UPDATE insumos SET nombre_insumo=:nombre_insumo,descripcion_insumo=:descripcion_insumo,valor_insumo=:valor_insumo,idinsumos=:idinsumos WHERE idinsumos=:idinsumos");
            $objRespuesta->bindParam(":nombre_insumo",$name);
            $objRespuesta->bindParam(":descripcion_insumo",$description);
            $objRespuesta->bindParam(":valor_insumo",$value);
            $objRespuesta->bindParam(":idinsumos",$id);

            if ($objRespuesta->execute()){
                $mensaje = array("codigo"=>"200","mensaje"=>"Insumo editado correctamente");
            }else{
                $mensaje = array("codigo"=>"425","mensaje"=>"Error al editar el Insumo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo"=>"425","mensaje"=>$e->getMessage());
        }

        return $mensaje;
    }
    public static function mdlEliminarInsumo ($idimagenes){
        $mensaje = array();
        try {
            $sql = "DELETE FROM insumos WHERE idimagenes=:idimagenes";
            $objRespuesta = Conexion::conectar()->prepare($sql);
            $objRespuesta->bindParam(":idimagenes",$id);
            if ($objRespuesta->execute()){
                $mensaje = array("codigo"=>"200","mensaje"=>"Insumo eliminado correctamente");
            }else{
                $mensaje = array("codigo"=>"425","mensaje"=>"Error al eliminar el Insumo");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo"=>"425","mensaje"=>$e->getMessage());
        }
        return $mensaje;
    }
}