<?php
class Article extends CI_Model {
    public function getAllArticle() {
        $query = $this->db->get('article'); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function getAllArticleRandom() {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->order_by('RAND()');
        $query = $this->db->get(); 

        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function getArticle($id_article){
        $this->db->where('id_article', $id_article);
        $query = $this->db->get('collection_article_view');
        
        if ($query->num_rows() > 0) {
            $article = $query->row_array();
            return $article;
        } else {
            return []; 
        }
    }
    public function supprimerArticle($id_article){
        $this->db->where('id_article', $id_article);
        $this->db->delete('article');
    }
    public function getArticles($id_collection) {
        $query = $this->db->get_where('article', array('id_collection' => $id_collection));
        
        if ($query->num_rows() > 0) {
            $data = $query->result_array(); 
            return $data;
        } else {
            return []; 
        }
    }
    public function insertArticle($article) {
        return $this->db->insert('article', $article); 
    }
    public function get5RandomArticle() {
        $this->db->select('id_article, nom_article, description_article, prix, article_date_crea, article_photo, dimensions, matieres, id_collection');
        $this->db->from('collection_article_view');
        $this->db->order_by('RAND()'); 
        $this->db->limit(5);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $articles = $query->result_array();
            return $articles;
        } else {
            return []; 
        }
    }
    public function getRecentArticle() {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->order_by('date_crea', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $article = $query->row_array();
            return $article;
        } else {
            return []; 
        }
    }
    public function rechercheArticle($mot_cle) {
        $this->db->like('nom_article', $mot_cle);
        $query = $this->db->get('article');

        if ($query->num_rows() > 0) {
            $articles = $query->result_array();
            return $articles;
        } else {
            return []; 
        }
    }
}