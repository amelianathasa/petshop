<?php

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        check_not_login();
        $data['pages'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $this->load->view('Layout\Header', $data);
        $this->load->view('Pages\Profil');
        $this->load->view('Layout\Footer');
    }

    public function edit()
    {
        $data['pages'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('nama_user', 'Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('jk_user', 'Gender', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Layout\Header', $data);
            $this->load->view('Pages\EditProfil', $data);
            $this->load->view('Layout\Footer');
        } else {
            $nama_user = $this->input->post('nama_user');
            $alamat = $this->input->post('alamat');
            $no_telp = $this->input->post('no_telp');
            $jk_user = $this->input->post('jk_user');

            $id_user = $this->input->post('id_user');

            //cek jika ada ava

            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = 'vendor/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_user', $nama_user);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('jk_user', $jk_user);

            $this->db->where('id_user', $id_user);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Has Been Updated!</div>');
            redirect('profil');
        }
    }
}
