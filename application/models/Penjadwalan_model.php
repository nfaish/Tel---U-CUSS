<?php
class Penjadwalan_model extends CI_Model {

    public function getDataRuangan(){
        $query = "SELECT * FROM ruangan
        JOIN gedung_fakultas ON gedung_fakultas.id_gedung = ruangan.id_gedung
        JOIN fakultas ON fakultas.id_fakultas = gedung_fakultas.id_fakultas
        JOIN jurusan ON jurusan.id_fakultas = fakultas.id_fakultas";

        return $this->db->query($query)->result_array();
    }
    
    public function getDataDosen(){
        $query = "SELECT dosen.nip, dosen.kode_dosen, dosen.nama_depan, dosen.nama_belakang,
        preferensi.id_preferensi, preferensi.id_hari, mengajar.id_mengajar,
        preferensi.shift1, preferensi.shift2, preferensi.shift3, preferensi.shift4, preferensi.shift5,
        preferensi.shift6, preferensi.shift7, preferensi.shift8, preferensi.shift9, preferensi.shift10,
        preferensi.shift11, preferensi.shift12, preferensi.shift13,
        matkul.id_matkul, matkul.nama_matkul, matkul.kode_matkul, matkul.sks
        FROM dosen 
        JOIN preferensi ON dosen.nip=preferensi.nip
        JOIN mengajar ON dosen.nip=mengajar.nip
        JOIN matkul ON mengajar.id_matkul=matkul.id_matkul";

        return $this->db->query($query)->result_array();
    }

    public function getClassRequirements(){
        $query = "SELECT kelas.id_kelas, kelas.nama_kelas, perkuliahan.id_jurusan,
        perkuliahan.id_perkuliahan,
        kelas.id_jurusan, jurusan.kode_jurusan, jurusan.nama_jurusan,
        matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, matkul.sks
        FROM `kelas`
        JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
        JOIN perkuliahan ON perkuliahan.id_jurusan = jurusan.id_jurusan
        JOIN matkul ON matkul.id_matkul = perkuliahan.id_matkul
        ORDER BY kelas.id_kelas";

        return $this->db->query($query)->result_array();
    }

    public function getDataPrintFakultas($id_fakultas){
        $query = "SELECT hari.nama_hari, jam.nama_jam, fakultas.nama_fakultas, jurusan.nama_jurusan, ruangan.nama_ruangan, matkul.nama_matkul, kelas.nama_kelas, dosen.nama_depan, dosen.nama_belakang, matkul.sks FROM `penjadwalan`
        JOIN mengajar ON penjadwalan.id_mengajar = mengajar.id_mengajar
        JOIN dosen ON mengajar.nip = dosen.nip
        JOIN preferensi ON preferensi.id_preferensi = penjadwalan.id_preferensi
        JOIN hari ON hari.id_hari = preferensi.id_hari
        JOIN jam ON jam.kode_jam = penjadwalan.kode_jam
        JOIN ruangan ON ruangan.id_ruangan = penjadwalan.id_ruangan
        JOIN perkuliahan ON perkuliahan.id_perkuliahan = penjadwalan.id_perkuliahan
        JOIN kelas ON kelas.id_kelas = penjadwalan.id_kelas
        JOIN jurusan ON jurusan.id_jurusan = perkuliahan.id_jurusan
        JOIN fakultas ON jurusan.id_fakultas = fakultas.id_fakultas
        JOIN matkul ON perkuliahan.id_matkul = matkul.id_matkul 
        WHERE fakultas.id_fakultas = ".$id_fakultas."
        ORDER BY hari.id_hari, kelas.id_kelas";

        return $this->db->query($query)->result_array();
    }

