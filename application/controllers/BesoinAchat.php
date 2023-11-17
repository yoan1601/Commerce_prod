<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BesoinAchat extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
        redirect(site_url("besoinAchat/creerBesoinAchat"));
	}

	public function detailBesoin($idBesoin) {
		$user = $this->session->user;
		$data['user'] = $user;
		$besoin = $this->besoinAchat->getBesoinAchatById($idBesoin);
		$data['besoin'] = $besoin;
		$this->load->view("pages/DetailBesoin", $data);
	}

	public function validerBesoinAchat($idEmp, $idBesoin) {
		$this->besoinAchat->validerBesoin($idEmp, $idBesoin);
		redirect(site_url('besoinAchat/toValidationBesoin'));
	}

	public function refuserBesoinAchat($idBesoin) {
		$this->besoinAchat->refuserBesoin($idBesoin);
		redirect(site_url('besoinAchat/toValidationBesoin'));
	}

	public function filtreBesoin() {
		$idService = $this->input->post('idService');
		redirect(site_url('besoinAchat/toValidationBesoin/'.$idService));
	}

	public function toValidationBesoin($idService = 0) {
		$user = $this->session->user;
		$idDept = $user->id_dept;
		$allBesoinAchat = $this->besoinAchat->selectAllBesoinAchatsNonValide($idDept, $idService);
		$allServices = $this->besoinAchat->selectAllService($idDept);
		$data['allBesoinAchat'] = $allBesoinAchat;
		$data['allServices'] = $allServices;
		$data['user'] = $user;
		$this->load->view("pages/ValidationBesoin", $data);
	}

	public function insertBesoins() {
		$delaiLivraison = $this->input->post("delaiLivraison");
		$user = $this->session->user;
		$idService = $user->id_service;
		// var_dump([$delaiLivraison, $idService]);
		$idBesoinAchat = $this->besoinAchat->insertBesoinAchatAndGetId($idService, $delaiLivraison);

		if($idBesoinAchat != false) {
			for($i = 1; $this->input->post('besoin'.$i) !== null; $i++) {
				$idArticle = $this->input->post('besoin'.$i);
				$qte = $this->input->post('qte'.$i);
				// var_dump([$idArticle, $qte]);
				$this->besoinAchat->insertDetailBesoinAchat($idBesoinAchat, $idArticle, $qte);
			}
		}

		redirect(site_url("besoinAchat"));
		
	}

    public function creerBesoinAchat() {
		$allArticle = $this->besoinAchat->selectAllArticles();
		$data["allArticle"] = $allArticle;
		$data["user"] = $this->session->user;
        $this->load->view("pages/DefinitionBesoinAchat", $data);
    }
}
