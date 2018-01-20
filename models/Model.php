<?php

namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

/**
 * Class Model
 * @package app\models
 */
abstract class Model implements IModel
{
    /**
     * @var static
     */
    private $db;
    /**
     * @var string
     */
    private $prefix = "app\\models\\";
    /**
     * @var string
     */
    private $prefix_table = "app_";

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = $this->getDb();
    }

    /**
     * @param $id
     * @return object
     */
    public function getOne($id)
    {
        $tableName = $this->prefix_table . $this->getTableName();
        $className = $this->prefix . $this->getClassName();
        $columns = $this->getColumnNames();

        return $this->db->queryOne("SELECT * FROM {$tableName} WHERE id = :id", ["id" => $id], $className, $columns);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $tableName = $this->prefix_table . $this->getTableName();
        $className = $this->prefix . $this->getClassName();
        $columns = $this->getColumnNames();

        return $this->db->queryAll("SELECT * FROM {$tableName}", [], $className, $columns);
    }

    /**
     * @param array $params
     * @return bool
     */
    public function create($params)
    {
        $tableName = $this->prefix_table . $this->getTableName();
        $columns = $this->getColumnNames();

        $inserts = [];
        $inserts_name = [];
        foreach ($params as $key => $value) {
            if ($key == "id") continue;
            if (!in_array($key, $columns)) continue;
            $inserts[] = ":$key";
            $inserts_name[] = "$key";
        }
        $sql = "INSERT INTO {$tableName}(" . join(", ", $inserts_name) . ") VALUES(" . join(", ", $inserts) . ")";
        return $this->db->execute($sql, $params);
    }

    /**
     * @param int $id
     * @param array $params
     * @return bool
     */
    public function update($id, $params)
    {
        $tableName = $this->prefix_table . $this->getTableName();
        $columns = $this->getColumnNames();

        $updates = [];
        foreach ($params as $key => $value) {
            if ($key == "id") continue;
            if (!in_array($key, $columns)) continue;
            $updates[] = "$key = :$key";
        }
        $params = array_merge($params, ["id" => $id]);

        $sql = "UPDATE {$tableName} SET " . join(", ", $updates) . " WHERE id = :id";
        return $this->db->execute($sql, $params);
    }

    /**
     * @param array $params
     * @return bool
     */
    public function delete($params)
    {
        $tableName = $this->prefix_table . $this->getTableName();
        $columns = $this->getColumnNames();

        $wheres = [];
        foreach ($params as $key => $value) {
            if (!in_array($key, $columns)) continue;
            $wheres[] = "$key = :$key";
        }
        $sql = "DELETE FROM {$tableName} WHERE " . join(",", $wheres);
        return $this->db->execute($sql, $params);
    }

    /**
     * @return Db
     */
    private function getDb()
    {
        return Db::getInstance();
    }
}