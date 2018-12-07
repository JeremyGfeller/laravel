<?php
/**
 * Created by PhpStorm.
 * User: Jeremy.GFELLER
 * Date: 05.12.2018
 * Time: 11:45
 */

namespace App\Classes;


class Things
{
    private $id;
    private $name;
    private $surname;

    /**
     * Things constructor.
     * @param $id
     * @param $name
     * @param $nbBricks
     * @param $color
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}