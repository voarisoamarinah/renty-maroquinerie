<?php
class Feedback extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getFeedbacks() {
        $query = $this->db->get('utilisateur_feedback_view'); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
}