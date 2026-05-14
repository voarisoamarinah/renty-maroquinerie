<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontoffice extends CI_Controller {
  public function index() {
    $this->load->model('Article', 'article');
    $this->load->model('Collection', 'collection');
    $articles = array();
    $articles  = $this->article->get5RandomArticle();
    $article = array();
    $article  = $this->article->getRecentArticle();
    $collections = array();
    $collections  = $this->collection->get2RandomCollection();
    $this->load->view('index', array('articles' => $articles, 'collections' => $collections, 'article' => $article));
  }
  public function articles() {
    $this->load->model('Article', 'article');
    $this->load->model('Collection', 'collection');
    $articles = array();
    $articles  = $this->article->getAllArticleRandom();
    $this->load->view('liste_articles', array('articles' => $articles));
  }
  public function articlesParCollection() {
    $this->load->model('Article', 'article');
    $this->load->model('Collection', 'collection');
    $id_collection = $this->input->get('id_collection');
    $articles = array();
    $articles  = $this->article->getArticles($id_collection);
    $collection = array();
    $collection = $this->collection->getCollection($id_collection);
    $this->load->view('liste_articles', array('articles' => $articles,'collection' => $collection));
  }
  public function catalogue() {
    $this->load->model('Article', 'article');
    $id_article = $this->input->get('id_article');
    $article = array();
    $article  = $this->article->getArticle($id_article);
    $this->load->view('catalogue', array('article' => $article));
  
  }
  public function recherche() {
    $this->load->model('Article', 'article');
    $this->load->model('Collection', 'collection');
    $mot_cle = $this->input->get('recherche');
    $articles = array();
    $articles  = $this->article->rechercheArticle($mot_cle);
    $collections = array();
    $collections  = $this->collection->rechercheCollection($mot_cle);
    $this->load->view('resultat_recherche', array('articles' => $articles,'collections' => $collections));
  
  }
  public function compte() {
		$this->load->library('session');
    $utilisateur = $this->session->userdata('utilisateur');
    if ($utilisateur['id_utilisateur']==null) {
      redirect('Authentification/index');
    } else {
      $enregistrements = array();
      $this->load->view('compte', array('enregistrements' => $enregistrements));
    }
  }
  public function ajouterEnregistrement() {
		$this->load->library('session');
    $this->load->model('Enregistrement', 'enregistrement');
    $id_gallerie = $this->input->get('id_gallerie');
    $utilisateur = $this->session->userdata('utilisateur');
    if ($utilisateur['id_utilisateur']==null) {
      redirect('Authentification/index');
    } else {
      $enregistrement = array(
        'id_utilisateur' => $utilisateur['id_utilisateur'],
        'id_gallerie' => $id_gallerie
      );
      $this->enregistrement->insertEnregistrement($enregistrement);
      redirect('Frontoffice/compte');
    }
  }
  public function supprimerEnregistrement() {
    $this->load->model('Enregistrement', 'enregistrement');
    $id_enregistrement = $this->input->get('id_enregistrement');
    $this->enregistrement->supprimerEnregistrement($id_enregistrement);
    redirect('Frontoffice/compte');
  }
}