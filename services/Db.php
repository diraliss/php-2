<?php

namespace app\services;

use app\traits\TSingleton;

class Db
{
    use TSingleton;

    private $conn = null;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shopshop',
        'charset' => 'UTF8'
    ];

    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }

    private function query($sql, $params)
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }


    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne($sql, $params = [], $class = null, $columns = null)
    {
        $result = $this->queryAll($sql, $params, $class, $columns);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function queryAll($sql, $params = [], $class = null, $columns = null)
    {
        if ($class != null) {
            return $this->query($sql, $params)->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class, $columns);
        } else {
            return $this->query($sql, $params)->fetchAll();
        }
    }

    private function prepareDsnString()
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}