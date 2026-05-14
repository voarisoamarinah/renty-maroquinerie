<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionFeedback extends CI_Controller {
    public function index() {
    	$this->load->model('Feedback', 'feedback');
        $feedbacks = array();
        $feedbacks = $this->feedback->getFeedbacks();
		$this->load->view('feedback', array('feedbacks' => $feedbacks));
    }
}