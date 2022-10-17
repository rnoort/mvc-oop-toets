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

        public function delete($id)
        {
            $this->db->query("DELETE FROM RichestPeople WHERE id = :id");
            $this->db->bind(":id", $id, PDO::PARAM_INT);
            return $this->db->execute();
        }
    }