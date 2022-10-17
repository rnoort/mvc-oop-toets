<?php
    class RichestPeople
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database(); 
        }

        public function getAll()
        {
            $this->db->query("SELECT * FROM RichestPeople;");
            $result = $this->db->resultSet();
            return $result;
        }
    }