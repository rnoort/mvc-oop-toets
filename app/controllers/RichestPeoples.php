<?php
    class RichestPeoples extends Controller
    {

        private $richestPeopleModel;
        public function __construct()
        {
            $this->richestPeopleModel = $this->model("RichestPeople");
        }

        public function index()
        {
            $records = $this->richestPeopleModel->getAll();

            $rows = '';

            foreach($records as $value)
            {
                $rows .= "<tr>
                            <td>$value->Name</td>
                            <td>$value->Networth</td>
                            <td>$value->Age</td>
                            <td>$value->MyCompany</td>
                            <td><a href='" . URLROOT . "/richestpeoples/delete/$value->Id'>Verwijder</a></td>
                </tr>"; 
            }

            $data = [
                "title" => "De vijf rijkste mensen ter wereld",
                "rows" => $rows
            ];

            $this->view("richestpeoples/index", $data);
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