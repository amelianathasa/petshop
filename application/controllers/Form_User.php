<?php

class Form_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_formuser');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->model('Model_formuser');
        //autoCode
        $table = "user";
        $field = "id_user";

        $lastKode = $this->Model_formuser->getMax($table, $field);
        $no_urut = (int)substr($lastKode, -3, 3);
        $no_urut++;
        $str = "PP";
        $newKode = $str . sprintf('%05s', $no_urut);
        $data['idUser'] =  $newKode;

        $data['user'] =  $this->db->query("SELECT * FROM user ORDER BY id_user DESC");
        $data['pages'] = 'Form Add User';

        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('id', 'ID User', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('jk', 'Gender', 'required');
        $this->form_validation->set_rules('no', 'Phone Number', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Layout\Header', $data);
            $this->load->view('Pages\Form_User', $data);
            $this->load->view('Layout\Footer');
        } else {
            //insert data
            $this->Model_formuser->addUser();
            $this->session->set_flashdata('flash', 'has been added.');
            redirect('Form_User');
        }
    }
}
