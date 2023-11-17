<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoinsDisant extends CI_Controller {
	public function index()
	{
		$modePaiements=$this->moinsdisant->selectAllModePaiements();
		$proformas=$this->moinsdisant->selectAllProformatByDemande(1);
		$proformas=$this->moinsdisant->affecteMoinsDisant($proformas);
		$data["modePaiements"]=$modePaiements;
		$data["proformas"]=$proformas;
        $this->load->view("pages/ComparaisonPrix", $data);
	}
	public function saveBonCommande(){
		
	}
}
