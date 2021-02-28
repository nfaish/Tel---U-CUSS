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
            $data['data_ruangan'] = $this->penjadwalan_model->getDataRuangan();
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
            $data['list_hasil_penjadwal'] = $this->penjadwalan_model->getHasilPenjadwalan();
            $this->load->view("penjadwalan/hasil_jadwal", $data);
        } catch (Exception $e){
            show_error("Internal Server Error",500);
        }
    }

    public function delete_all(){
        $this->penjadwalan_model->deleteAll();
    }

    public function save_jadwal(){

        $post = $this->input->post();
        // echo var_dump($post); die();
        // $jadwal = array(
        //     'id_mengajar' => $post['id_mengajar'],
        //     'id_preferensi' => $post['id_preferensi'],
        //     'id_ruangan' => $post['id_ruangan'],
        //     'id_perkuliahan' => $post['id_perkuliahan'],
        //     'id_kelas' => $post['id_kelas']
        // );
        return $this->penjadwalan_model->save_jadwal($post);
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
