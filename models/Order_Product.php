<?php
namespace app\models;


/**
 * Class Order_Product
 * @package app\models
 */
class Order_Product extends Model
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $order_id;
    /**
     * @var int
     */
    private $product_id;
    /**
     * @var int
     */
    private $count;

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


    /**
     * @return string
     */
    public function getTableName()
    {
        return "order_product";
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return "Order_Product";
    }

    /**
     * @return array
     */
    public function getColumnNames()
    {
        return ["id", "order_id", "product_id", "count"];
    }

    /**
     * @param int $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        $this->update($this->id, ["order_id" => $order_id]);
    }

    /**
     * @param int $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;

        $this->update($this->id, ["product_id" => $product_id]);
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;

        $this->update($this->id, ["count" => $count]);
    }

}