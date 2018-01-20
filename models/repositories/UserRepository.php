<?php


namespace app\models\repositories;


use app\models\User;

/**
 * Class UserRepository
 * @package app\models\repositories
 */
class UserRepository extends Repository
{

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "user";
        $this->tableColumns = ["id", "login", "password"];
        $this->entityClass = User::class;
    }
}
