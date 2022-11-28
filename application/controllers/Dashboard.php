<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        // check_not_login();
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['pages'] = 'Dashboard';
        $data['count_member'] = $this->db->query("SELECT * FROM user WHERE role_id = 'member'")->num_rows();
        $data['count_product'] = $this->db->query("SELECT * FROM produk")->num_rows();
        // $id = $this->session->userdata['id_user'];
        // $data['count_pinjam'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Di Pinjam' ")->num_rows();
        // $data['count_kembali'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Kembali' ")->num_rows();
        // $data['count_pinjamk'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Di Pinjam' AND id_user='$id'")->num_rows();
        // $data['count_kembalik'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Kembali' AND id_user='$id'")->num_rows();
        $this->load->view('Layout/Header', $data);
        $this->load->view('Pages/Dashboard', $data);
        $this->load->view('Layout/Footer');
    }
}
