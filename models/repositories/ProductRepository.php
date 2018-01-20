<?php


namespace app\models\repositories;


use app\models\Product;

/**
 * Class ProductRepository
 * @package app\models\repositories
 */
class ProductRepository extends Repository
{

    /**
     * ProductRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "product";
        $this->tableColumns = ["id", "name", "description", "price"];
        $this->entityClass = Product::class;
    }
}
