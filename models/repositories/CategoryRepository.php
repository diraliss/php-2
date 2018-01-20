<?php


namespace app\models\repositories;


use app\models\Category;

/**
 * Class CategoryRepository
 * @package app\models\repositories
 */
class CategoryRepository extends Repository
{

    /**
     * CategoryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "category";
        $this->tableColumns = ["id", "name"];
        $this->entityClass = Category::class;
    }
}
