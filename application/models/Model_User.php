<?php

class Model_User extends CI_Model
{
    public function user()
    {
        return $this->db->get('user')->result_array();
    }

    public function hitung()
    {
        return $this->db->get('user')->num_rows();
    }
    public function deleteAnggota($id_user)
    {
        $this->db->delete('user', ['id_user' => $id_user]);
    }
    public function edit($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row();
    }
    public function editAnggota()
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
        if ($this->upload->do_upload('gambar')) {
            $data = [
                "nama_user" => $this->input->post('nama', true),
                "id_user" => $this->input->post('idUser', true),
                "jk_user" => $this->input->post('jk', true),
                "no_telp" => $this->input->post('no', true),
                "email" => $this->input->post('email', true),
                "role" => $this->input->post('role', true),
                "alamat" => $this->input->post('alamat', true),
                "foto" => $data1['upload_data']['file_name'],
            ];
        } else {
            $data = [
                "nama_user" => $this->input->post('nama', true),
                "id_user" => $this->input->post('idUser', true),
                "jk_user" => $this->input->post('jk', true),
                "no_telp" => $this->input->post('no', true),
                "email" => $this->input->post('email', true),
                "role" => $this->input->post('role', true),
                "alamat" => $this->input->post('alamat', true),
                // "foto" => $data1['upload_data']['file_name'],
            ];
        }
        $this->db->where('id_user', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}
