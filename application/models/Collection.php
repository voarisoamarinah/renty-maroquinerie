<?php
class Collection extends CI_Model {
    public function getAllCollection() {
        $query = $this->db->get('collection'); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function supprimerCollection($id_collection){
        $this->db->where('id_collection', $id_collection);
        $this->db->delete('article');

        $this->db->where('id_collection', $id_collection);
        $this->db->delete('collection');
    }
    public function getCollection($id_collection) {
        $query = $this->db->get_where('collection', array('id_collection' => $id_collection));
        return $query->row_array();
    }
    public function insertCollection($collection) {
        return $this->db->insert('collection', $collection); 
    }
    public function updateCollection($collection, $id_collection) {
        $this->db->where('id_collection', $id_collection);
        return $this->db->update('collection', $collection);
    }
    
    public function getRecentCollection() {
        $this->db->select('*');
        $this->db->from('collection');
        $this->db->order_by('date_crea', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $collection = $query->row_array();
            return $collection;
        } else {
            return []; 
        }
    }
    public function get2RandomCollection() {
        $this->db->select('*');
        $this->db->from('collection');
        $this->db->order_by('RAND()'); 
        $this->db->limit(2);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $collections = $query->result_array();
            return $collections;
        } else {
            return []; 
        }
    }
    public function rechercheCollection($mot_cle) {
        $this->db->like('nom_collection', $mot_cle);
        $query = $this->db->get('collection');

        if ($query->num_rows() > 0) {
            $collections = $query->result_array();
            return $collections;
        } else {
            return []; 
        }
    }
}