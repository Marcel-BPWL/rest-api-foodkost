<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Makanan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Makanan_model', 'mkn');
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id == null) {
            $makan = $this->mkn->get();
        } else {
            $makan = $this->mkn->get($id);
        }
        if ($makan){
            $this->response([
                'status' => true,
                'data' => $makan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Id tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}