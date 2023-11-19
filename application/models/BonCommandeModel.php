<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonCommandeModel extends CI_Model {
	public function selectAllBonCommandeNonValide(){
		$query="select * from v_bon_commande_non_valide_montant";
		$query=$this->db->query($query);
		$query=$query->result();
		return $query;
	}
	public function selectAllBonCommandeNonValideDG(){
		$query="select * from v_bon_commande_non_valide_dg_montant";
		$query=$this->db->query($query);
		$query=$query->result();
		return $query;
	}
	public function validerBCFinance($idbon, $user){
		$query="insert into validation_bon_commande_finances(id_bon_valid_bon_fin, id_emp_valid_bon_fin) values(%s, %s)";
		$query=sprintf($query, $idbon, $user);
		$this->db->query($query);
	}
	public function validerBCDG($idbon, $user){
		$query="insert into validation_bon_commande_dg(id_bon_valid_bon_dg, id_emp_valid_bon_dg) values(%s, %s)";
		$query=sprintf($query, $idbon, $user);
		$this->db->query($query);
	}
}