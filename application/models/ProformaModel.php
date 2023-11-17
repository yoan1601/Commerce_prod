<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProformaModel extends CI_Model {

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

    public function getCommandeById($idBC) {
        $query = "select * from v_bon_commande where id_bon = ".$idBC;
        $query = $this->db->query($query);
		$bon = $query->row();
		$bon->details = $this->proforma->getDetailBonCommande($idBC);
        return $bon;
    }

    public function getDetailBonCommande($idBC)
	{
		$query = "select * from v_detail_bon_commande where id_bon_detail_bon = " . $idBC;
		$query = $this->db->query($query);
		return $query->result();
	}

	public function selectAllDemandeProforma() {
        $query = "select * from demande_proformas";
        $query = $this->db->query($query);
		$allDemande = $query->result();
		$resultat = array();
		foreach ($allDemande as $key => $demande) {
			$demande->details = $this->proforma->getDetailForDemandeProforma($demande->id_demande);
			$resultat[] = $demande;
		}
        return $resultat;
    }

    public function getDetailForDemandeProforma($idDemande)
	{
		$query = "select * from v_detail_demande_proforma where id_demande_detail_demande = " . $idDemande;
		$query = $this->db->query($query);
		return $query->result();
	}
}
