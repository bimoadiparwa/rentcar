<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pemesanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('dokter','dokter.id_dokter=pemesanan.id_dokter');
        $this->db->join('pasien','pasien.id_pasien=pemesanan.id_pasien');
        $this->db->join('poli','poli.id_poli=pemesanan.id_poli');
        $this->db->join('waktu','waktu.id_waktu=pemesanan.id_waktu');
        
        $query = $this->db->get();
        return $query;
    }
    /*
     * Get pemesanan by id_pemesanan
     */
    function get_pemesanan($id_pemesanan)
    {
        return $this->db->get_where('pemesanan',array('id_pemesanan'=>$id_pemesanan))->row_array();
    }
        
    /*
     * Get all pemesanan
     */
    function get_all_pemesanan()
    {
        $this->db->order_by('id_pemesanan', 'desc');
        return $this->db->get('pemesanan')->result_array();
    }
        
    /*
     * function to add new pemesanan
     */
    function add_pemesanan($params)
    {
        $this->db->insert('pemesanan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pemesanan
     */
    function update_pemesanan($id_pemesanan,$params)
    {
        $this->db->where('id_pemesanan',$id_pemesanan);
        return $this->db->update('pemesanan',$params);
    }
    
    /*
     * function to delete pemesanan
     */
    function delete_pemesanan($id_pemesanan)
    {
        return $this->db->delete('pemesanan',array('id_pemesanan'=>$id_pemesanan));
    }
}