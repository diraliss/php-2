<?php


namespace app\models\repositories;


use app\models\Order;

/**
 * Class OrderRepository
 * @package app\models\repositories
 */
class OrderRepository extends Repository
{

    /**
     * OrderRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "order";
        $this->tableColumns = ["id", "user_id"];
        $this->entityClass = Order::class;
    }
}
