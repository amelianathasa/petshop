<?php

class Pengaturan extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        check_not_login();
        $data['pages'] = 'Pengaturan';
        $this->load->view('Layout\Header', $data);
        $this->load->view('Pages\Pengaturan');
        $this->load->view('Layout\Footer');
    }
    public function changepassword()
    {
        check_not_login();
        $data['pages'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password', 'required|trim|min_length[5]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('Layout\Header', $data);
            $this->load->view('Pages\Pengaturan');
            $this->load->view('Layout\Footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('pengaturan/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak boleh sama!</div>');
                    redirect('pengaturan/changepassword');
                } else {
                    //password sudah ok 
                    $this->db->set('password', $new_password);
                    $this->db->where('id_user', $this->session->userdata['id_user']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('pengaturan/changepassword');
                }
            }
        }
    }
}
