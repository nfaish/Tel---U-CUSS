<?php


class Akun_model extends CI_Model
{

    function buatAkun($post)
    {
        $nip            = $this->db->escape($_POST['nip']);
        $nama_depan      = $this->db->escape($_POST['nama_depan']);
        $nama_belakang     = $this->db->escape($_POST['nama_belakang']);
        $kode_dosen     = $this->db->escape($_POST['kode_dosen']);
        $email          = $this->db->escape($_POST['email']);
        $username       = $this->db->escape($_POST['username']);
        $password       = md5($this->db->escape($_POST['password']));
        $jenis_kelamin  = $this->db->escape($_POST['jenis_kelamin']);
        $query = "INSERT INTO dosen (
                    nip,
                    nama_depan,
                    nama_belakang,
                    kode_dosen,
                    email,
                    username,
                    password,
                    jenis_kelamin,
                    id_status
                )
                VALUES
                    (
                        $nip,
                        $nama_depan,
                        $nama_belakang,
                        $kode_dosen,
                        $email,
                        $username,
                        '$password',
                        $jenis_kelamin,
                        1
                    )";
        $sql = $this->db->query($query);

        $query1 = "INSERT INTO dosen_additional (
                    nip
                )
                VALUES
                    (
                        $nip
                    )";
        $sql1 = $this->db->query($query1);
    }

    public function deleteByNip($nip)
    {
        $this->db->delete('dosen_additional', array('nip' => $nip));
         return true;
    }

    function dataDosenSession()
    {
        $nip    = $this->session->userdata("nip");
        $query  = "SELECT * FROM dosen WHERE nip = $nip ";
        $sql    = $this->db->query($query);
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }
}
