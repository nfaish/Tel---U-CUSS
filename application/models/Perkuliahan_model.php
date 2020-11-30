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
        $sks   = $this->db->escape($_POST['sks']);
        $query = "INSERT INTO matkul (
            nama_matkul,
            kode_matkul,
            sks
        )
        VALUES
            (
            $nama_matkul,
            $kode_matkul,
            $sks
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

    public function daftarMatkulByDosen($nip)
    {
        $query = "SELECT matkul.nama_matkul as nama_matkul, 
                        matkul.kode_matkul as kode_matkul, 
                        matkul.sks as sks,
                        mengajar.nip as nip,
                        mengajar.id_mengajar as id_mengajar
                        FROM mengajar JOIN matkul on 
                        mengajar.id_matkul = matkul.id_matkul
                        WHERE mengajar.nip = $nip ";
        $sql = $this->db->query($query);
        return $sql->result_array();
        
    }

    public function daftarData_kuliah($nip)
    {
        $query = "SELECT matkul.nama_matkul as nama_matkul, 
                        matkul.kode_matkul as kode_matkul, 
                        matkul.sks as sks,
                        mengajar.nip as nip,
                        mengajar.id_mengajar as id_mengajar,
                        dosen.nama_depan as nama_depan,
                        dosen.nama_belakang as nama_belakang,
                        dosen.kode_dosen as kode_dosen
                        FROM mengajar 
                        JOIN dosen on mengajar.nip = dosen.nip 
                        JOIN matkul on mengajar.id_matkul = matkul.id_matkul";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function deleteByNip($nip)
    {
        $this->db->delete('mengajar', array('nip' => $nip));
         return true;
    }
}
