<?php
namespace app\interfaces;

interface IModel
{
    public function getOne($id);

    public function getAll();

    public function getTableName();

    public function getClassName();

    public function getColumnNames();
}