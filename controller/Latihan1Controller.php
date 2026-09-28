<?php
//require_once 'model/Latihan1Model.php';
/*class Latihan1Controller
{
    public function index()
    {
        $model = new Latihan1Model();
        $datamhs = $model->getAllMhs();
        require './view/latihan1view.php';
    }
}*/

class Latihan1Controller extends Controller
{
    public function index()
    {
        $data['datamhs'] = $this->load->model('Latihan1Model')->getAllMhs();
        $this->load->view('latihan1view', $data);
    }
}