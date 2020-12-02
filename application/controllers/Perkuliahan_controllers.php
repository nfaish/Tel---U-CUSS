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
        $data['list_jurusan'] = $this->fakultas_model->daftar_jurusan();
        $data['list_jurusan2'] = $this->fakultas_model->daftar_jurusan();
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
        $data['matkul_ajarku'] = $this->perkuliahan_model->daftarMatkulByDosen($nip);
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
        $nip                    = $this->session->userdata("nip");
        $data['my_profile']      = $this->dosen_model->exploredosenByNip($nip);
        $data['list_matkul']    = $this->perkuliahan_model->daftarMatkul();
        $data['matkul_ajarku'] = $this->perkuliahan_model->daftarMatkulByDosen($nip);
        $data['data_matkul'] = $this->perkuliahan_model->daftarData_kuliah($nip);
        $this->load->view("Perkuliahan/data_kuliah", $data);
    }

    public function dataMKDU_fakultas()
    {
        $data['list_matkul'] = $this->perkuliahan_model->daftarMatkul();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $this->load->view("Perkuliahan/mkdu_fakultas", $data);
        if (isset($_POST['tambahMatkul'])) {
            $this->perkuliahan_model->tambahMatkul($_POST);
            redirect("Perkuliahan_controllers");
        } else if (isset($_POST['tambahMkdu'])) {
            $this->perkuliahan_model->tambahMkdu($_POST);
            redirect("Perkuliahan_controllers");
        }
    }

    public function jurusanByFakultasId(){
        $id_fakultas = $this->input->post('id_fakultas');

        $data = $this->fakultas_model->jurusanByFakultasId($id_fakultas);
        echo json_encode($data);
    }

    public function angkatanByJurusanId(){
        $id_jurusan = $this->input->post('id_jurusan');

        $data = $this->fakultas_model->angkatanByJurusanId($id_jurusan);
        echo json_encode($data);
    }
}
