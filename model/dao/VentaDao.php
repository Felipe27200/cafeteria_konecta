<?php
namespace model\dao;

use model\dto\Venta as Venta;
use config\Conexion as Conexion;
use Exception;

require_once "../model/dto/Venta.php";
require_once "../config/conexion.php";


class VentaDao
{
    public function registrarVenta(Venta $venta)
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("INSERT INTO ventas (producto_id, cantidad) VALUE (?, ?);");

            $producto = $venta->getProductoId();
            $cantidad = $venta->getCantidad();
            
            $query->bindParam(1, $producto);
            $query->bindParam(2, $cantidad);
    
            $query->execute();
    
            $mensaje = "true";
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function listarVentas()
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();

        try
        {
            $query = $conexion->prepare("SELECT v.*, p.nombre as nombre_producto, p.precio as precio FROM ventas v INNER JOIN productos p ON p.id = v.producto_id;");

            $query->execute();

            $resultado = $query->fetchAll();
            $json = array();
            
            foreach($resultado as $fila) 
            {
                array_push($json, 
                    array(
                        "id" => $fila['id'],
                        "producto_id" => $fila["nombre_producto"],
                        "cantidad" => $fila["cantidad"],
                        "precio" => $fila["precio"],
                    ));
            }

            return json_encode($json);
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}

?>