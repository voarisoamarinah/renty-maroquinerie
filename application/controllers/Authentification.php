<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentification extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}
    public function deconnexion()
    {
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('Frontoffice/index');
    }
    public function inscription()
	{
		$this->load->model('Utilisateur', 'utilisateur');
        $genre = array();
        $genre = $this->utilisateur->getGenre();
        $pays = array();
        $pays = $this->utilisateur->getPays();
		$this->load->view('signin', array('genre' => $genre,'pays' => $pays));
	}
	public function authentification()
	{
		$this->load->library('session');
		$this->load->model('Utilisateur', 'utilisateur');
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$utilisateur = $this->utilisateur->checkLogin($email, $mdp);
		
		if (!empty($utilisateur)) {
			if ($utilisateur['admin'] == TRUE) {
				$this->session->set_userdata('admin',$utilisateur);
				$admin = $this->session->userdata('admin');
				$this->load->view('home_admin', array('admin' => $admin)); 
			} else {
				$this->session->set_userdata('utilisateur',$utilisateur);
				$u = $this->session->userdata('utilisateur');
				redirect('Frontoffice/index');
			}
		} else {
			$data['error'] = 'Nom d\'utilisateur ou mot de passe incorrect';
			$this->load->view('login', $data);
		}
	}
    public function insertion()
	{
		$this->load->model('Utilisateur', 'utilisateur');
		$mdp1 = $this->input->post('mdp1');
		$mdp2 = $this->input->post('mdp2');
		$photo = $this->input->post('photo');
		if (!isset($photo)) {
			$photo = 'default-user.jpg';
		}
        $infos = array(
			'nom' => $this->input->post('nom'),
			'prenom' => $this->input->post('prenom'),
			'id_genre' => $this->input->post('genre'),
			'email' => $this->input->post('email'),
			'photo' => $photo,
			'mot_de_passe' => $mdp1,
			'contact' => $this->input->post('numtel'),
			'id_pays' => $this->input->post('location'),
		);
		if ($mdp1 != $mdp2) {
			$this->load->model('Utilisateur', 'utilisateur');
			$genre = array();
			$genre = $this->utilisateur->getGenre();
			$this->load->model('Utilisateur', 'utilisateur');
			$pays = array();
			$pays = $this->utilisateur->getPays();
			$this->load->view('signin', array('infos' => $infos,'genre' => $genre,'pays' => $pays));
		} else {
			$infos = array(
				'nom' => $this->input->post('nom'),
				'prenom' => $this->input->post('prenom'),
				'id_genre' => $this->input->post('genre'),
				'email' => $this->input->post('email'),
				'photo' => $photo,
				'mot_de_passe' => $mdp1,
				'contact' => $this->input->post('numtel'),
				'id_pays' => $this->input->post('location'),
			);
        	$utilisateur = $this->utilisateur->insertUtilisateur($infos);
			$this->load->view('index', array('utilisateur' => $utilisateur));
		}
	}
}
