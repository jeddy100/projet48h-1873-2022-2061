<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accueil extends CI_Controller
{

  public function hello()
  {
    redirect(base_url('accueil/index'));
  }
    public function accueiladmin()
    {
        $this->load->view('acceuiladmin');
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
       // $this->session->set_userdata('sessionuser', $row);
       // $id_e = $row->id;
        $data['iduser'] = $row->id;
        $data['user']= $row->nom ;
        $data['taille'] = $row->taille;
        $data['poid'] = $row-> poid;
        $data['objectif']= $row->objectif;
           redirect('Accueil/accueiladmin');
      }
    }
    // echo count($data);
      redirect('Accueil/login');
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
    // $data = $this->db->query($sql,$id);
    // $query = $this->db->query($sql);
    $query = $this->db->query($sql);
    echo $sql;
    
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
    redirect(base_url('accueil/welcome'));
  }

  public function deconnect()
  {
    $this->session->unset_userdata('entreprise');
    $this->session->unset_userdata('compta');
    redirect(base_url('accueil/login'));
  }
    public function CreateRegime()
    {
        //load session library

        $this->load->view('formRegime');
    }
    public function insertRegime()
    {
        $data=array();
        $nom=$this->input->post('nom');
        $prix=$this->input->post('prix');
        $taux=$this->input->post('taux');
        $this->load->model('repas_model');
        $this->regime_model->insert_regime($nom,$prix,$taux);
        redirect('Accueil/getAllRegime');
    }
    public function getAllRegime(){
        //if($this->session->userdata('user')){
            $data=array();
            $this->load->model('repas_model');
            $data['regime'] = $this->regime_model->get_regime();
            $this->load->view('listeRegime',$data);
       // }
        //else{
         //   redirect('/');
       // }

    }
    public function deleteRegime($id){
        $this->load->model('repas_model');
        $this->regime_model->delete_regime($id);
        redirect('Accueil/getAllRegime');
        }
    public function ModifyRegime($id){
        //load session library
        //if($this->session->userdata('user')){
            $data=array();
            $this->load->model('repas_model');
            $data['regime'] = $this->regime_model->get_RegimeInfo($id);
            $this->load->view('modifierRegime',$data);
        /*}
        else{
            redirect('/');
        }*/
    }
    public function updateRegime()
    {
        $data=array();
        $nom=$this->input->post('nom');
        $prix=$this->input->post('prix');
        $taux=$this->input->post('taux');
        $id=$this->input->post('id');
        $this->load->model('repas_model');
        $this->regime_model->modify_regime($nom,$prix,$taux,$id);
        redirect('Accueil/getAllRegime');
    }
    public function CreateExercice()
    {
        //load session library

        $this->load->view('formExercice');
    }
    public function insertExercice()
    {
        $nom=$this->input->post('nom');
        $calories=$this->input->post('calories');
        $this->load->model('exercice_model');
        $this->exercice_model->insert_exercice($nom,$calories);
        redirect('Regime/activiteForm');
    }
    public function getAllExercices(){
        //if($this->session->userdata('user')){
        $data=array();
        $this->load->model('exercice_model');
        $data['exercice'] = $this->exercice_model->get_exercice();
        $this->load->view('listeExercice',$data);
        // }
        //else{
        //   redirect('/');
        // }

    }
    public function ModifyExercice($id){
        //load session library
        //if($this->session->userdata('user')){
        $data=array();
        $this->load->model('exercice_model');
        $data['exercice'] = $this->exercice_model->get_ExerciceInfo($id);
        $this->load->view('modification_activite',$data);
        /*}
        else{
            redirect('/');
        }*/
    }
    public function updateExercice()
    {
        $data=array();
        $nom=$this->input->post('nom');
        $calories=$this->input->post('calories');
        $id=$this->input->post('id');
        $this->load->model('exercice_model');
        $this->exercice_model->modify_exercice($nom,$calories,$id);
        redirect('Regime/activiteForm');
    }
    public function deleteExercice($id){
        $this->load->model('exercice_model');
        $this->exercice_model->delete_exercice($id);
        redirect('Regime/activiteForm');
    }
    public function CreateRepas()
    {
        //load session library
        $this->load->model('repas_model');
        $data['typerepas'] = $this->repas_model->get_typerepas();
        $this->load->view('formRepas',$data);
    }
    public function insertRepas()
    {
        $data = array();
        $nomrepas = $this->input->post('nomrepas');
        $caloriedonee = $this->input->post('caloriedonee');
        $typerepas = $this->input->post('typerepas');
        $pourcentage_viande= $this->input->post('pourcentage_viande');
        $pourcentage_poisson= $this->input->post('pourcentage_poisson');
        $this->load->model('repas_model');
        $this->repas_model->insert_repas($nomrepas, $typerepas, $caloriedonee,$pourcentage_poisson,$pourcentage_viande);
        redirect('Regime/regimeForm');

    }
    public function getAllRepas(){
        //if($this->session->userdata('user')){
        $data=array();
        $this->load->model('repas_model');
        $data['repas'] = $this->repas_model->get_repas();
        $this->load->view('listeRepas',$data);
        // }
        //else{
        //   redirect('/');
        // }

    }
    public function deleteRepas($id){
        $this->load->model('repas_model');
        $this->repas_model->delete_repas($id);
        redirect('Regime/regimeForm');
    }
    public function ModifyRepas($id){
        //load session library
        //if($this->session->userdata('user')){
        $data=array();
        $this->load->model('repas_model');
        $data['typerepas'] = $this->repas_model->get_typerepas();
        $data['repas'] = $this->repas_model->get_RepasInfo($id);
        $this->load->view('modification_regime',$data);
        /*}
        else{
            redirect('/');
        }*/
    }
    public function updateRepas()
    {
        $data = array();
        $nomrepas = $this->input->post('nomrepas');
        $caloriedonee = $this->input->post('caloriedonee');
        $typerepas = $this->input->post('typerepas');
        $pourcentage_viande= $this->input->post('pourcentage_viande');
        $idrepas=$this->input->post('idrepas');
        $pourcentage_poisson= $this->input->post('pourcentage_poisson');
        $this->load->model('repas_model');
        $this->repas_model->modify_repas($nomrepas, $typerepas, $caloriedonee,$pourcentage_poisson,$pourcentage_viande,$idrepas);
        redirect('Regime/regimeForm');
    }




}