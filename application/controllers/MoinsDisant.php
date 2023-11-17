<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoinsDisant extends CI_Controller {
	public function index()
	{
		$modePaiements=$this->moinsdisant->selectAllModePaiements();
		$proformas=$this->moinsdisant->selectAllProformatByDemande(1);
		$proformas=$this->moinsdisant->affecteMoinsDisant($proformas);
		$data["demande"]=1;
		$data["modePaiements"]=$modePaiements;
		$data["proformas"]=$proformas;
        $this->load->view("pages/ComparaisonPrix", $data);
	}
	public function saveBonCommande(){
		$modes=array();
		for($i=1;$this->input->post("mode".$i)!==null;$i++){
			$modes[]=$this->input->post("mode".$i);
		}
		$livrePart=array();
		for($i=1;$this->input->post("livraisonpart".$i)!==null;$i++){
			$livrePart[]=$this->input->post("livraisonpart".$i);
		}
		$demande=$this->input->post("demande");
		$proformas=$this->moinsdisant->selectAllProformatByDemande($demande);
		$proformas=$this->moinsdisant->affecteMoinsDisant($proformas);
		$moinsDisant=$this->moinsdisant->genererMoinsDisant($proformas);
		for($i=0;$i<count($proformas);$i++){
			$nbCheap=$this->moinsdisant->countCheapest($proformas[$i]);
			if($nbCheap==0){
				continue;
			}
			$proformaMoinsDisant;
			foreach($moinsDisant as $md){
				if($proformas[$i]["proforma"]->id_proforma==$md["proforma"]->id_proforma){
					$proformaMoinsDisant=$md;
					break;
				}
			}
			$this->moinsdisant->insertBonCommande($proformaMoinsDisant, $livrePart[$i], $modes[$i]);
		}
		redirect("moinsDisant");
	}
}
