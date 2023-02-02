<?php
namespace controllers;

use model\dao\ProductoDao as ProductoDao;
use model\dto\Producto as Producto;

require_once "../model/dao/ProductoDao.php";
require_once "../model/dto/Producto.php";

$catergoriaController = new ProductoController($_POST ?? $_GET);

class ProductoController
{
    private $dao;
    function __construct($datos)
    {
        $this->dao = new ProductoDao();

        if (!isset($datos['metodo']))
            $datos = $_GET;

        $this->{$datos['metodo']}($datos);
    }

    public function registrarProducto($datos)
    {
        $dto = new Producto();
        $dto->setCategoria_id($datos["categoria_id"]);
        $dto->setNombre($datos["nombre"]);
        $dto->setReferencia($datos["referencia"]);
        $dto->setPrecio($datos["precio"]);
        $dto->setPeso($datos["peso"]);
        $dto->setStock($datos["stock"]);
        $dto->setFechaCreacion($datos["fecha_creacion"]);

        echo $this->dao->registrarProducto($dto);
    }

    public function listarProductos()
    {
        echo $this->dao->listarProductos();
    }

    public function eliminarProducto($datos)
    {
        $dto = new Producto($datos['id']);

        echo $this->dao->eliminarProducto($dto);
    }

    public function obtenerProducto($datos)
    {
        $dto = new Producto($datos["id"], );

        echo $this->dao->obtenerProducto($dto);
    }

    public function editarProducto($datos)
    {
        $dto = new Producto($datos["id"], $datos["categoria_id"], $datos["nombre"], $datos["referencia"], 
            $datos["precio"], $datos["peso"], $datos["stock"], $datos["fecha_creacion"]);

        echo $this->dao->editarProducto($dto);
    }
}

?>