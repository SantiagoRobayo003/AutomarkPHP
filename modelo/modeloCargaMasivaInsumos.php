<?php

require_once "conexion.php";

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;
use PhpOffice\PhpSpreadsheet\IOFactory;

class modeloCargaMasivaInsumos
{

    public static function mdlCargarInsumos($fileInsumos)
    {
        $nombreArchivo = $fileInsumos["tmp_name"];
        $documento = IOFactory::load($nombreArchivo);

        $hojaInsumos = $documento->getSheetByName("Insumos");
        $numeroFilas = $hojaInsumos->getHighestDataRow();

        $insumosRegistrados = 0;
        //CICLO FOR PARA REGISTRAR INSUMOS
        $mensaje = array();
        try {
            for ($i = 2; $i < $numeroFilas; $i++) {

                $nombre_insumo = $hojaInsumos->getCell("A". $i);
                $descripcion_insumo = $hojaInsumos->getCell("B". $i);
                $valor_insumo = $hojaInsumos->getCell("C". $i);

                if (!empty($nombre_insumo)) {
                    $sql = "INSERT INTO insumos (nombre_insumo,
                                                descripcion_insumo,
                                                valor_insumo)
                                                VALUES 
                                                (:nombre_insumo,
                                                :descripcion_insumo,
                                                :valor_insumo)";
                    $objRespuesta = Conexion::conectar()->prepare($sql);
                    $objRespuesta->bindParam(":nombre_insumo", $nombre_insumo);
                    $objRespuesta->bindParam(":descripcion_insumo", $descripcion_insumo);
                    $objRespuesta->bindParam(":valor_insumo", $valor_insumo);

                    if ($objRespuesta->execute()) {
                        $insumosRegistrados = $insumosRegistrados + 1;
                    }
                }
            }
            if ($insumosRegistrados>0) {
                $mensaje = array("codigo"=>"200","mensaje"=>"Se registraron ".$insumosRegistrados." productos correctamente");
            }
        } catch (Exception $e) {
            $mensaje = array("codigo"=>"425","mensaje"=>$e->getMessage());
        }
        return $mensaje;
    }
}
