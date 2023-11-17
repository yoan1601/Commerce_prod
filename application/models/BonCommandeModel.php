<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonCommandeModel extends CI_Model {
	public function selectAllBonCommandeNonValide(){
		$query="select * from v_bon_commande_non_valide_montant";
		$query=$this->db->query($query);
		$query=$query->result();
		return $query;
	}
}