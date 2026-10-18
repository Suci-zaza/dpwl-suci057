<?php
require_once 'model/Latihan1Model.php';
class Latihan1Controller
{
    public function index()
    {
        $model = new Latihan1Model();
        $datamhs = $model->getAllmhs();
        require_once './view/Latihan1View.php';
    }
}