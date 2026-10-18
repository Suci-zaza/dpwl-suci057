<?php
class Controller
{
    public function __construct()
    {
        $this->load = new class {
            public function view($viewName, $data = [])
            {
                if (!empty($data)) extract($data);
                include './view/' . $viewName . '.php';
            }
            public function model($modelName)
            {
                require_once './model/' . $Latihan1Model . '.php';
                return new $Latihan1Model();
            }
        };
    }
}