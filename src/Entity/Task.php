<?php

namespace App\Entity;

use App\Entity\EntityInterface;
use DateTime;
use DateTimeZone;

/**
 * Task class
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $priority
 * @property DateTime $start_date
 * @property DateTime $end_date
 * @property DateTime $real_start_date
 * @property DateTime $real_end_date
 * @property DateTime $create
 * @property Datetime $updated_at
 */
class Task  implements EntityInterface
{
    private $id = null;
    private $title;
    private $description;
    private $priority;
    private $start_date;
    private $end_date;
    private $real_start_date;
    private $real_end_date;
    private $created_at;
    private $updated_at;


    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'start_date' => $this->start_date->format('Y-m-d H:i:s'),
            'end_date' => $this->end_date->format('Y-m-d H:i:s'),
            'real_start_date' => $this->real_start_date->format('Y-m-d H:i:s'),
            'real_end_date' => $this->end_date->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
    public function __construct()
    {
        $this->start_date = new DateTime(is_string($this->start_date) ? $this->start_date : '');
        $this->start_date->setTimezone(new DateTimeZone('Indian/Reunion'));

        $this->end_date = new DateTime(is_string($this->end_date) ? $this->end_date : '');
        $this->end_date->setTimezone(new DateTimeZone('Indian/Reunion'));

        $this->real_start_date = new DateTime(is_string($this->real_start_date) ? $this->real_start_date : '');
        $this->real_start_date->setTimezone(new DateTimeZone('Indian/Reunion'));

        $this->created_at = new DateTime(is_string($this->created_at) ? $this->created_at : '');
        $this->created_at->setTimezone(new DateTimeZone('Indian/Reunion'));


        $this->updated_at = new DateTime(is_string($this->updated_at) ? $this->updated_at : '');
        $this->updated_at->setTimezone(new DateTimeZone('Indian/Reunion'));
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
     * Get the value of created
     */
    public function getCreate()
    {
        return $this->created_at;
    }

    /**
     * Set the value of create
     *
     * @return  self
     */
    public function setCreate($created_at)
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
