<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionArticle extends CI_Controller {
    public function supprimerArticle() {
        $this->load->model('Article', 'article');
        $id_article = $this->input->get('id_article');
        $this->article->supprimerArticle($id_article);
        $id_collection = $this->input->get('id_collection');
        $this->load->model('Collection', 'collection');
        $collection = array();
        $collection = $this->collection->getCollection($id_collection);
        $articles = array();
        $articles = $this->article->getArticles($id_collection);
        $this->load->view('article', array('articles' => $articles, 'collection' => $collection));
	}
    public function nouvelleArticle() {
        $this->load->model('Article', 'article');
        $id_collection = $this->input->get('id_collection');
        $this->load->model('Collection', 'collection');
        $collection = array();
        $collection = $this->collection->getCollection($id_collection);
        $this->load->view('insertion_article', array('collection' => $collection));
    }
    public function insertArticle() {
        $this->load->model('Article', 'article');
        $id_collection = $this->input->get('id_collection');
        $largeur = $this->input->post('largeur');
        $hauteur = $this->input->post('hauteur');
        $profondeur = $this->input->post('profondeur');
        $dimensions = array(
            'largeur' => $largeur,
            'hauteur' => $hauteur,
            'profondeur' => $profondeur
        );

        $matiere1 = $this->input->post('matiere1');
        $matiere2 = $this->input->post('matiere2');
        $matiere3 = $this->input->post('matiere3');
        $matiere4 = $this->input->post('matiere4');
        $matiere5 = $this->input->post('matiere5');
        $matieres = array();

        if ($matiere1 != '') {
            array_push($matieres, $matiere1);
        }
        if ($matiere2 != '') {
            array_push($matieres, $matiere2);
        }
        if ($matiere3 != '') {
            array_push($matieres, $matiere3);
        }
        if ($matiere4 != '') {
            array_push($matieres, $matiere4);
        }
        if ($matiere5 != '') {
            array_push($matieres, $matiere5);
        }

        $article = array(
            'nom_article' => $this->input->post('nom_article'),
            'description_article' => $this->input->post('description_article'),
            'prix' => $this->input->post('prix'),
            'date_crea' => $this->input->post('date_crea'),
            'photo' => $this->input->post('photo'),
            'dimensions' => json_encode($dimensions),
            'matieres' => json_encode($matieres),
            'id_collection' => $id_collection
        );

        $this->article->insertArticle($article);

        $this->load->model('Collection', 'collection');
        $collection = array();
        $collection = $this->collection->getCollection($id_collection);
        $articles = array();
        $articles = $this->article->getArticles($id_collection);
        $this->load->view('article', array('articles' => $articles, 'collection' => $collection));
    }
    public function articlesCollection() {
        $this->load->model('Article', 'article');
        $this->load->model('Collection', 'collection');
        $id_collection = $this->input->get('id_collection');
        $collection = array();
        $collection = $this->collection->getCollection($id_collection);
        $articles = array();
        $articles = $this->article->getArticles($id_collection);
        $this->load->view('article', array('articles' => $articles, 'collection' => $collection));
    }
}