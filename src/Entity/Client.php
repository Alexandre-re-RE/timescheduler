<?php

namespace App\Entity;

/**
 * Client class
 * 
 * @property int $id
 * @property string $name
 */
    class Client{
        private $id;
        private $name;
        private $created_at;
        private $update_at;

        public function __construct()
        {

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
         * Get the value of created_at
         */ 
        public function getCreated_at()
        {
                return $this->created_at;
        }

        /**
         * Set the value of created_at
         *
         * @return  self
         */ 
        public function setCreated_at($created_at)
        {
                $this->created_at = $created_at;

                return $this;
        }

        /**
         * Get the value of update_at
         */ 
        public function getUpdate_at()
        {
                return $this->update_at;
        }

        /**
         * Set the value of update_at
         *
         * @return  self
         */ 
        public function setUpdate_at($update_at)
        {
                $this->update_at = $update_at;

                return $this;
        }
    }

