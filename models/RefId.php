<?php
namespace app\models;
/**
 * Created by PhpStorm.
 * User: Binay
 * Date: 24/11/2017
 * Time: 06:43
 */

class RefId {
    public $table;
    public $id;

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}