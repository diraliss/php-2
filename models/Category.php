<?php

namespace app\models;
/**
 * Class Category
 * @package app\models
 */
class Category extends Model
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;

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

    /**
     * @return string
     */
    public function getTableName()
    {
        return "category";
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return "Category";
    }

    /**
     * @return array
     */
    public function getColumnNames()
    {
        return ["id", "name"];
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        $this->update($this->id, ["name" => $name]);
    }

}