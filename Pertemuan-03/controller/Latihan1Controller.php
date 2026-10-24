
<?php

//require_once 'model/Latihan1Model.php';

class Latihan1Controller
{
    public function index()
    {
        $model = new Latihan1Model();
        $datamhs = $model->getDataMahasiswa();
        require './view/latihan1view.php';
    }
}
