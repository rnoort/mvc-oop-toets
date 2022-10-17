<?php
    class RichestPeople extends Controller
    {

        private $richestPeopleModel;
        public function __construct()
        {
            $this->richestPeopleModel = $this->model("RichestPeople");
        }

        public function index($land = null, $age = null)
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
                            <td><a href='" . URLROOT . "/richestpeople/delete/$value->id'>Verwijder</a></td>
                </tr>"; 
            }

            $data = [
                "title" => "De vijf rijkste mensen ter wereld",
                "rows" => $rows
            ];

            $this->view("countries/index", $data);
        }
    }
?>