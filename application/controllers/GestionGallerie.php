<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionGallerie extends CI_Controller {
    public function index() {
		$this->load->model('Gallerie', 'gallerie');
        $galleries = array();
        $galleries = $this->gallerie->getAllGallerie();
		$this->load->view('gallerie', array('galleries' => $galleries));
    }
    public function nouvelleGallerie() {
		$this->load->model('Article', 'article');
        $articles = array();
        $articles = $this->article->getAllArticle();
		$this->load->view('insertion_gallerie', array('articles' => $articles));
    }
    public function insertGallerie() {
		$this->load->model('Gallerie', 'gallerie');

        $usage_recommande1 = $this->input->post('usage_recommande1');
        $usage_recommande2 = $this->input->post('usage_recommande2');
        $usage_recommande3 = $this->input->post('usage_recommande3');
        $usage_recommande4 = $this->input->post('usage_recommande4');
        $usage_recommande5 = $this->input->post('usage_recommande5');
        $usage_recommande = array();

        if ($usage_recommande1 != '') {
            array_push($usage_recommande, $usage_recommande1);
        }
        if ($usage_recommande2 != '') {
            array_push($usage_recommande, $usage_recommande2);
        }
        if ($usage_recommande3 != '') {
            array_push($usage_recommande, $usage_recommande3);
        }
        if ($usage_recommande4 != '') {
            array_push($usage_recommande, $usage_recommande4);
        }
        if ($usage_recommande5 != '') {
            array_push($usage_recommande, $usage_recommande5);
        }

        $gallerie = array(
            'id_article' => $this->input->post('id_article'),
            'photo' => $this->input->post('photo'),
            'usage_recommande' => json_encode($usage_recommande)
        );

        $this->gallerie->insertGallerie($gallerie);
        redirect('GestionGallerie/index');
    }
    public function supprimerGallerie() {
		$this->load->model('Gallerie', 'gallerie');
        $id_gallerie = $this->input->get('id_gallerie');
        $this->gallerie->supprimerGallerie($id_gallerie);
        redirect('GestionGallerie/index');
    }
}