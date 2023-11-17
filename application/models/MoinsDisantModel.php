<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoinsDisantModel extends CI_Model {
    public function selectAllModePaiements(){
        $query="select * from mode_paiements";
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
    }
    public function selectAllProformatByDemande($demande){
        $query="select * from v_proforma_fournisseurs where id_demande_proforma_proforma=%s";
        $query=sprintf($query, $demande);
        $query=$this->db->query($query);
        $query=$query->result();
        $proformas=array();
        for($i=0;$i<count($query);$i++){
            $proformas[$i]["proforma"]=$query[$i];
            $proformas[$i]["details"]=$this->getDetailProforma($query[$i]->id_proforma);
        }
        return $proformas;
    }
    public function getDetailProforma($proforma){
        $query="select * from v_detail_proforma_article where id_proforma_detail_proforma=%s";
        $query=sprintf($query, $proforma);
        $query=$this->db->query($query);
        $query=$query->result();
        foreach($query as $row){
            $row->isCheapest=false;
        }
        return $query;
    }
    public function getArticlesProformaDemande($demande){
        $query="select distinct id_article_detail_proforma as id_article from v_proforma_details where id_demande_proforma_proforma=%s";
        $query=sprintf($query, $demande);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
    }
    public function getDetailProformaArticle($demande, $article){
        $query="select * from v_proforma_details where id_demande_proforma_proforma=%s and id_article_detail_proforma=%s";
        $query=sprintf($query, $demande, $article);
        $query=$this->db->query($query);
        $query=$query->result();
        return $query;
    }
    public function getDetailsCheapest($demande){
        $articles=$this->getArticlesProformaDemande($demande);
        $detailsCheap=array();
        foreach($articles as $a){
            $details=$this->getDetailProformaArticle($demande, $a->id_article);
            $min=0;
            for($i=0;$i<count($details);$i++){
                if($details[$i]->puht_detail_proforma<$details[$min]->puht_detail_proforma){
                    $min=$i;
                }
            }
            $detailsCheap[]=$details[$min];
        }
        return $detailsCheap;
    }
    public function affecteMoinsDisant($proformas){
        $detailsCheap=$this->getDetailsCheapest($proformas[0]["proforma"]->id_demande_proforma_proforma);
        $prof=$proformas;
        foreach($prof as $p){
            foreach($p["details"] as $d){
                foreach($detailsCheap as $cheap){
                    if($d->id_detail_proforma==$cheap->id_detail_proforma){
                        $d->isCheapest=true;
                    }
                }
            }
        }
        return $prof;
    }
    public function countCheapest($proforma){
        $n=0;
        foreach($proforma["details"] as $d){
            if($d->isCheapest){
                $n++;
            }
        }
        return $n;
    }
    public function genererMoinsDisant($proformas){
        $moinsDisants=array();
        for($i=0;$i<count($proformas);$i++){
            $tempdetails=array();
            for($j=0;$j<count($proformas[$i]["details"]);$j++){
                if($proformas[$i]["details"][$j]->isCheapest){
                    $tempdetails[]=$proformas[$i]["details"][$j];
                }
            }
            if(count($tempdetails)>0){
                $moinsDisants[$i]["proforma"]=$proformas[$i]["proforma"];
                $moinsDisants[$i]["details"]=$tempdetails;
            }
        }
        return $moinsDisants;
    }
    public function insertBonCommande($moinsDisant, $isLivrePart, $modePaie){
        $libelle="BON DE COMMANDE POUR ".$moinsDisant["proforma"]->nom_fournisseur;
        $query="insert into bon_commandes(id_fournisseur_bon, libelle_bon, delai_livraison_bon, is_livraison_part_bon, id_mode_paie_bon) values(%s, '%s', '%s', %s, %s)";
        $query=sprintf($query, $moinsDisant["proforma"]->id_fournisseur, $libelle, $moinsDisant["proforma"]->delai_livraison_proforma, $isLivrePart, $modePaie);
        $this->db->query($query);
        $lastId=$this->getLastIdBonCommande();
        $numero="BON00".$lastId;
        $this->updateNumeroBonCommande($numero, $lastId);
        foreach($moinsDisant["details"] as $d){
            $this->insertDetailBonCommande($d, $lastId);
        }
    }
    public function getLastIdBonCommande(){
        $query="select max(id_bon) as last_id from bon_commandes";
        $query=$this->db->query($query);
        $query=$query->result();
        if(count($query)>0){
            return $query[0]->last_id;
        }
        return $query;
    }
    public function updateNumeroBonCommande($numero, $idbon){
        $query="update bon_commandes set numero_bon='%s' where id_bon=%s";
        $query=sprintf($query, $numero, $idbon);
        $this->db->query($query);
    }
    public function insertDetailBonCommande($detail, $idbon){
        $query="insert into detail_bon_commandes(id_article_detail_bon, quantite_detail_bon, puht_detail_bon, tva_detail_bon, ttc_detail_bon, id_bon_detail_bon) values(%s, %s, %s, %s, %s, %s)";
        $query=sprintf($query, $detail->id_article, $detail->quantite_detail_proforma, $detail->puht_detail_proforma, $detail->tva_detail_proforma, $detail->ttc_detail_proforma, $idbon);
        $this->db->query($query);
    }
}