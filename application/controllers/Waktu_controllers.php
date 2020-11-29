<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Waktu_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('waktu_model');
    }

    public function exploreJam($kode_jam)
    {
        $data['list_jamByNip'] = $this->waktu_model->jamByID($kode_jam);
        $this->load->view("data/waktu_view", $data);
    }
    public function exploreHari($id_hari)
    {
        $data['list_hariByNip'] = $this->waktu_model->hariByID($id_hari);
        $this->load->view("data/waktu_view", $data);
    }

    public function hapusJam($kode_jam)
    {
        $this->waktu_model->hapus_jam($kode_jam);
        $data['list_jam'] = $this->waktu_model->daftar_jam();
        $this->load->view("data/waktu_view", $data);
    }
    public function hapusHari($id_hari)
    {
        $this->waktu_model->hapus_hari($id_hari);
        $data['list_hari'] = $this->waktu_model->daftar_hari();
        $this->load->view("data/waktu_view", $data);
    }
}
