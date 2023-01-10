<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>you are not logged in! </strong>Please login first
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('Auth/login_user');
        }
    }
    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard User',
            'content' => 'User/dashboard',
            'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function riwayat_laporan()
    {
        $data = array(
            'title' => 'Riwayat Laporan Pengguna',
            'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
            'content' => 'User/riwayat_laporan',
            'reports' => $this->MappingModel->getMappingDataByIdUser($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'])
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function profil()
    {
        $data = array(
            'title' => 'Profil',
            'content' => 'User/profil',
            'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
            'activity' => $this->UsersModel->getReportsByIdUser($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
            'reportCount' => $this->UsersModel->countReportDataByIdUser($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'])
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
            'list_kecamatan' => $kecamatan->kecamatan,
            'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function input_laporan()
    {
        $this->form_validation->set_rules('title', 'Judul laporan', 'required', array('required' => 'Silahkan isi judul terlebih dahulu'));
        $this->form_validation->set_rules('owner_name', 'Nama pemilik', 'required', array('required' => 'Silahkan isi nama pemilik terlebih dahulu'));
        $this->form_validation->set_rules('id_culinary', 'Nama kuliner', 'required', array('required' => 'Silahkan isi nama kuliner terlebih dahulu'));
        $this->form_validation->set_rules('nama_kecamatan', 'Kecamatan', 'required', array('required' => 'Silahkan isi kecamatan terlebih dahulu'));
        $this->form_validation->set_rules('address', 'Alamat', 'required', array('required' => 'Silahkan isi alamat terlebih dahulu'));
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', array('required' => 'Silahkan isi deskripsi terlebih dahulu'));
        $this->form_validation->set_rules('latitude', 'latitude', 'required', array('required' => 'Silahkan masukan koordinat lokasi terlebih dahulu'));
        $this->form_validation->set_rules('longitude', 'longitude', 'required', array('required' => 'Silahkan masukan koordinat lokasi terlebih dahulu'));
        $this->form_validation->set_rules('open_hour', 'Jam Buka', 'required', array('required' => 'Silahkan masukan jam buka terlebih dahulu'));
        $this->form_validation->set_rules('open_min', 'Menit buka', 'required', array('required' => 'Silahkan menit tutup lokasi terlebih dahulu'));
        $this->form_validation->set_rules('close_hour', 'Jam tutup', 'required', array('required' => 'Silahkan masukan jam tutup lokasi terlebih dahulu'));
        $this->form_validation->set_rules('close_min', 'Menit tutup', 'required', array('required' => 'Silahkan masukan menit tutup lokasi terlebih dahulu'));

        if ($this->form_validation->run() == false) {
            $url = 'http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3524';
            $get_url = file_get_contents($url);
            $kecamatan = json_decode($get_url);
            // print_r($kecamatan);

            $data = array(
                'title' => 'Form Laporan',
                'content' => 'User/input_laporan',
                'mapping' => $this->MappingModel->getMappingData(),
                'culinaries' => $this->CulinariesModel->getCulinaries(),
                'list_kecamatan' => $kecamatan->kecamatan,
                'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
            );
            $this->load->view('User/templates/wrapper', $data);
            $this->load->view('User/templates/wrapper', $data);
        } else {
            $report_thumb = $_FILES['report_thumb']['name'];
            if ($report_thumb = '') {
            } else {
                $config['upload_path'] = './uploads/thumbnail_peta';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('report_thumb')) {
                    echo $this->upload->display_errors();
                    echo '<br>';
                    var_dump($_FILES['report_thumb']['name']);
                } else {
                    $report_thumb = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_user' => $this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'],
                'title' => $this->input->post('title'),
                'id_culinary' => $this->input->post('id_culinary'),
                'owner_name' => $this->input->post('owner_name'),
                'address' => $this->input->post('address'),
                'nama_kecamatan' => $this->input->post('nama_kecamatan'),
                'description' => $this->input->post('description'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'report_thumb' => $this->input->post('report_thumb'),
                'report_time' => round(microtime(true) * 1000),
                'open_time' => $this->input->post('open_hour') . ':' . $this->input->post('open_min'),
                'close_time' => $this->input->post('close_hour') . ':' . $this->input->post('close_min'),
                'report_thumb' => $report_thumb
            );
            $this->UsersModel->insertLaporan($data);
            redirect('User/riwayat_laporan');
        }
    }
    public function form_update($id_laporan)
    {
        $url = 'http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3524';
        $get_url = file_get_contents($url);
        $kecamatan = json_decode($get_url);

        $data = array(
            'title' => 'Form Update Laporan',
            'data' => $this->MappingModel->getMappingDataByIdReports($id_laporan),
            'content' => 'User/update_laporan',
            'culinaries' => $this->CulinariesModel->getCulinaries(),
            'list_kecamatan' => $kecamatan->kecamatan,
            'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function update_laporan($id)
    {
        $this->form_validation->set_rules('title', 'Judul laporan', 'required', array('required' => 'Silahkan isi judul terlebih dahulu'));
        $this->form_validation->set_rules('owner_name', 'Nama pemilik', 'required', array('required' => 'Silahkan isi nama pemilik terlebih dahulu'));
        $this->form_validation->set_rules('id_culinary', 'Nama kuliner', 'required', array('required' => 'Silahkan isi nama kuliner terlebih dahulu'));
        $this->form_validation->set_rules('nama_kecamatan', 'Kecamatan', 'required', array('required' => 'Silahkan isi kecamatan terlebih dahulu'));
        $this->form_validation->set_rules('address', 'Alamat', 'required', array('required' => 'Silahkan isi alamat terlebih dahulu'));
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', array('required' => 'Silahkan isi deskripsi terlebih dahulu'));
        $this->form_validation->set_rules('latitude', 'latitude', 'required', array('required' => 'Silahkan masukan koordinat lokasi terlebih dahulu'));
        $this->form_validation->set_rules('longitude', 'longitude', 'required', array('required' => 'Silahkan masukan koordinat lokasi terlebih dahulu'));
        $this->form_validation->set_rules('open_hour', 'Jam Buka', 'required', array('required' => 'Silahkan masukan jam buka terlebih dahulu'));
        $this->form_validation->set_rules('open_min', 'Menit buka', 'required', array('required' => 'Silahkan menit tutup lokasi terlebih dahulu'));
        $this->form_validation->set_rules('close_hour', 'Jam tutup', 'required', array('required' => 'Silahkan masukan jam tutup lokasi terlebih dahulu'));
        $this->form_validation->set_rules('close_min', 'Menit tutup', 'required', array('required' => 'Silahkan masukan menit tutup lokasi terlebih dahulu'));

        if ($this->form_validation->run() == false) {
            redirect('User/form_update/' . $id);
        } else {
            $report_thumb = $_FILES['report_thumb']['name'];
            if ($report_thumb = '') {
            } else {
                $config['upload_path'] = './uploads/thumbnail_peta';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('report_thumb')) {
                    echo $this->upload->display_errors();
                    echo '<br>';
                    var_dump($_FILES['report_thumb']['name']);
                } else {
                    $report_thumb = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_user' => $this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'],
                'title' => $this->input->post('title'),
                'id_culinary' => $this->input->post('id_culinary'),
                'owner_name' => $this->input->post('owner_name'),
                'address' => $this->input->post('address'),
                'nama_kecamatan' => $this->input->post('nama_kecamatan'),
                'description' => $this->input->post('description'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'report_thumb' => $this->input->post('report_thumb'),
                'report_time' => round(microtime(true) * 1000),
                'open_time' => $this->input->post('open_hour') . ':' . $this->input->post('open_min'),
                'close_time' => $this->input->post('close_hour') . ':' . $this->input->post('close_min'),
                'report_thumb' => $report_thumb
            );
            $this->UsersModel->updateLaporan($data, $id);
            redirect('User/riwayat_laporan');
        }
    }
    public function delete_laporan($id_laporan)
    {
        $this->db->where('id', $id_laporan)->delete('tb_reports');
        redirect('User/riwayat_laporan');
    }
    public function update_profile()
    {
        $this->form_validation->set_rules('first_name', 'Nama depan', 'required', array('required' => 'Tidak boleh kosong'));
        $this->form_validation->set_rules('last_name', 'Nama belakang', 'required', array('required' => 'Tidak boleh kosong'));

        if ($this->input->post('password') == null) {
            if ($this->form_validation->run() == false) {
                $data = array(
                    'title' => 'Profil',
                    'content' => 'User/profil',
                    'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
                    'activity' => $this->UsersModel->getReportsByIdUser($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'])
                );
                $this->load->view('User/templates/wrapper', $data);
            } else {
                $profile_pict = $_FILES['profile_pict']['name'];

                if ($profile_pict == '') {
                    $id = $this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'];
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'birth_date' => $this->input->post('birth_date'),
                        'address' => $this->input->post('address'),
                        'gender' => $this->input->post('gender'),
                    );
                    $this->UsersModel->updateUserProfile($id, $data);
                    redirect('User/profil');
                } else {
                    $config['upload_path'] = './uploads/profile_pict';
                    $config['allowed_types'] = 'jpg|jpeg|png';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('profile_pict')) {
                        echo $this->upload->display_errors();
                        echo '<br>';
                        var_dump($_FILES['profile_pict']['name']);
                    } else {
                        $profile_pict = $this->upload->data('file_name');
                    }

                    $id = $this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'];
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'birth_date' => $this->input->post('birth_date'),
                        'address' => $this->input->post('address'),
                        'gender' => $this->input->post('gender'),
                        'profile_pict' => $profile_pict
                    );
                    $this->UsersModel->updateUserProfile($id, $data);
                    redirect('User/profil');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $data = array(
                    'title' => 'Profil',
                    'content' => 'User/profil',
                    'profile' => $this->UsersModel->getUserProfileById($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id']),
                    'activity' => $this->UsersModel->getReportsByIdUser($this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'])
                );
                $this->load->view('User/templates/wrapper', $data);
            } else {
                $profile_pict = $_FILES['profile_pict']['name'];

                if ($profile_pict == '') {
                    $id = $this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'];
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'password' => password_hash(
                            $this->input->post('password'),
                            PASSWORD_DEFAULT
                        ),
                        'birth_date' => $this->input->post('birth_date'),
                        'address' => $this->input->post('address'),
                        'gender' => $this->input->post('gender'),
                    );
                    $this->UsersModel->updateUserProfile($id, $data);
                    redirect('User/profil');
                } else {
                    $config['upload_path'] = './uploads/profile_pict';
                    $config['allowed_types'] = 'jpg|jpeg|png';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('profile_pict')) {
                        echo $this->upload->display_errors();
                        echo '<br>';
                        var_dump($_FILES['profile_pict']['name']);
                    } else {
                        $profile_pict = $this->upload->data('file_name');
                    }

                    $id = $this->UsersModel->getUserByEmail($this->session->userdata('email'))['id'];
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'password' => password_hash(
                            $this->input->post('password'),
                            PASSWORD_DEFAULT
                        ),
                        'birth_date' => $this->input->post('birth_date'),
                        'address' => $this->input->post('address'),
                        'gender' => $this->input->post('gender'),
                        'profile_pict' => $profile_pict
                    );
                    $this->UsersModel->updateUserProfile($id, $data);
                    redirect('User/profil');
                }
            }
        }
    }
}
