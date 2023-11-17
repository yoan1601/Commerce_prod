<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonCommande extends CI_Controller {
	public function index()
	{
        $bonnonvalide=$this->boncommande->selectAllBonCommandeNonValide();
        $data["bons"]=$bonnonvalide;
        $this->load->view("pages/ListeBCGenere", $data);
	}
    public function detailBonDeptAchat($idbon){
        
    }
}