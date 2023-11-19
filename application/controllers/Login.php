<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index($errorLog="")
	{
        // echo "<form action='".site_url("login/seConnecter")."' method='post'>
        // <input type='email' name='nom_emp' value='jean'>
        // <input type='password' name='motdepasse' value='jean'>
        // <button type='submit'>Valider</button>
        // </form>";
		$errorLog=str_replace("_", " ", $errorLog);
		$data["errorLog"]=$errorLog;
		$this->load->view('pages/Login', $data);
	}
    public function seConnecter(){
        $nom_emp=$this->input->post("nom_emp");
        $motdepasse=$this->input->post("motdepasse");
		// var_dump([$nom_emp, $motdepasse]);
        $user=$this->login->checkLogin(trim($nom_emp), trim($motdepasse));
        if($user===false){
			$error="Nom_ou_mot_de_passe_errone";
            redirect(site_url("login/index/".$error));
        }
        $this->session->set_userdata('user', $user);

		redirect(site_url("besoinAchat"));
		
    }
}
