<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonCommande extends CI_Controller {
	public function index()
	{
        $bonnonvalide=$this->boncommande->selectAllBonCommandeNonValide();
        $data["bons"]=$bonnonvalide;
        $this->load->view("pages/ListesBCGenere", $data);
	}
    public function listeBCFinance(){
        $bonnonvalide=$this->boncommande->selectAllBonCommandeNonValide();
        $data["bons"]=$bonnonvalide;
        $this->load->view("pages/ListesBCPourFinance", $data);
    }
    public function listeBCDG(){
        $bonnonvalide=$this->boncommande->selectAllBonCommandeNonValideDG();
        $data["bons"]=$bonnonvalide;
        $this->load->view("pages/ListesBCPourDG", $data);
    }
    public function detailBonDeptAchat($idbon){
        $bonCommande=$this->proforma->getCommandeById($idbon);
        $data["bonCommande"]=$bonCommande;
        $this->load->view("pages/DetailBonC", $data);
    }
    public function detailBonCommandeDG($idbon){
        $bonCommande=$this->proforma->getCommandeById($idbon);
        $data["bonCommande"]=$bonCommande;
        $this->load->helper("value");
        $data["livrePart"]=booleanValue($bonCommande->is_livraison_part_bon);
        $somme=0;
        foreach($bonCommande->details as $d){
            $somme+=$d->ttc_detail_bon;
        }
        $data["somme"]=$somme;
        $f=new NumberFormatter("fr", NumberFormatter::SPELLOUT);
        $data["sommeLettre"]=$f->format($somme);
        $this->load->view("pages/BonCommande", $data);
    }
    public function validerBCFinance(){
        $idbon=$this->input->post("idbon");
        $this->boncommande->validerBCFinance($idbon, $this->session->user->id_emp);
        redirect("bonCommande/listeBCFinance");
    }
    public function validerBCDG(){
        $idbon=$this->input->post("idbon");
        $this->boncommande->validerBCDG($idbon, $this->session->user->id_emp);
        redirect("bonCommande/listeBCDG");
    }
}