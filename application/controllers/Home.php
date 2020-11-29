<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('username'))) {
            redirect(site_url("login"));
        }
    }
    public function index()
    {

        $this->load->view('home');
    }
}
