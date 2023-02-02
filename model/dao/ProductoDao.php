<?php

class ProductoDao
{
    public function registrarProducto(Producto $producto)
    {
        $conexion = new Conexion();
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
        $conexion = new Conexion();
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

    public function eliminarProducto(Producto $producto)
    {
        $conexion = new Conexion();
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
        $conexion = new Conexion();

        try
        {
            $query = $conexion->prepare("SELECT * FROM productos WHERE id = ?;");
    
            $query->bindParam(1, $producto->getId());

            $query->execute();

            return $query->fetch();
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function listarProductos()
    {
        $conexion = new Conexion();

        try
        {
            $query = $conexion->prepare("SELECT * FROM productos;");

            $query->execute();

            return $query->fetchAll();
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}

?>