<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Pengaturan_controllers extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("akun_model");
        $this->load->model("dosen_model");
        $this->load->model('pengaturan_model');
    }

	public function index()
	{
		$this->load->model('pengaturan_model');
		$this->load->view('dosen_view/profil_dosen', $data);
	}

	public function ubahPass()
    {
        $this->load->view('data/ubah_passwordd');
    }

	public function ubahPassword()
    {
        $nip                    = $this->session->userdata("nip");
		$data['dosen']			= $this->db->get_where('dosen', ['username' => $this->session->userdata('username')])->row_array();
        
        $this->form_validation->set_rules('current_password','Current Password','required|trim');
        $this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2','Confirm New Password','required|trim|min_length[6]|matches[new_password2]');

        if($this->form_validation->run() == false)
        {
            $this->load->view('data/ubah_passwordd');
        }
		else
		{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['dosen']['password'])) 
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Lama Salah! </div>');
				redirect('pengaturan_controllers/ubahPassword');
			}
			else
			{
				if($current_password == $new_password)
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru Tidak Boleh Sama dengan Password Lama! </div>');
					redirect('pengaturan_controllers/ubahPassword');
				}
				else
				{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					
					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('dosen');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Berhasil Diubah! </div>');
					redirect('pengaturan_controllers/ubahPassword');
				}
			}
		}
        
    }

}
