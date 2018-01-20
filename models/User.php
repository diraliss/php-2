<?php

namespace app\models;

/**
 * Class User
 * @package app\models
 */
class User extends DataEntity
{
    /**
     * @var string
     */
    public $login;
    /**
     * @var string
     */
    public $password;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $password
     */
    public function __construct($id = null, $login = null, $password = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }
}