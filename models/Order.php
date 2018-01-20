<?php

namespace app\models;

/**
 * Class Order
 * @package app\models
 */
class Order extends DataEntity
{
    /**
     * @var int
     */
    public $user_id;

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

}