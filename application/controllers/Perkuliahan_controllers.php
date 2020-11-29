<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perkuliahan_controllers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("perkuliahan_model");
        $this->load->model("fakultas_model");
        $this->load->model("dosen_model");
    }

    public function index()
    {
        $data['list_matkul'] = $this->perkuliahan_model->daftarMatkul();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $this->load->view("Perkuliahan/index", $data);
        if (isset($_POST['tambahMatkul'])) {
            $this->perkuliahan_model->tambahMatkul($_POST);
            redirect("Perkuliahan_controllers");
        } else if (isset($_POST['tambahMkdu'])) {
            $this->perkuliahan_model->tambahMkdu($_POST);
            redirect("Perkuliahan_controllers");
        }
    }

    public function matkulAmpu()
    {
        $nip                    = $this->session->userdata("nip");
        $data['my_profile']      = $this->dosen_model->exploredosenByNip($nip);
        $data['list_matkul']    = $this->perkuliahan_model->daftarMatkul();
        $this->load->view("Perkuliahan/matkul_ampu", $data);
        if (isset($_POST['ambilMatkul'])) {
            $this->perkuliahan_model->ambilMatkul($_POST, $nip);
            redirect("/Perkuliahan_controllers/matkulAmpu");
        }
    }

    public function jadwalAjar()
    {
    }

    public function dataKuliah()
    {
        $data['list_datakuliah'] = $this->perkuliahan_model->daftarDatakuliah();
        $this->load->view("Perkuliahan/data_kuliah", $data);
    }
}
