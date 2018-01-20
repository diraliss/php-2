<?php

namespace app\models\repositories;


use app\models\DataEntity;
use app\services\Db;

abstract class Repository
{
    protected $tableName;
    protected $tableColumns;
    protected $entityClass;

    private $db;

    /**
     * Repository constructor.
     * @internal param $db
     */
    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id)
    {

        return $this->db->fetchObject(
            "SELECT * FROM app_{$this->tableName} WHERE id = :id",
            [':id' => $id],
            $this->entityClass
        );
    }

    public function getAll()
    {
        return static::getDb()->fetchAllObjects("SELECT * FROM app_{$this->tableName}", [], $this->entityClass);
    }

    public function update(DataEntity $entity)
    {
        $updates = [];
        $params = [];

        for ($i = 0; $i < count($this->tableColumns); $i++) {
            $column = $this->tableColumns[$i];
            if ($column == "id") continue;
            $updates[] = "$column = :$column";
            $params[$column] = $entity->$column;
        }
        $params = array_merge($params, ["id" => $entity->id]);

        $sql = "UPDATE app_{$this->tableName} SET " . join(", ", $updates) . " WHERE id = :id";
        return $this->db->execute($sql, $params);
    }

    public function create(DataEntity $entity)
    {
        $inserts = [];
        $insert_names = [];
        $params = [];

        for ($i = 0; $i < count($this->tableColumns); $i++) {
            $column = $this->tableColumns[$i];
            if ($column == "id") continue;
            $inserts[] = ":$column";
            $insert_names[] = "$column";
            $params[$column] = $entity->$column;
        }

        $sql = "INSERT INTO app_{$this->tableName}(" . join(", ", $insert_names) . ") VALUES(" . join(", ", $inserts) . ")";
        return $this->db->execute($sql, $params);
    }

    public function delete(DataEntity $entity)
    {
        $wheres = [];
        $params = [];

        for ($i = 0; $i < count($this->tableColumns); $i++) {
            $column = $this->tableColumns[$i];
            if (!($entity->$column)) continue;
            $wheres[] = "$column = :$column";
            $params[$column] = $entity->$column;
        }

        $sql = "DELETE FROM app_{$this->tableName} WHERE " . join(" AND ", $wheres);

        return $this->db->execute($sql, $params);
    }

    private static function getDb()
    {
        return Db::getInstance();
    }
}