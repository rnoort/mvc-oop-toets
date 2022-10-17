<?php
    class Country
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database(); 
        }

        public function getCountries()
        {
            $this->db->query("SELECT * FROM Country;");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getSingleCountry($id)
        {
            $this->db->query("SELECT * FROM Country WHERE id = :id");
            $this->db->bind(":id", $id, PDO::PARAM_INT);
            return $this->db->single();
        }

        public function updateCountry($post)
        {
            var_dump($post);
            $this->db->query("UPDATE Country SET Name = :Name, 
                                                CapitalCity = :CapitalCity, 
                                                Continent = :Continent, 
                                                Population = :Population 
                                                WHERE id = :id");
            $this->db->bind(":id", $post["id"], PDO::PARAM_INT);
            $this->db->bind(":Name", $post["Name"], PDO::PARAM_STR);
            $this->db->bind(":CapitalCity", $post["CapitalCity"], PDO::PARAM_STR);
            $this->db->bind(":Continent", $post["Continent"], PDO::PARAM_STR);
            $this->db->bind(":Population", $post["Population"], PDO::PARAM_INT);

            return $this->db->execute();


        }
    }