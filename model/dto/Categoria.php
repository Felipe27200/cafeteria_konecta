<?php
namespace model\dto;

class Categoria
{
    private $id;
    private $nombre;

    function __construct($id = "", $nombre = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

?>