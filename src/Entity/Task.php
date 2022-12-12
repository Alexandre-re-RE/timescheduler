<?php

namespace App\Entity;

/**
 * Task class
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $priority
 * @property string $start_date
 * @property string $end_date
 * @property string $real_start_date
 * @property string $real_end_date
 * @property string $create
 * @property string $updated_at
 */
class Task
{
    private $id;
    private $title;
    private $description;
    private $priority;
    private $start_date;
    private $end_date;
    private $real_start_date;
    private $real_end_date;
    private $create;
    private $updated_at;



    public function __construct($id, $description, $priority, $start_date, $end_date, $real_start_date, $real_end_date, $create, $updated_at)
    {
        $this->id = $id;
        $this->description = $description;
        $this->priority = $priority;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->real_start_date = $real_start_date;
        $this->real_end_date = $real_end_date;
        $this->create = $create;
        $this->updated_at = $updated_at;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of start_date
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of real_start_date
     */
    public function getRealStartDate()
    {
        return $this->real_start_date;
    }

    /**
     * Set the value of real_start_date
     *
     * @return  self
     */
    public function setRealStartDate($real_start_date)
    {
        $this->real_start_date = $real_start_date;

        return $this;
    }

    /**
     * Get the value of real_end_date
     */
    public function getRealEndDate()
    {
        return $this->real_end_date;
    }

    /**
     * Set the value of real_end_date
     *
     * @return  self
     */
    public function setRealEndDate($real_end_date)
    {
        $this->real_end_date = $real_end_date;

        return $this;
    }

    /**
     * Get the value of create
     */
    public function getCreate()
    {
        return $this->create;
    }

    /**
     * Set the value of create
     *
     * @return  self
     */
    public function setCreate($create)
    {
        $this->create = $create;

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
     * Set the value of update_at
     *
     * @return  self
     */
    public function setUpdateAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set the value of priority
     *
     * @return  self
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get the value of end_date
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;

        return $this;
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
}
