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
            redirect("Perkuliahan_controllers/matkulAmpu");
        }
    }

    public function exploreMatkul()
    {
        $this->load->model('perkuliahan_model');
		$data['dataMatkul'] = $this->perkuliahan_model->load_MatkulSelect($id_matkul);
        if (isset($_POST['simpanMatkul'])) 
        {
            $nama_matkul  = $this->db->escape($_POST['nama_matkul']);
            $kode_matkul  = $this->db->escape($_POST['kode_matkul']);
            $sks  = $this->db->escape($_POST['sks']);
			$query = "UPDATE matkul SET
						nama_matkul = $nama_matkul,
                        kode_matkul = $kode_matkul,
                        sks = $sks
					WHERE id_matkul = $id_matkul 
					";
			$sql = $this->db->query($query);
            redirect("perkuliahan_controllers/index");
            $this->session->set_flashdata('alert', 'Data Mata Kuliah Telah Diubah');
		}
		$this->load->view('perkuliahan/ubah_index', $data);
    }

    public function hapusMatkul($id_matkul)
    {
		$this->load->model('perkuliahan_model');
		$this->perkuliahan_model->hapusMatkul($id_matkul);
        redirect (base_url("perkuliahan_controllers/index"));
        $this->session->set_flashdata('alert', 'Mata Kuliah Telah Dihapus');
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
        $data['list_mkdu'] = $this->perkuliahan_model->daftarMKDU();
        $data['list_fakultas'] = $this->fakultas_model->daftar_fakultas();
        $this->load->view("Perkuliahan/mkdu_fakultas", $data);
        if (isset($_POST['tambahMatkul'])) {
            $this->perkuliahan_model->tambahMatkul($_POST);
            redirect("Perkuliahan_controllers");
        } else if (isset($_POST['tambahMkdu'])) {
            $this->perkuliahan_model->tambahMkdu($_POST);
            redirect("Perkuliahan_controllers/dataMKDU_fakultas");
        }
    }

    public function exploreMKDU_jurusan()
    {
        $this->load->model('perkuliahan_model');
		$data['dataMKDU'] = $this->perkuliahan_model->load_MKDU_jurusanSelect($id_perkuliahan);
        if (isset($_POST['simpanMKDU_jurusan'])) 
        {
            $id_jurusan    = $this->db->escape($_POST['id_jurusan']);
            $id_matkul      = $this->db->escape($_POST['id_matkul']);
            // print_r($id_matkul);
            for ($i = 0; $i < sizeof($id_matkul); $i++) {
                $query = "INSERT INTO perkuliahan (
                    id_jurusan,
                    id_matkul
                )
                VALUES
                (
                    $id_jurusan,
                    $id_matkul[$i]
                )";
                $sql = $this->db->query($query);
            }
            redirect("perkuliahan_controllers/mkdu_fakultas");
            $this->session->set_flashdata('alert', 'Data Mata Kuliah Dasar Umum Jurusan Telah Diubah');
		}
		$this->load->view('perkuliahan/ubah_mkdu_fakultas', $data);
    }

    public function hapusMKDU_jurusan($id_matkul)
    {
		$this->load->model('perkuliahan_model');
		$this->perkuliahan_model->hapusMKDU($id_perkuliahan);
        redirect (base_url("perkuliahan_controllers/mkdu_fakultas"));
        $this->session->set_flashdata('alert', 'Mata Kuliah Dasar Umum Jurusan Telah Dihapus');
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
