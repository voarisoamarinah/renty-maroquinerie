<?php
class Utilisateur extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getUtilisateurs() {
        $query = $this->db->get('utilisateur_genre_pays_view'); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function getUtilisateur($id_utilisateur) {
        $query = $this->db->get_where('utilisateur_genre_pays_view', array('id_utilisateur' => $id_utilisateur));
        return $query->row_array();
    }
    public function getGenre() {
        $query = $this->db->get('genre'); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function getPays() {
        $query = $this->db->get('pays'); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function insertUtilisateur($infos) {
        return $this->db->insert('utilisateur', $infos); 
    }
    public function supprimerUtilisateur($id_utilisateur) {
        $this->db->where('id_utilisateur', $id_utilisateur);
        $this->db->delete('utilisateur');
    }
    public function checkLogin($email, $mdp) {
        $this->db->where('email', $email);
        $this->db->where('mot_de_passe', $mdp);
        $query = $this->db->get('utilisateur');
        return $query->row_array();
    }
}