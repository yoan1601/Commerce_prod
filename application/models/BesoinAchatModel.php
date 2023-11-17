<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BesoinAchatModel extends CI_Model {

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

	public function getBesoinAchatById($id) {
		$this->db->where('id_besoin', $id);
        $query = $this->db->get('besoin_achats');
        $besoin = $query->row();
		$besoin->details = $this->besoinAchat->getDetailForBesoinAchat($besoin->id_besoin);
		return $besoin;
	}
	
	public function refuserBesoin($idBesoin) {
		$this->db->where('id_besoin_detail_besoin', $idBesoin);
        $this->db->delete('detail_besoin_achats');
		$this->db->where('id_besoin', $idBesoin);
        $this->db->delete('besoin_achats');
	}

	public function validerBesoin($idEmp, $idBesoin) {
		$data = array(
			'id_emp_valid_besoin' => $idEmp,
			'id_besoin_valid_besoin' => $idBesoin	
		);
		$this->db->insert('validation_besoin_achats', $data);
		$insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function selectAllService($idDept = 0) {
		$query="select * from services";
		if($idDept > 0) {
			$query="select * from services where id_dept_service = ".$idDept;
		}
		$query=$this->db->query($query);
		$allService = $query->result();
		return $allService;
	}

	public function selectAllBesoinAchatsNonValide($idDept = 0, $idService = 0) {
		$query="SELECT * from v_besoiAchat_validation WHERE id_valid_besoin IS NULL";
		if($idDept > 0) {
			$query="SELECT * from v_besoiAchat_validation WHERE id_valid_besoin IS NULL AND id_dept = ".$idDept;
		}

		if($idService > 0) {
			$query .= ' AND id_service = '.$idService;
		}
		
        $query=$this->db->query($query);
        $allBesoins = $query->result();
		$resultat = array();
		foreach ($allBesoins as $key => $besoin) {
			$besoin->details = $this->besoinAchat->getDetailForBesoinAchat($besoin->id_besoin);
			$resultat [] = $besoin;
		}
		return $resultat;
	}

	public function getDetailForBesoinAchat($idBesoin) {
		$query="select * from v_detail_besoin_article where id_besoin_detail_besoin = ".$idBesoin;
		$query=$this->db->query($query);
        return $query->result();
	}

	public function insertDetailBesoinAchat($idBesoinAchat, $idArticle, $quantite) {
		$data = array(
			'id_besoin_detail_besoin' => $idBesoinAchat,
			'id_article_detail_besoin' => $idArticle,
			'quantite_detail_besoin' => $quantite
		);

		return $this->db->insert('detail_besoin_achats', $data);
	}

	public function insertBesoinAchatAndGetId($idService, $delaiLivraison) {
		$data = array(
			'id_service_besoin' => $idService,
			'delai_livraison_besoin' => $delaiLivraison
		);
		$this->db->insert('besoin_achats', $data);
		$insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function selectAllArticles(){
        $query="select * from v_article";
        $query=$this->db->query($query);
        return $query->result();
    }
}
