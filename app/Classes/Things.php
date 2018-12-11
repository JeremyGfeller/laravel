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
    private $nbBricks;
    private $color;

    /**
     * Things constructor.
     * @param $id
     * @param $name
     * @param $nbBricks
     * @param $color
     */
    public function __construct($id, $name, $nbBricks, $color)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nbBricks = $nbBricks;
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of nbBricks
     */ 
    public function getNbBricks()
    {
        return $this->nbBricks;
    }

    /**
     * Set the value of nbBricks
     *
     * @return  self
     */ 
    public function setNbBricks($nbBricks)
    {
        $this->nbBricks = $nbBricks;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}