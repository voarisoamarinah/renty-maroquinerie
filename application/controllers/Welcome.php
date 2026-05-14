<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->model('Article', 'article');
		$this->load->model('Collection', 'collection');
        $articles = array();
        $articles  = $this->article->get5RandomArticle();
        $article = array();
        $article  = $this->article->getRecentArticle();
        $collection = array();
        $collection  = $this->collection->getRecentCollection();
		$this->load->view('index', array('articles' => $articles, 'collection' => $collection, 'article' => $article));
    
	}
}
