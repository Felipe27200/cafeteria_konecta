<?php
namespace controllers;

use model\dao\CategoriaDao as CategoriaDao;
use model\dto\Categoria as Categoria;

require_once "../model/dao/CategoriaDao.php";
require_once "../model/dto/Categoria.php";

$catergoriaController = new CategoriaController($_POST ?? $_GET);

class CategoriaController
{
    private $dao;

    function __construct($datos)
    {
        $this->dao = new CategoriaDao();

        if (!isset($datos['metodo']))
            $datos = $_GET;

        $this->{$datos['metodo']}($datos);
    }

    public function registrarCategoria($datos)
    {
        $dto = new Categoria();
        $dto->setNombre($datos["nombre_categoria"]);

        echo $this->dao->registrarCategoria($dto);
    }

    public function listarCategorias()
    {
        echo $this->dao->listarCategorias();
    }

    public function eliminarCategoria($datos)
    {
        $dto = new Categoria($datos['id']);

        echo $this->dao->eliminarCategoria($dto);
    }

    public function obtenerCategoria($datos)
    {
        $dto = new Categoria($datos["id"]);

        echo $this->dao->obtenerCategoria($dto);
    }

    public function editarCategoria($datos)
    {
        $dto = new Categoria($datos["id"], $datos["nombre_categoria"]);

        echo $this->dao->editarCategoria($dto);
    }
}

?>