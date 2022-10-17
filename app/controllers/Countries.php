<?php
    class Countries extends Controller
    {

        private $countryModel;
        public function __construct()
        {
            $this->countryModel = $this->model("Country");
        }

        public function index($land = null, $age = null)
        {
            $records = $this->countryModel->getCountries();

            $rows = '';

            foreach($records as $value)
            {
                $rows .= "<tr>
                            <td>$value->Name</td>
                            <td>$value->CapitalCity</td>
                            <td>$value->Continent</td>
                            <td>$value->Population</td>
                            <td><a href='" . URLROOT . "/countries/update/$value->id'>Bijwerken</a></td>
                            <td><a href='" . URLROOT . "/countries/delete/$value->id'>Verwijder</a></td>
                </tr>"; 
            }

            $data = [
                "title" => "Landen van de wereld",
                "rows" => $rows
            ];

            $this->view("countries/index", $data);
        }

        public function update($id = null)
        {
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->countryModel->updateCountry($_POST);
            }
                else
            {
                $row = $this->countryModel->getSingleCountry($id);

                $data = [
                    "title" => "<h1>Bijwerken land</h1>",
                    "row" => $row
                ];

                $this->view("countries/update", $data);
            }
        }
    }
?>