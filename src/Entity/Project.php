<?php

namespace App\Entity;

/**
 * Project class
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property date $start_date
 * @property date $end_date
 * @property date $real_start_date
 * @property date $real_end_date
 */
class Project{
    private $id;
    private $name;
    private $description;
    private $start_date;
    private $end_date;
    private $real_start_date;
    private $real_end_date;

    public function __construct($id, $name, $description, $start_date, $end_date, $real_start_date, $real_end_date){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->real_start_date = $real_start_date;
        $this->real_end_date = $real_end_date;
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
    public function getStart_date()
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */ 
    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of end_date
     */ 
    public function getEnd_date()
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */ 
    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Get the value of real_start_date
     */ 
    public function getReal_start_date()
    {
        return $this->real_start_date;
    }

    /**
     * Set the value of real_start_date
     *
     * @return  self
     */ 
    public function setReal_start_date($real_start_date)
    {
        $this->real_start_date = $real_start_date;

        return $this;
    }

    /**
     * Get the value of real_end_date
     */ 
    public function getReal_end_date()
    {
        return $this->real_end_date;
    }

    /**
     * Set the value of real_end_date
     *
     * @return  self
     */ 
    public function setReal_end_date($real_end_date)
    {
        $this->real_end_date = $real_end_date;

        return $this;
    }
}


?>
