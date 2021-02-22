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
		$this->load->model('akun_model');
		$this->load->model('pengaturan_model');
		if ($this->session->userdata('user_role') == 1) {
			$data['dataDosen'] = $this->akun_model->dataDosenSession();
		} else {
			$data['dataDosen'] = $this->akun_model->dataDosenSession();
		}
	}

	//untuk ubah password tombol pertama
	public function ubahPass()
	{
		$this->load->view('data/ubah_passwordd');
	}
	//untuk ubah password tombol pertama
	public function ubahPassword()
	{
		$nip                    = $this->session->userdata("nip");
		$data['dosen']			= $this->db->get_where('dosen', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password2]');

		if ($this->form_validation->run() == false) {
			$this->load->view('data/ubah_passwordd');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['dosen']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Lama Salah! </div>');
				redirect('pengaturan_controllers/ubahPassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru Tidak Boleh Sama dengan Password Lama! </div>');
					redirect('pengaturan_controllers/ubahPassword');
				} else {
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

	//untuk ubah password tombol kedua
	function changePassword()
	{
		$user_role 	= $this->session->userdata("user_role");
		$id 		= $_POST['id'];
		$passLama 	= md5($this->db->escape($_POST['passLama']));
		$passBaru 	= md5($this->db->escape($_POST['passBaru']));

		$this->pengaturan_model->gantipassword($id, $passBaru, $passLama);
		// if ($user_role == 1) {
		// 	$query = "	UPDATE dosen
		// 				SET 
		// 					password = '$passBaru'
		// 				WHERE
		// 					nip = '$id' AND password = '$passLama'
		// 				";
		// } else {
		// 	$query = "	UPDATE dosen
		// 				SET 
		// 					password = '$passBaru'
		// 				WHERE
		// 					nip = '$id' AND password = '$passLama'
		// 				";
		// }
		// $sql = $this->db->query($query);
		// $this->session->set_flashdata('alert', 'Password Berhasil Diubah!');
		redirect(base_url('akun_dosen_controllers'));
	}

	function md5Generate($passLama, $passLamaInput)
	{
		$passLamaInput = md5($passLamaInput);
		if ($passLama !== $passLamaInput) {
			header('Content-Type: application/json');
			echo json_encode(['error' => true]);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['error' => false]);
		}
	}

	public function penggunaDosen()
	{
		$this->load->model("pengaturan_model");
		$data['dataDosen'] 	 = $this->pengaturan_model->dataDosen();

		if (isset($_POST['simpanDosen'])) {
			$this->pengaturan_model->simpanDosen($_POST);
			redirect("pengaturan_controllers/penggunaDosen");
		}

		$this->load->view('data/profi_dosen', $data);
	}
}
