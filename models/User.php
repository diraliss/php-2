<?php
namespace app\models;

/**
 * Class User
 * @package app\models
 */
class User extends Model
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $password;

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

    /**
     * @return string
     */
    public function getTableName()
    {
        return 'user';
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return "User";
    }

    /**
     * @return array
     */
    public function getColumnNames()
    {
        return ["id", "login", "password"];
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;

        $this->update($this->id, ["login" => $login]);
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;

        $this->update($this->id, ["password" => $password]);
    }
}