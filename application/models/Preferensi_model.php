<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preferensi_model extends CI_Model
{
    public function __construct()
    {
        return $this->db->get('preferensi')->result_array();
    }

    //membaca DB baru_pekansidang untuk tampilan DOSEN
    public function bacaJadwal()
    {
        return $this->db->get('hari')->result_array();
    }

    //menambahkan kesediaan untuk menguji
    public function masukkanPreferensiDosen()
    {
        $hari = $this->input->post('nama_hari');

        $jumlah_hari = count($hari);

        for ($i = 0; $i < $hari; $i++) {
            //Cek input jika ada maka 1, jika tidak maka 0
            $jam1Checked = $this->input->post('6.30' . $hari[$i]) == null ? 0 : 1;
            $jam2Checked = $this->input->post('7.30' . $hari[$i]) == null ? 0 : 1;
            $jam3Checked = $this->input->post('8.30' . $hari[$i]) == null ? 0 : 1;
            $jam4Checked = $this->input->post('9.30' . $hari[$i]) == null ? 0 : 1;
            $jam5Checked = $this->input->post('10.30' . $hari[$i]) == null ? 0 : 1;
            $jam6Checked = $this->input->post('11.30' . $hari[$i]) == null ? 0 : 1;
            $jam7Checked = $this->input->post('12.30' . $hari[$i]) == null ? 0 : 1;
            $jam8Checked = $this->input->post('13.30' . $hari[$i]) == null ? 0 : 1;
            $jam9Checked = $this->input->post('14.30' . $hari[$i]) == null ? 0 : 1;
            $jam10Checked = $this->input->post('15.30' . $hari[$i]) == null ? 0 : 1;
            $jam11Checked = $this->input->post('16.30' . $hari[$i]) == null ? 0 : 1;
            $jam12Checked = $this->input->post('17.30' . $hari[$i]) == null ? 0 : 1;
            $jam13Checked = $this->input->post('18.30' . $hari[$i]) == null ? 0 : 1;

            //siapin variabel buat dikirim
            $data = [
                'nip' => $this->session->nip,
                'id_pekansidang' => $hari[$i],
                '6.30' => $jam1Checked,
                '7.30' => $jam2Checked,
                '8.30' => $jam3Checked,
                '9.30' => $jam4Checked,
                '10.30' => $jam5Checked,
                '11.30' => $jam6Checked,
                '12.30' => $jam7Checked,
                '13.30' => $jam8Checked,
                '14.30' => $jam9Checked,
                '15.30' => $jam10Checked,
                '16.30' => $jam11Checked,
                '17.30' => $jam12Checked,
                '18.30' => $jam13Checked,
            ];

            //jalanin query database
            $this->db->insert('preferensi', $data);
        }
    }

    public function bacaPreferensi($nip)
    {
        return $this->db->get('baru_jadwaldosen')->result_array($nip);
    }

    public function test()
    {
        function fizzBuzz($n)
        {
        }
    }
}
