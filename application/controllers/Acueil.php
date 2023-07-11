<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acueil extends CI_Controller
{

  public function hello()
  {
    redirect(base_url('acueil/index'));
  }

  public function formulaire()
  {
    $this->load->view('formulaire');
  }
  public function login()
  {
    $this->load->view('login');
  }
  public function getwhoisconnection($id){
    $sql = "SELECT * FROM user WHERE id = ?";
    $data = $this->db->query($sql,$id);
    $query = $this->db->query($sql);
    foreach ($query->result() as $row)
    {
            echo $row->nom;
            echo $row->mdp;
            // echo $row->body;
    }
    // echo $data[0]['nom'];
    return $data;
  }
  public function connectionuser()
  {
    $this->load->model('news_model');
    $table = "user";
    $sql = "SELECT * FROM user ";
    $query = $this->db->query($sql);
    $data = array();
    // $i=0;
    foreach ($query->result() as $row){
      if ($this->input->post('nom') == $row->nom && $this->input->post('mdp') == $row->mdp) {
        $this->session->set_userdata('idsession',$row->id);
        // $id_e = $row->id;
        $data['uti']['iduser'] = $row->id;
        $data['uti']['user']= $row->nom ;
        $data['uti']['taille'] = $row->taille;
        $data['uti']['poid'] = $row-> poid;
        $data['uti']['objectif']= $row->objectif;
      }
    }
    $data['regime'] = $this->getregime($data['uti']['objectif']);
    $data['sport'] = $this->getlistesport();
    // $this->load->view('acceuilclient',$data);
  }
  public function loginadmin(){
    $this->load->view('loginadmin.php');
  }
  public function connectionadmin()
  {
    $sql = "SELECT * FROM admin ";
    $query = $this->db->query($sql);
    // $tab =  $this->getizadaolynycodeattente();
    $data = array();
    foreach ($query->result() as $row){
      if ($this->input->post('nom') == $row->nom && $this->input->post('mdp') == $row->mdp) {
        $data['nom'] = $row->nom;
        $data['mdp'] = $row->mdp;
        
        $data['donner'] = $this->getizadaolynycodeattente();
        // $data['nom'] = $this->$data['donner'][];
        // echo $data['donner'][0]['iduser'];
      $this->load->view('acceuiladmin',$data);
      }
    }
    // echo 'cette utilisateur n est pas dans la liste';
  }
  public function getname($id){
    $sql = "SELECT nom FROM user where id=$id";
    $query = $this->db->query($sql);
    $nom=nul;
    foreach ($query->result() as $row){
      $nom = $row->nom;
    }
    return $nom;
  }
  public function regimeasuivre(){
    $name = $this->input->post('nomregime') ;
    $name = $this->input->post('nomsport') ;
    $name = $this->input->post('kilo') ;
  }
  public function insertuser(){
    $name = $this->input->post('nom') ;
    $email = $this->input->post('mail');
    $mdp = $this->input->post('mdp');
    $genre = $this->input->post('genre');
    $taille = $this->input->post('taille');
    $poids = $this->input->post('poids');
    $objectif = $this->input->post('objectif');
    $sql = "INSERT INTO user(nom,mdp,mail,genre,taille,poid,objectif) values ('$name','$mdp','$email','$genre',$taille,$poids,'$objectif')";
    // echo $sql;
    $this->db->query($sql);
    
  }
  public function getregime($objectif){
    $sql = "SELECT * FROM regime where objectif='$objectif'";
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
  public function getleregime($nom){
    $sql = "SELECT * FROM regime where nom='$nom'";
    $query = $this->db->query($sql);
    $data = array();
    // $i=0;
    foreach ($query->result() as $row){
        $data['id'] = $row->id;
        $data['nom']= $row->nom;
        $data['prix'] = $row->prix;
        $data['tauxdefficacite'] = $row->tauxdefficacite;
        $data['objectif']= $row->objectif;

    }
    return $data;
  }
  public function getlesport($nom){
    $sql = "SELECT * FROM sport where nom='$nom'";
    $query = $this->db->query($sql);
    $data = array();
    // $i=0;
    foreach ($query->result() as $row){
      $data['id'] = $row->id;
      $data['nom']= $row->nom;
      $data['tauxdefficacite'] = $row->tauxdefficacite;
    }
    return $data;
  }

  public function validerleregime(){
    $name = $this->input->post('nomregime');
    $email = $this->input->post('nomsport');
    $mdp = $this->input->post('kilo');
    $data['regime'] = $this->getleregime($name);
    $data['sport'] = $this ->getlesport($email);
    $data['kilo'] = $mdp;
    $this->load->view('regimeasuivre.php',$data);  
  }
  public function tableauregime(){
    $data = array();
    $objectif = 'manena';
    $data['regime']=$this->getregime($objectif);
    $data['sport']=$this->getlistesport();
    $this->load->view('tableauregime.php',$data);    
  }
  public function Validation(){
    $id = $this->input->post('id');
    $chiffre = $this->input->post('chiffre');
    // echo $id;
    // echo $chiffre;
    $sql = "INSERT INTO codeenattente values($id,$chiffre)";
    // echo $sql;
    $this->db->query($sql);
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
  public function codeaccepter(){
    $id = $this->input->get('id');
    $code = $this->input->get('code');
    $sql="delete from codeenattente where iduser=$id and code=$code";
    echo $sql;
    $this->db->query($sql);
  }
  public function addcode(){
    $this->load->view('addcode.php');
  }
  public function acceuil()
  {
    $this->load->view('acceuil.php');
  }
  public function inscriptionuser()
  {
    $this->load->view('inscription');
  }
  public function deletesession()
  {
    $this->session->unset_userdata('choice');
    redirect(base_url('acueil/welcome'));
  }

  public function deconnect()
  {
    $this->session->unset_userdata('entreprise');
    $this->session->unset_userdata('compta');
    redirect(base_url('acueil/login'));
  }
  public function insertregime()
  {
    $this->load->view('ajouterRegime.php');
  }
}