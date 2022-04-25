<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model("Paggination_model");
    }
    // view pagination view
    public function index()
    {
        $this->load->view('pagination');
    }
    //function pagination data
    public function pagination_data()
    {
        $postData = $this->input->post();
        // call model function get  employeess
        $data = $this->Paggination_model->get_employess($postData);
        echo json_encode($data);
    }
}
