<?php

namespace app\models;

/**
 * Class Order_Product
 * @package app\models
 */
class Order_Product extends DataEntity
{
    /**
     * @var int
     */
    public $order_id;
    /**
     * @var int
     */
    public $product_id;
    /**
     * @var int
     */
    public $count;

    /**
     * Order_Product constructor.
     * @param $id
     * @param $order_id
     * @param $product_id
     * @param $count
     */
    public function __construct($id = null, $order_id = null, $product_id = null, $count = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }
}