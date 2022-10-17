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

        public function delete($id = null)
        {
            $this->richestPeopleModel->delete($id);
            $data = [
                "message" => "De record is verwijderd!"
            ];
            $this->view("richestpeoples/delete", $data);
        }
    }
?>