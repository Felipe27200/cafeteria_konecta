<?php

class Venta 
{
    private $id;
    private $productoId;
    private $cantidad;
    private $valorVenta;

    function __construct($id = "", $productoId = "", $cantidad = "", $valorVenta = "")
    {
        $this->id = $id;
        $this->productoId = $productoId;
        $this->cantidad = $cantidad;
        $this->valorVenta = $valorVenta;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
            return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
            $this->id = $id;

            return $this;
    }

    /**
     * Get the value of productoId
     */ 
    public function getProductoId()
    {
            return $this->productoId;
    }

    /**
     * Set the value of productoId
     *
     * @return  self
     */ 
    public function setProductoId($productoId)
    {
            $this->productoId = $productoId;

            return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
            return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
            $this->cantidad = $cantidad;

            return $this;
    }

    /**
     * Get the value of valorVenta
     */ 
    public function getValorVenta()
    {
            return $this->valorVenta;
    }

    /**
     * Set the value of valorVenta
     *
     * @return  self
     */ 
    public function setValorVenta($valorVenta)
    {
            $this->valorVenta = $valorVenta;

            return $this;
    }
}