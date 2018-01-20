<?php


namespace app\models\repositories;


use app\models\Order_Product;

/**
 * Class OrderProductRepository
 * @package app\models\repositories
 */
class OrderProductRepository extends Repository
{

    /**
     * OrderProductRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "order_product";
        $this->tableColumns = ["id", "order_id", "product_id", "count"];
        $this->entityClass = Order_Product::class;
    }
}
