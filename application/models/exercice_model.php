<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class exercice_model extends CI_Model
{
    function insert_exercice($nom,$calories){
        $data=array(
            'nom'=>$nom,
            'calories_par_rep'=>$calories);
        $this->db->insert('exercices',$data);
    }
    function get_exercice(){
        $query= $this->db->query('Select * from exercices ');
        $data=array();
        foreach ($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
    }
    function delete_exercice($id){
        return $this->db->query(sprintf("delete from exercices where id = %d",$id));
    }
    function get_ExerciceInfo($id) {
        $request="Select * from exercices where id='%s'";
        $request=sprintf($request,$id);
        $query= $this->db->query($request);
        $result= $query->row_array();
        return $result;
    }
    public function modify_exercice($nom,$calories,$id)
    {
        $sql = "update exercices set  nom='$nom',calories_par_rep=$calories  where id=$id ";
        $sql = sprintf($sql,$nom,$calories,$id);
        $this->db->query($sql);
    }
}
