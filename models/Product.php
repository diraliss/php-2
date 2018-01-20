<?php

namespace app\models;

/**
 * Class Product
 * @package app\models
 */
class Product extends DataEntity
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $description;
    /**
     * @var int
     */
    public $price;

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

}