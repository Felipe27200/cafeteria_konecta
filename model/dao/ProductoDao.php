<?php
namespace model\dao;

use model\dto\Producto as Producto;
use config\Conexion as Conexion;
use Exception;

require_once "../model/dto/Producto.php";
require_once "../config/conexion.php";


class ProductoDao
{
    public function registrarProducto(Producto $producto)
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("INSERT INTO productos (categoria_id, nombre, referencia, precio, peso, stock, fecha_creacion) VALUE (?, ?, ?, ?, ?, ?, ?);");
    
            $query->bindParam(1, $producto->getCategoria_id());
            $query->bindParam(2, $producto->getNombre());
            $query->bindParam(3, $producto->getReferencia());
            $query->bindParam(4, $producto->getPrecio());
            $query->bindParam(5, $producto->getPeso());
            $query->bindParam(6, $producto->getStock());
            $query->bindParam(7, $producto->getFechaCreacion());
    
            $query->execute();
    
            $mensaje = "Producto Registrado";
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function editarProducto(Producto $producto)
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("UPDATE productos SET categoria_id = ?, nombre = ?, referencia = ?, "
                ."precio = ?, peso = ?, stock = ?, fecha_creacion = ? WHERE id = ?;");
    
            $query->bindParam(1, $producto->getCategoria_id());
            $query->bindParam(2, $producto->getNombre());
            $query->bindParam(3, $producto->getReferencia());
            $query->bindParam(4, $producto->getPrecio());
            $query->bindParam(5, $producto->getPeso());
            $query->bindParam(6, $producto->getStock());
            $query->bindParam(7, $producto->getFechaCreacion());
            $query->bindParam(8, $producto->getId());

            $query->execute();
    
            $mensaje = "Producto Modificado";    
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function actualizarStock(Producto $producto)
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("UPDATE productos SET stock = ? WHERE id = ?;");

            $stock = $producto->getStock();
            $id = $producto->getId();

            $query->bindParam(1, $stock);
            $query->bindParam(2, $id);

            $query->execute();
    
            $mensaje = "true";    
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function eliminarProducto(Producto $producto)
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("DELETE FROM productos WHERE id = ?;");
    
            $query->bindParam(1, $producto->getId());

            $query->execute();
    
            $mensaje = "Producto Eliminado";    
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function obtenerProducto(Producto $producto)
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();

        try
        {
            $query = $conexion->prepare("SELECT * FROM productos WHERE id = ?;");

            $id = $producto->getId();
            
            $query->bindParam(1, $id);

            $query->execute();

            $resultado = $query->fetchAll();
            $json = array();
            
            foreach($resultado as $fila) 
            {
                array_push($json, 
                    array(
                        "id" => $fila['id'],
                        "categoria_id" => $fila["categoria_id"],
                        "nombre" => $fila["nombre"],
                        "referencia" => $fila["referencia"],
                        "precio" => $fila["precio"],
                        "peso" => $fila["peso"],
                        "stock" => $fila["stock"],
                        "fecha_creacion" => $fila["fecha_creacion"],
                    ));
            }

            return json_encode($json);
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function listarProductos()
    {
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();

        try
        {
            $query = $conexion->prepare("SELECT p.*, c.nombre as nombre_categoria FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id;");

            $query->execute();

            $resultado = $query->fetchAll();
            $json = array();
            
            foreach($resultado as $fila) 
            {
                array_push($json, 
                    array(
                        "id" => $fila['id'],
                        "categoria_id" => $fila["nombre_categoria"],
                        "nombre" => $fila["nombre"],
                        "referencia" => $fila["referencia"],
                        "precio" => $fila["precio"],
                        "peso" => $fila["peso"],
                        "stock" => $fila["stock"],
                        "fecha_creacion" => $fila["fecha_creacion"],
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