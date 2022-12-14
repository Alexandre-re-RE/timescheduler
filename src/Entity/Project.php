<?php

namespace App\Entity;

/**
 * Project class
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $real_start_date
 * @property string $real_end_date
 */
class Project implements EntityInterface {
    private $id;
    private $name;
    private $description;
    private $start_date;
    private $end_date;
    private $real_start_date;
    private $real_end_date;

    private $status_id;
    private $client_id;

    public function __construct(){

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
    public function setRealStartSate($real_start_date)
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
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * @param mixed $status_id
     */
    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'start_date' => $this->getStartDate() ? $this->getStartDate()->format('Y-m-d H:i:s') : null,
            'end_date' => $this->getEndDate() ? $this->getEndDate()->format('Y-m-d H:i:s') : null,
            'real_start_date' => $this->getRealStartDate() ? $this->getRealStartDate()->format('Y-m-d H:i:s') : null,
            'real_end_date' => $this->getRealEndDate() ? $this->getRealEndDate()->format('Y-m-d H:i:s') : null,
            'status_id' => $this->getStatusId(),
            'client_id' => $this->getClientId()
        ];
    }
}


