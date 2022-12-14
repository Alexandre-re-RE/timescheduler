<?php

namespace App\Entity;

use DateTime;
use DateTimeZone;
use App\Entity\EntityInterface;


/**
 * Status class
 * 
 * @property int $id
 * @property int $code
 * @property string $name
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Status implements EntityInterface
{
    private $id;
    private $code;
    private $name;
    private $created_at;
    private $updated_at;


    public function __construct()
    {
        $this->created_at = new DateTime(is_string($this->created_at) ? $this->created_at : '');
        $this->created_at->setTimezone(new DateTimeZone('Indian/Reunion'));

        $this->updated_at = new DateTime(is_string($this->updated_at) ? $this->updated_at : '');
        $this->updated_at->setTimezone(new DateTimeZone('Indian/Reunion'));
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

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

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
   /**
     * Get the value of updated_at
     */ 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    public function toArray(){
        return[
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }

}
