<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

     public function acceuiladmin() {
        // $this->load->view('acceuiadmin');
        $this->load->view('acceuiladmin');
    }
     public function regimeForm() {
         $this->load->model('repas_model');
         $data=array();
         $data['repas'] = $this->repas_model->get_repas();
         $data['typerepas'] = $this->repas_model->get_typerepas();
        $this->load->view('insertion_regime',$data);
    }

    public function activiteForm() {
        $data=array();
        $this->load->model('exercice_model');
        $data['exercice'] = $this->exercice_model->get_exercice();
        $this->load->view('insertion_activite',$data);
    }

    public function regimeEdit() {
        $this->load->view('modification_regime');
    }

    public function activiteEdit() {
        $this->load->view('modification_regime');
    }

	public function chart() {
        $data['sport'] = $this->getlistesport();
        $data['regime'] = $this->getlisteregime();
        $this->load->view('acceuilclient',$data);
    }

	public function chartData() {
        $this->load->view('inc/chartjs');
    }

	public function login() {
        $this->load->view('login');
    }

	public function inscription() {
        // echo 'jean';
        $this->load->view('inscription');
    }

    public function connectionuser()
  {
    $sql = "SELECT * FROM user ";
    $query = $this->db->query($sql);
    $data = array();
    foreach ($query->result() as $row){
      if ($this->input->post('nom') == $row->nom && $this->input->post('mdp') == $row->mdp) {
        // $this->session->set_userdata('idsession',$row->id);
        // $id_e = $row->id;
        $data['id'] = $row->id;
        $data['nom']= $row->nom ;
        $data['taille'] = $row->taille;
        $data['poid'] = $row-> poid;
        $data['objectif']= $row->objectif;
      }
    }
    $data['regime'] = $this->getlisteregime();
    $data['sport'] = $this->getlistesport();
    // echo count($data['regime']);
    // echo count($data['sport']);
    // echo $data['nom'];
    $this->load->view('acceuilclient',$data);
  }
	public function details() {
        // echo 'jena';
        $data =array();
        $data['nom'] = $this->input->post('nom') ;
        $data['mail'] = $this->input->post('mail');
        $data['mdp'] = $this->input->post('mdp') ;
        $data['genre'] = $this->input->post('genre');
        $this->load->view('details',$data);
    }
    public function inscriptionun()
  {
    $data =array();
    $nom = $this->input->post('nom') ;
    $mail = $this->input->post('mail');
    $mdp = $this->input->post('mdp') ;
    $genre = $this->input->post('genre');
    $poid = $this->input->post('height');
    $taille = $this->input->post('Weight');
    $objectif = 'ngeza';
    // Echo $mail;
    $id = '5';
    $sql = "INSERT INTO user(nom,mdp,mail,genre,taille,poid,objectif) values ('$nom','$mdp','$mail','$genre',$taille,$poid,'$objectif')";
    // echo $sql;
    $this->db->query($sql);
    $this->session->set_userdata('idsession',$id);
    // $this->load->view('d',$data);
  }
  public function getlisteregime(){
    $sql = "SELECT * FROM regime ";
    $query = $this->db->query($sql);
    $data = array();
    $i=0;
    foreach ($query->result() as $row){
        // $this->session->set_userdata('sessionuser', $row);
        // $id_e = $row->id;
        $data[$i]['id'] = $row->id;
        $data[$i]['nom']= $row->nom;
        $data[$i]['prix'] = $row->prix;
        $data[$i]['tauxdefficacite'] = $row->tauxdefficacite;
        $data[$i]['objectif']= $row->objectif;
        $i = $i+1;
      
    }
    return $data;
  }
  public function getlistesport(){
    $sql = "SELECT * FROM sport";
    $query = $this->db->query($sql);
    $data = array();
    $i=0;
    foreach ($query->result() as $row){
        $data[$i]['id'] = $row->id;
        $data[$i]['nom']= $row->nom;
        $data[$i]['tauxdefficacite'] = $row->tauxdefficacite;
        $i = $i+1;
    }
    return $data;
  }
  public function insereruncode() {
    $code 
    = $this->input->post('code') ;
    $id = $this->input->post('iduser') ;
    // $nom =$this ->
    $sql = "insert into codeenattente values($code,$id) ";
    echo $sql;
    // $query = $this->db->query($sql);
    // $this->load->view('modification_regime');
    }
    public function getizadaolynycodeattente(){
        $sql = "SELECT * FROM codeenattente";
        $query = $this->db->query($sql);
        $data = array();
        $i=0;
        foreach ($query->result() as $row){
          $data[$i]['iduser'] = $row->iduser;
          $data[$i]['code']= $row->code;
          $i = $i+1;
          // $data['tauxdefficacite'] = $row->tauxdefficacite;
        }
        return $data;
      }
}
