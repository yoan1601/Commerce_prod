<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaisieProforma extends CI_Controller {
	public function index($idDemande)
	{
		$fournisseurs=$this->saisieproforma->selectAllFournisseurs();
		$articles=$this->saisieproforma->selectAllArticles();
		$data["demande"]=$idDemande;
		$data["fournisseurs"]=$fournisseurs;
		$data["articles"]=$articles;
		$this->load->view("pages/SaisieProForma.php", $data);
	}
    public function save(){
		$articles=array();
		for($i=1;$this->input->post("article".$i)!==null;$i++){
			$articles[]=$this->input->post("article".$i);
		}
		$qtes=array();
		for($i=1;$this->input->post("quantite".$i)!==null;$i++){
			$qtes[]=$this->input->post("quantite".$i);
		}
		$puhts=array();
		for($i=1;$this->input->post("puht".$i)!==null;$i++){
			$puhts[]=$this->input->post("puht".$i);
		}
		$tvas=array();
		for($i=1;$this->input->post("tva".$i)!==null;$i++){
			$tvas[]=$this->input->post("tva".$i);
		}
		$ttcs=array();
		for($i=1;$this->input->post("ttc".$i)!==null;$i++){
			$ttcs[]=$this->input->post("ttc".$i);
		}
		$details=array();
		for($i=0;$i<count($articles);$i++){
			$details[$i]["article"]=$articles[$i];
			$details[$i]["qte"]=$qtes[$i];
			$details[$i]["puht"]=$puhts[$i];
			$details[$i]["tva"]=$tvas[$i];
			$details[$i]["ttc"]=$ttcs[$i];
		}
		$fournisseur=$this->input->post("fournisseur");
		$delai=$this->input->post("delai");
		$demande=$this->input->post("demande");
		$this->saisieproforma->insertProforma($fournisseur, $delai, $details, $demande);
		redirect("proForma");
    }
}
