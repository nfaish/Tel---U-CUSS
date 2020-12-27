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
            $nip                    = $this->session->userdata("nip");
            $data['my_profile']      = $this->dosen_model->exploredosenByNip($nip);
            
            $this->load->view("penjadwalan/generate_jadwal", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function hasil_generate()
    {
        try{
            $nip                    = $this->session->userdata("nip");
            $data['my_profile']      = $this->dosen_model->exploredosenByNip($nip);
            
            $this->load->view("penjadwalan/hasil_jadwal", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

}
