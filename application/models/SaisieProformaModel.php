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
}