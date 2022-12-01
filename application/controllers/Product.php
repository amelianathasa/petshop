<?php
class Product extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['pages'] = 'Product';
        $data['count_member'] = $this->db->query("SELECT * FROM user WHERE role = 'member'")->num_rows();
        $data['count_product'] = $this->db->query("SELECT * FROM produk")->num_rows();
        // $id = $this->session->userdata['id_user'];
        // $data['count_pinjam'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Di Pinjam' ")->num_rows();
        // $data['count_kembali'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Kembali' ")->num_rows();
        // $data['count_pinjamk'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Di Pinjam' AND id_user='$id'")->num_rows();
        // $data['count_kembalik'] = $this->db->query("SELECT * FROM t_peminjaman WHERE status = 'Kembali' AND id_user='$id'")->num_rows();
        $this->load->view('Layout/Header', $data);
        $this->load->view('Pages/Form_Product', $data);
        $this->load->view('Layout/Footer');
    }
}
