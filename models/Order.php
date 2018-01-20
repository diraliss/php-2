<?php

namespace app\models;

/**
 * Class Order
 * @package app\models
 */
class Order extends Model
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $user_id;

    /**
     * Order constructor.
     * @param $id
     * @param $user_id
     */
    public function __construct($id = null, $user_id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return "order";
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return "Order";
    }

    /**
     * @return array
     */
    public function getColumnNames()
    {
        return ["id", "user_id"];
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        $this->update($this->id, ["user_id" => $user_id]);
    }

}