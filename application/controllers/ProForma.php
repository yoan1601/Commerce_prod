<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProForma extends CI_Controller {

	public function index($errorLog=""){
        redirect(site_url("proForma/toListeDemande"));
    }

    public function toDetailBon($idBC) {
        $BC = $this->proforma->getCommandeById($idBC);
        var_dump($BC);
    }

    public function toListeDemande() {
        $allDemande = $this->proforma->selectAllDemandeProforma();
        $data['allDemande'] = $allDemande;
        $this->load->view('pages/ListesDemandePF', $data);
    }
}
