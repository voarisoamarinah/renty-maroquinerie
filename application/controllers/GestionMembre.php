<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionMembre extends CI_Controller {
    public function index() {
		$this->load->model('Utilisateur', 'utilisateur');
        $utilisateurs = array();
        $utilisateurs = $this->utilisateur->getUtilisateurs();
		$this->load->view('membre', array('utilisateurs' => $utilisateurs));
    }
    public function supprimerMembre() {
		$this->load->model('Utilisateur', 'utilisateur');
        $id_utilisateur = $this->input->get('id_utilisateur');
        $this->utilisateur->supprimerUtilisateur($id_utilisateur);
        redirect('GestionMembre/index');
    }
    public function detailsMembre() {
		$this->load->model('Utilisateur', 'utilisateur');
        $id_utilisateur = $this->input->get('id_utilisateur');
        $utilisateur = array();
        $utilisateur = $this->utilisateur->getUtilisateur($id_utilisateur);
		$this->load->view('utilisateur', array('utilisateur' => $utilisateur));
    }
}