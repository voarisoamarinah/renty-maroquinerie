<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionCollection extends CI_Controller {
	public function index()
	{
		$this->load->model('Collection', 'collection');
        $collections = array();
        $collections = $this->collection->getAllCollection();
		$this->load->view('collection', array('collections' => $collections));
	}
    public function supprimerCollection() {
        $this->load->model('Collection', 'collection');
        $id_collection = $this->input->get('id_collection');
        $this->collection->supprimerCollection($id_collection);
        redirect('GestionCollection/index');
	}
    public function nouvelleCollection() {
        $this->load->view('insertion_collection');
    }
    public function modifierCollection() {
        $this->load->model('Collection', 'collection');
        $id_collection = $this->input->get('id_collection');
        $collection = array();
        $collection = $this->collection->getCollection($id_collection);
        $this->load->view('insertion_collection', array('collection' => $collection));
    }
    public function insertCollection() {
        $this->load->model('Collection', 'collection');
        $collection = array(
            'nom_collection' => $this->input->post('nom_collection'),
            'photo' => $this->input->post('photo'),
            'date_crea' => $this->input->post('date_crea'),
            'description_collection' => $this->input->post('description_collection')
        );
        $this->collection->insertCollection($collection);
        redirect('GestionCollection/index');
    }
    public function updateCollection() {
        $this->load->model('Collection', 'collection');
        $id_collection = $this->input->get('id_collection');
        $collection = array(
            'nom_collection' => $this->input->post('nom_collection'),
            'photo' => $this->input->post('photo'),
            'date_crea' => $this->input->post('date_crea'),
            'description_collection' => $this->input->post('description_collection')
        );
        $this->collection->updateCollection($collection, $id_collection);
        redirect('GestionCollection/index');
    }
}