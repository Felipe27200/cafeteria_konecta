<?php
namespace controllers;

use model\dao\VentaDao as VentaDao;
use model\dto\Venta as Venta;
use model\dao\ProductoDao as ProductoDao;
use model\dto\Producto as Producto;

require_once "../model/dao/VentaDao.php";
require_once "../model/dto/Venta.php";
require_once "../model/dao/ProductoDao.php";
require_once "../model/dto/Producto.php";


$catergoriaController = new VentaController($_POST ?? $_GET);

class VentaController
{
    private $dao;
    function __construct($datos)
    {
        $this->dao = new VentaDao();

        if (!isset($datos['metodo']))
            $datos = $_GET;

        $this->{$datos['metodo']}($datos);
    }

    public function registrarVenta($datos)
    {
        $dto = new Venta();
        $productoDto = new Producto($datos["producto_id"]);
        $productoDao = new ProductoDao();
        
        $producto = $productoDao->obtenerProducto($productoDto);
        $producto = json_decode($producto, true);

        if (($producto[0]["stock"] - $datos["cantidad"]) <= 0)
        {
            echo "false";
            return;
        }

        $productoDto->setStock(($producto[0]["stock"] - $datos["cantidad"]));
        $productoDao->actualizarStock($productoDto);

        $dto->setProductoId($datos["producto_id"]);
        $dto->setCantidad($datos["cantidad"]);

        echo $this->dao->registrarVenta($dto);
    }

    public function listarVentas()
    {
        echo $this->dao->listarVentas();
    }
}

?>