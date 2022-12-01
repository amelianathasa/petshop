<?php

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        check_not_login();
        $data['pages'] = 'Data User';
        $this->load->view('Layout\Header', $data);
        $this->load->view('Pages\User');
        $this->load->view('Layout\Footer');
    }
    public function edit($id_user)
    {
        $data['pages'] = 'Form Edit User';
        $this->load->model('Model_User');
        $data['data_user'] = $this->Model_User->edit($id_user);
        $data['role'] = ['kasir', 'member', 'groomer'];
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Layout\Header', $data);
            $this->load->view('Pages\Form_EditUser', $data);
            $this->load->view('Layout\Footer');
        } else {
            //update data
            $this->load->model('Model_User');
            $this->Model_User->editUser();
            $this->session->set_flashdata('flash', 'has been updated.');
            redirect('User');
        }
    }
    public function delete($id_user)
    {
        $this->load->model('Model_User');
        $this->Model_User->deleteUser($id_user);
        $this->session->set_flashdata('flash', 'has been deleted.');
        redirect(base_url('User'));
    }
}
