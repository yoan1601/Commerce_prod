<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaisieProforma extends CI_Controller {
	public function index()
	{
		$fournisseurs=$this->saisieproforma->selectAllFournisseurs();
		$articles=$this->saisieproforma->selectAllArticles();
		$data["fournisseurs"]=$fournisseurs;
		$data["articles"]=$articles;
		$this->load->view("pages/SaisieProForma.php", $data);
	}
    public function save(){

    }
}
