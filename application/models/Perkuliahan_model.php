<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perkuliahan_model extends CI_Model
{

    public function daftarMatkul()
    {
        $query = "SELECT * FROM matkul";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function tambahMatkul()
    {
        $nama_matkul   = $this->db->escape($_POST['nama_matkul']);
        $kode_matkul   = $this->db->escape($_POST['kode_matkul']);
        $query = "INSERT INTO matkul (
            nama_matkul,
            kode_matkul
        )
        VALUES
            (
            $nama_matkul,
            $kode_matkul
            )";
        $sql = $this->db->query($query);
    }

    public function tambahMkdu($post)
    {
        $angkatan    = $this->db->escape($_POST['angkatan']);
        $id_fakultas    = $this->db->escape($_POST['id_fakultas']);
        $id_matkul      = $this->db->escape($_POST['id_matkul']);
        // print_r($id_matkul);
        for ($i = 0; $i < sizeof($id_matkul); $i++) {
            $query = "INSERT INTO perkuliahan (
            angkatan,
            id_fakultas,
            id_matkul
        )
        VALUES
            (
            $angkatan,
            $id_fakultas,
            $id_matkul[$i]
            )";
            $sql = $this->db->query($query);
        }
    }

    public function ambilMatkul($post, $nip)
    {
        $id_matkul      = $this->db->escape($_POST['id_matkul']);
        for ($i = 0; $i < sizeof($id_matkul); $i++) {
            $query = "INSERT INTO mengajar (
            nip,
            id_matkul
        )
        VALUES
            (
            $nip,
            $id_matkul[$i]
            )";
            $sql = $this->db->query($query);
        }
    }

    public function daftarDatakuliah()
    {
        $query = "SELECT * FROM mengajar";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
}
