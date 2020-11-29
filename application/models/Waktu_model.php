<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Waktu_model extends CI_Model
{

    public function hariByID($id_hari)
    {
        $query = "SELECT * FROM hari WHERE id_hari = $id_hari";

        $sql = $this->db->query($query);
        print_r($sql);
    }

    public function jamByID($kode_jam)
    {
        $query = "SELECT * FROM jam WHERE kode_jam = $kode_jam";

        $sql = $this->db->query($query);
        print_r($sql);
    }


    public function daftar_jam()
    {
        $query = "SELECT 
                    waktu.kode_waktu,
                    waktu.id_kelas,
                    waktu.kode_jam,
                    jam.kode_jam,
                    jam.nama_jam
                    FROM jam
                    JOIN waktu ON
                        waktu.kode_jam = jam.kode_jam ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function daftar_hari()
    {
        $query = "SELECT 
                    hari.id_hari,
                    hari.nama_hari,
                    waktu.kode_waktu,
                    waktu.id_kelas,
                    waktu.kode_jam
                    FROM hari
                    JOIN waktu ON
                        waktu.id_hari = hari.id_hari ";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function tambahJam($post)
    {
        $kode_jam           = $this->db->escape($_POST['kode_jam']);
        $nama_jam           = $this->db->escape($_POST['nama_jam']);
        $query = "INSERT INTO jam (
                    kode_jam,
                    nama_jam
                )
                VALUES
                    (
                        $kode_jam,
                        $nama_jam
                    )";
        $sql = $this->db->query($query);
    }
    public function tambahHari($post)
    {
        $kode_hari           = $this->db->escape($_POST['kode_hari']);
        $nama_hari           = $this->db->escape($_POST['nama_hari']);
        $query = "INSERT INTO hari (
                    kode_hari,
                    nama_hari
                )
                VALUES
                    (
                        $kode_hari,
                        $nama_hari
                    )";
        $sql = $this->db->query($query);
    }

    public function hapus_jam($kode_jam)
    {
        $this->db->delete('jam', ['kode_jam' => $kode_jam]);
    }

    public function hapus_hari($id_hari)
    {
        $this->db->delete('hari', ['id_hari' => $id_hari]);
    }
}
