<?php
class Gallerie extends CI_Model {
    public function getAllGallerie() {
        $query = $this->db->get('gallerie_article_view'); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function insertGallerie($gallerie) {
        return $this->db->insert('gallerie', $gallerie); 
    }
    public function supprimerGallerie($id_gallerie){
        $this->db->where('id_gallerie', $id_gallerie);
        $this->db->delete('gallerie');
    }
}