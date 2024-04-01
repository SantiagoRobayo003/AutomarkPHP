<?php

include_once "conexion.php";

class loginModelo {

    public static function mdlLogin($email,$password){
        $mensaje = array();
        try {
            $sql = "SELECT * FROM usuario INNER JOIN tipo_usuario ON usuario.tipo_usuario_idtipo_usuario = tipo_usuario.idtipo_usuario WHERE usuario.email = :email AND usuario.password = :password";
            $objrespuesta = Conexion::conectar()->prepare($sql);
            $objrespuesta->bindParam(":email", $email);
            $objrespuesta->bindParam(":password", $password);
            $objrespuesta->execute();
            $datos_usuario = $objrespuesta->fetch();
            $objrespuesta = null;

            if ($datos_usuario != null) {
                $_SESSION["ruta"] = "";
                if ($datos_usuario["idtipo_usuario"] == "1") {
                    $_SESSION["ruta"] = "inicioAdmin";

                }elseif ($datos_usuario["idtipo_usuario"] == "2") {
                    $_SESSION["ruta"] = "inicioEmpleado";
                    
                }elseif ($datos_usuario["idtipo_usuario"] == "3") {
                    $_SESSION["ruta"] = "inicioCliente";
                }
                
                $mensaje = array("codigo"=>"200", "mensaje"=>$_SESSION["ruta"]);
                
            }else {
                $mensaje = array("codigo"=>"425","mensaje"=>"Error al iniciar sesion por favor verifique sus datos");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo"=>"425","mensaje"=>$e->getMessage());
        }
        return $mensaje;
    }
}