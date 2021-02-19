<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("perkuliahan_model");
        $this->load->model("fakultas_model");
        $this->load->model("dosen_model");
        $this->load->model('penjadwalan_model');
    }

    public function generate()
    {
        try{
            $nip = $this->session->userdata("nip");
            $data['my_profile'] = $this->dosen_model->exploredosenByNip($nip);

            $data['data_class_requirement'] = $this->penjadwalan_model->getClassRequirements();
            $data['data_preferensi_dosen'] = $this->penjadwalan_model->getDataDosen();
            $data['data_unique_sks'] = $this->penjadwalan_model->getUniqueSks();

            foreach ($data['data_preferensi_dosen'] as $key => $value) {
                $data['data_preferensi_dosen'][$key]['no'] = $key;
            }

            foreach ($data['data_class_requirement'] as $key => $value) {
                $data['data_class_requirement'][$key]['no'] = $key;
            }

            $this->load->view("penjadwalan/generate_jadwal", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function hasil_generate()
    {
        try{
            $nip = $this->session->userdata("nip");
            $data['my_profile'] = $this->dosen_model->exploredosenByNip($nip);
            
            $this->load->view("penjadwalan/hasil_jadwal", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function cetak()
    {
            $this->load->view("penjadwalan/cetak_jadwal");
    }

    public function cetak_jadwal()
        {
            $this->load->view('penjadwalan/cetak_jadwal');
        }
}
