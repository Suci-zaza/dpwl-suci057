<?php
class Controller
{
    public function _construct()
    {
        $this->load = new class {
            public function view($latihan1view, $data = [])
            {
                if (!empty($data)) extract($data);
                include './view/' . $latihan1view . '.php';
            }
            public function model($Latihan1Model)
            {
                require_once 'model/' . $Latihan1Model . '.php';
                return new $Latihan1Model();
            }
        }
    }
}