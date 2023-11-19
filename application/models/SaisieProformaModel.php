<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaisieProformaModel extends CI_Model {
    public function selectAllFournisseurs(){
        $query="select * from fournisseurs";
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
    }
    public function selectAllArticles(){
        $query="select * from articles";
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
    }
    public function insertProforma($fournisseur, $delai, $details, $demande){
        $query="insert into proformas(id_fournisseur_proforma, delai_livraison_proforma, id_demande_proforma_proforma) values(%s, '%s', %s)";
        $query=sprintf($query, $fournisseur, $delai, $demande);
        $this->db->query($query);
        $lastId=$this->getLastIdProforma();
        foreach($details as $detail){
            $this->insertDetailProforma($detail, $lastId);
        }
    }
    public function getLastIdProforma(){
        $query="select max(id_proforma) as last_id from proformas";
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0]->last_id;
        }
        return $query;
    }
    public function insertDetailProforma($detail, $proforma){
        $query="insert into detail_proformas(id_article_detail_proforma, quantite_detail_proforma, puht_detail_proforma, tva_detail_proforma, ttc_detail_proforma, id_proforma_detail_proforma) values(%s, %s, %s, %s, %s, %s)";
        $query=sprintf($query, $detail["article"], $detail["qte"], $detail["puht"], $detail["tva"], $detail["ttc"], $proforma);
        $this->db->query($query);
    }
}