    public function getFakultasOption(){
        $query = "SELECT DISTINCT(fakultas.id_fakultas), nama_fakultas FROM `penjadwalan`
        JOIN mengajar ON penjadwalan.id_mengajar = mengajar.id_mengajar
        JOIN dosen ON mengajar.nip = dosen.nip
        JOIN preferensi ON preferensi.id_preferensi = penjadwalan.id_preferensi
        JOIN hari ON hari.id_hari = preferensi.id_hari
        JOIN jam ON jam.kode_jam = penjadwalan.kode_jam
        JOIN ruangan ON ruangan.id_ruangan = penjadwalan.id_ruangan
        JOIN perkuliahan ON perkuliahan.id_perkuliahan = penjadwalan.id_perkuliahan
        JOIN kelas ON kelas.id_kelas = penjadwalan.id_kelas
        JOIN jurusan ON jurusan.id_jurusan = perkuliahan.id_jurusan
        JOIN fakultas ON jurusan.id_fakultas = fakultas.id_fakultas
        JOIN matkul ON perkuliahan.id_matkul = matkul.id_matkul 
        ORDER BY hari.id_hari";

        return $this->db->query($query)->result_array();
    }

    public function getHasilPenjadwalan(){
        $query = "SELECT hari.nama_hari, jam.nama_jam, fakultas.nama_fakultas, jurusan.nama_jurusan, ruangan.nama_ruangan, matkul.nama_matkul, kelas.nama_kelas, dosen.nama_depan, dosen.nama_belakang, matkul.sks FROM `penjadwalan`
        JOIN mengajar ON penjadwalan.id_mengajar = mengajar.id_mengajar
        JOIN dosen ON mengajar.nip = dosen.nip
        JOIN preferensi ON preferensi.id_preferensi = penjadwalan.id_preferensi
        JOIN hari ON hari.id_hari = preferensi.id_hari
        JOIN jam ON jam.kode_jam = penjadwalan.kode_jam
        JOIN ruangan ON ruangan.id_ruangan = penjadwalan.id_ruangan
        JOIN perkuliahan ON perkuliahan.id_perkuliahan = penjadwalan.id_perkuliahan
        JOIN kelas ON kelas.id_kelas = penjadwalan.id_kelas
        JOIN jurusan ON jurusan.id_jurusan = perkuliahan.id_jurusan
        JOIN fakultas ON jurusan.id_fakultas = fakultas.id_fakultas
        JOIN matkul ON perkuliahan.id_matkul = matkul.id_matkul 
        ORDER BY hari.id_hari";

        return $this->db->query($query)->result_array();
    }

    public function getUniqueSks(){
        $query = "SELECT DISTINCT(sks) FROM `matkul`";

        return $this->db->query($query)->result_array();
    }

    public function deleteAll(){
        $query = 'DELETE FROM penjadwalan';
        $this->db->query($query);
        $query ='ALTER TABLE penjadwalan AUTO_INCREMENT = 1';
        return $this->db->query($query);
    }

    public function save_jadwal($jadwal){
        $query = 'INSERT INTO penjadwalan (id_mengajar, id_preferensi, id_ruangan, id_perkuliahan, id_kelas, kode_jam)
        VALUES ("'.$jadwal['id_mengajar'].'", "'.$jadwal['id_preferensi'].'", "'.$jadwal['id_ruangan'].'", "'.$jadwal['id_perkuliahan'].'", "'.$jadwal['id_kelas'].'","'.$jadwal['kode_jam'].'")';

        return $this->db->query($query);
    }

    function total_hari() 
    {
        return $this->db->get('hari')->num_rows();
    }
    function total_ruangan() 
    {
        return $this->db->get('ruangan')->num_rows();
    }
    function total_gedung() 
    {
        return $this->db->get('gedung')->num_rows();
    }
    function total_kuliah() 
    {
        return $this->db->get('perkuliahan')->num_rows();
    }
    function total_shift() 
    {
        return $this->db->get('jam')->num_rows();
    }
    function total_dosen() 
    {
        return $this->db->get('dosen')->num_rows();
    }
    function total_kelas() 
    {
        return $this->db->get('kelas')->num_rows();
    }
    function total_mkdu() 
    {
        return $this->db->get('matkul')->num_rows();
    }
    function total_fakultas() 
    {
        return $this->db->get('fakultas')->num_rows();
    }
    function total_prodi() 
    {
        return $this->db->get('jurusan')->num_rows();
    }
    function total_preferensi() 
    {
        return $this->db->get('preferensi')->num_rows();
    }
    
}
