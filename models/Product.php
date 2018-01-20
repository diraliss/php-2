<?php

namespace app\models;

/**
 * Class Product
 * @package app\models
 */
class Product extends Model
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $price;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($id = null, $name = null, $description = null, $price = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return "product";
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return "Product";
    }

    /**
     * @return array
     */
    public function getColumnNames()
    {
        return ["id", "name", "description", "price"];
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        $this->update($this->id, ["name" => $name]);
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        $this->update($this->id, ["description" => $description]);
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        $this->update($this->id, ["price" => $price]);
    }


}