<?php

class Model_formuser extends CI_Model
{
    public function User()
    {
        return $this->db->get('user')->result_array();
    }

    public function getMax($table = null, $field)
    {
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }
    public function addUser()
    {
        $nmfile = "user_" . time();
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $nmfile;
        $this->load->library('upload', $config);
        // upload gambar 1
        $this->upload->do_upload('gambar');
        $result1 = $this->upload->data();
        $result = array('gambar' => $result1);
        $data1 = array('upload_data' => $this->upload->data());
        $data = [
            "id_user" => $this->input->post('idUser', true),
            "email" => $this->input->post('email', true),
            "nama_user" => $this->input->post('nama', true),
            "password" => $this->input->post('password', true),
            "jk_user" => $this->input->post('jk', true),
            "role" => $this->input->post('role', true),
            "level" => $this->input->post('level', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telp" => $this->input->post('no', true),
            "foto" => $data1['upload_data']['file_name'],
        ];
        $this->db->insert('user', $data);
    }
}
