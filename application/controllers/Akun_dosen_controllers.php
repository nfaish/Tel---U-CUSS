<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun_dosen_controllers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
    }

    public function index()
    {
        $nip                = $this->session->userdata("nip");
        $data['my_profile'] = $this->dosen_model->dosenByNip($nip);
        $data['detailAdditional'] = $this->dosen_model->additionalByNip($nip);
        $this->load->view('dosen_view/profil_dosen', $data);
    }
}
