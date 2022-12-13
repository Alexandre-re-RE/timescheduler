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

        public function __construct()
        {
            parent::__construct();
            $this->table = "clients";
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
    }

