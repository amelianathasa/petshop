<?php

class Form_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('Model_FormUser');
        $this->load->library('form_validation');
    }
    public function index()
    {
        //validasi data
        $data['pages'] = 'Form User';
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('id', 'ID User', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Layout\Header', $data);
            $this->load->view('Pages\Form_User');
            $this->load->view('Layout\Footer');
        } else {
            //insert data
            $this->Model_FormAnggota->addUser();
            $this->session->set_flashdata('flash', 'ditambahkan.');
            redirect('Form_User');
        }
        //view
    }
}
