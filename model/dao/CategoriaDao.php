<?php
namespace model\dao;

use model\dto\Categoria as Categoria;
use config\Conexion as Conexion;
use Exception;

require_once "../model/dto/Categoria.php";
require_once "../config/conexion.php";

class CategoriaDao
{
    function __construct()
    {

    }

    public function registrarCategoria(Categoria $categoria)
    {        
        $objectConexion = new Conexion();
        $conexion = $objectConexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("INSERT INTO categorias (nombre) VALUE (?);");
    
            $query->bindParam(1, $categoria->getNombre());
    
            $query->execute();
    
            $mensaje = "Categoría Registrada";
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function editarCategoria(Categoria $categoria)
    {
        $conexion = new Conexion();
        $conexion = $conexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("UPDATE categorias SET nombre = ? WHERE id = ?;");
    
            $query->bindParam(1, $categoria->getNombre());
            $query->bindParam(2, $categoria->getId());

            $query->execute();
    
            $mensaje = "Categoría Modificada";    
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function eliminarCategoria(Categoria $categoria)
    {
        $conexion = new Conexion();
        $conexion = $conexion->obtenerConexion();
        $mensaje = "";

        try
        {
            $query = $conexion->prepare("DELETE FROM categorias WHERE id = ?;");
    
            $query->bindParam(1, $categoria->getId());

            $query->execute();
    
            $mensaje = "Categoría Eliminada";    
        }
        catch (Exception $e)
        {
            $mensaje = $e->getMessage();
        }

        return $mensaje;
    }

    public function obtenerCategoria(Categoria $categoria)
    {
        $conexion = new Conexion();
        $conexion = $conexion->obtenerConexion();

        try
        {
            $query = $conexion->prepare("SELECT * FROM categorias WHERE id = ?;");

            $id = $categoria->getId();
            $query->bindParam(1, $id);

            $query->execute();

            $resultado = $query->fetchAll();
            $json = array();

            foreach($resultado as $fila)
            {
                array_push($json,
                    array(
                        "id" => $fila['id'],
                        "nombre" => $fila['nombre']
                    ));
            }

            return json_encode($json);
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function listarCategorias()
    {
        $conexion = new Conexion();
        $conexion = $conexion->obtenerConexion();

        try
        {
            $query = $conexion->prepare("SELECT * FROM categorias;");

            $query->execute();
            
            $resultado = $query->fetchAll();
            $json = array();
            
            foreach($resultado as $fila) 
            {
                array_push($json, 
                    array(
                        "id" => $fila['id'],
                        "nombre" => $fila["nombre"]
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