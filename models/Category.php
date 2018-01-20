<?php

namespace app\models;

/**
 * Class Category
 * @package app\models
 */
class Category extends DataEntity
{
    /**
     * @var string
     */
    public $name;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id = null, $name = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
    }

}