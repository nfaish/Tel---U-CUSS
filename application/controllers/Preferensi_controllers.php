<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preferensi_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Preferensi_model');
    }

    public function index()
    {

        $data['jadwal'] = $this->Preferensi_model->bacaJadwal();

        $this->load->view('dosen_view/preferensi_view', $data);
    }
}
