<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProForma extends CI_Controller {

	public function index($errorLog=""){
        redirect(site_url("proforma/toListeDemande"));
    }

    public function toListeDemande() {
        selectAllDemandeProforma
    }
}