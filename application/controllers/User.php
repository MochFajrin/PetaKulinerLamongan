<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard User',
            'content' => 'User/dashboard'
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function riwayat_laporan()
    {
        $data = array(
            'title' => 'Riwayat Laporan Pengguna',
            'content' => 'User/riwayat_laporan',
            'reports' => $this->MappingModel->getMappingData()
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function profil()
    {
        $data = array(
            'title' => 'Profil',
            'content' => 'User/profil',
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function form_input_laporan()
    {
        $url = 'http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3524';
        $get_url = file_get_contents($url);
        $kecamatan = json_decode($get_url);
        // print_r($kecamatan);

        $data = array(
            'title' => 'Form Laporan',
            'content' => 'User/input_laporan',
            'mapping' => $this->MappingModel->getMappingData(),
            'culinaries' => $this->CulinariesModel->getCulinaries(),
            'list_kecamatan' => $kecamatan->kecamatan
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function input_laporan()
    {
        $this->form_validation->set_rules('title', 'Judul laporan', 'required', array('required' => 'Silahkan isi judul terlebih dahulu'));
        $this->form_validation->set_rules('id_culinary', 'nama_kuliner', 'required', array('required' => 'Silahkan isi nama kuliner terlebih dahulu'));
        $this->form_validation->set_rules('owner_name', 'Nama pemilik', 'required', array('required' => 'Silahkan isi nama pemilik terlebih dahulu'));
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', array('required' => 'Silahkan isi kecamatan terlebih dahulu'));
        $this->form_validation->set_rules('address', 'Alamat', 'required', array('required' => 'Silahkan isi alamat terlebih dahulu'));
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', array('required' => 'Silahkan isi deskripsi terlebih dahulu'));
        $this->form_validation->set_rules('latitude', 'latitude', 'required', array('required' => 'Silahkan masukan koordinat lokasi terlebih dahulu'));
        $this->form_validation->set_rules('longitude', 'longitude', 'required', array('required' => 'Silahkan masukan koordinat lokasi terlebih dahulu'));
        $this->form_validation->set_rules('report_thumb', 'Gambar', 'required', array('required' => 'Silahkan masukan judul terlebih dahulu'));

        if ($this->form_validation->run() == false) {
            var_dump($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']);
            $data = array(

                'id_culinary' => $this->input->post('id_kuliner'),
                'owner_name' => $this->input->post('nama_pemilik'),
                'address' => $this->input->post('alamat'),
                'nama_kecamatan' => $this->input->post('kecamatan'),
                'description' => $this->input->post('deskripsi'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
            );
            var_dump($data);
            $this->UsersModel->insertLaporan($data);
            echo 'error';
        } else {
            $this->UsersModel->insertLaporan($this->input->post());
            var_dump($this->input->post());
        }
    }
}
