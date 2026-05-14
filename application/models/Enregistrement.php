<?php
class Enregistrement extends CI_Model {
    public function supprimerEnregistrement($id_enregistrement){
        $this->db->where('id_enregistrement', $id_enregistrement);
        $this->db->delete('enregistrement');
    }
    public function getEnregistrements($id_utilisateur) {
        $query = $this->db->get_where('enregistrement', array('id_utilisateur' => $id_utilisateur));
        
        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function insertEnregistrement($enregistrement) {
        return $this->db->insert('vue_enregistrement_gallerie', $enregistrement); 
    }
}