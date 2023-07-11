<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{
  /*public function get_info(){
    return array('auteur' => 'Rado Fanomezana',
                  'date' => '24/08/12',
                  'email' => 'email@ndd.fr');
  }

  public function getin_table($table){
    $query = "SELECT prenom,email,password,tel,img,est_admin FROM %s";
    $sql = sprintf($query,$table);
    $result = $this->db->query($sql);
    $table = array();
    $i = 0;
    foreach ($result->result_array() as $row) {
        $lists = array('prenom' => $row['prenom'],
                        'pwd' => $row['password'],
                        'email' => $row['email'],
                        'tel' => $row['tel'],
                        'img' => $row['img'],
                        'admin' => $row['est_admin']);
        $table[$i] = $lists;
        $i++;
    }
    return $table;
  }

  /*public function insertion($table,$ads,$nums,$ade,$numdrc,$ndir,$st,$dc,$de,$nidf,$dvse,$p){
      $query = "INSERT INTO %s (ads_siege,num_stat,ads_exploitation,num_reg_commerce,dirigeant,statut,creation,debut_exercice,identification_fiscale,devise,plan_comptable) values (%s,%s,%s,%d,%s,%s,%s,%s,%s,%d,%s)";
      $sql = sprintf($query,$table,$this->db->escape($ads),$this->db->escape($nums),$this->db->escape($ade),$numdrc,$this->db->escape($ndir),$this->db->escape($st),$this->db->escape($dc),$this->db->escape($de),$this->db->escape($nidf),$dvse,$this->db->escape($pc));
      $this->db->query($sql);
  }*/
/***Requete pour prendre dernier id inserer**/
  public function lastid(){
    $query = "SELECT last_insert_id()";
    $sql = sprintf($query);
    $result = $this->db->query($sql);
    $row = $result->row_array();
    return $row['last_insert_id()'];
  }
/***Selection avec view **/
  public function v_debit(){
      $this->db->select('*');
      $this->db->from('v_debit');
      $result = $this->db->get();
      $row = $result->row_array();
      return $row['total'];
  }
/***Requenet d'insertion dans n'importe table**/
  public function insertion($table,$data){
      $this->db->insert($table,$data);
  }
  public function modification($table,$id,$data){
      $this->db->where('id',$id);
      $this->db->update($table,$data);
  }

  public function supression($table,$id){
      $this->db->where('id',$id);
      $this->db->delete($table);
  }

  public function modificationplancomptable($table,$id,$data){
      $this->db->where('numero',$id);
      $this->db->update($table,$data);
  }

  public function supressionplancomptable($table,$id){
      $this->db->where('numero',$id);
      $this->db->delete($table);
  }
}