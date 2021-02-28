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

            $data['total_hari'] =  $this->penjadwalan_model->total_hari();
            $data['total_shift'] =  $this->penjadwalan_model->total_shift();
            $data['total_ruangan'] =  $this->penjadwalan_model->total_ruangan();
            $data['total_gedung'] =  $this->penjadwalan_model->total_gedung();
            $data['total_kuliah'] =  $this->penjadwalan_model->total_kuliah();
            $data['total_dosen'] =  $this->penjadwalan_model->total_dosen();
            $data['total_kelas'] =  $this->penjadwalan_model->total_kelas();
            $data['total_mkdu'] =  $this->penjadwalan_model->total_mkdu();
            $data['total_fakultas'] =  $this->penjadwalan_model->total_fakultas();
            $data['total_prodi'] =  $this->penjadwalan_model->total_prodi();
            $data['total_preferensi'] =  $this->penjadwalan_model->total_preferensi();

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
            $data['list_fakultas'] = $this->penjadwalan_model->getFakultasOption();
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
        return $this->penjadwalan_model->save_jadwal($post);
    }

    public function cetak($id_fakultas)
    {
        // $post =  $this->input->post();
        set_time_limit(500);
        ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M'); 
        $data['list_hasil_penjadwal'] = $this->penjadwalan_model->getDataPrintFakultas($id_fakultas);

        $temp_group_kelas = [];

        foreach ($data['list_hasil_penjadwal'] as $key => $value) {
            $temp_group_kelas[$value['nama_kelas']][] = $value;
            
        }

        $data['group_kelas'] = $temp_group_kelas;
        
        // echo var_dump( $data['group_kelas']); die;
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
            
        // title dari pdf
        $this->data['title_pdf'] = 'Penjadwalan';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Penjadwalan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
        $html = $this->load->view('print/penjadwalan',$data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

        // $this->load->view("penjadwalan/cetak_jadwal");
    }

    public function cetak_jadwal()
    {
        $this->load->view('penjadwalan/cetak_jadwal');
    }
}
