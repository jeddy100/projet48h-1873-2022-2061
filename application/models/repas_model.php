<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class repas_model extends CI_Model
{
    function insert_repas($nomrepas,$typerepas,$caloriedonee,$pourcentage_poisson,$pourcentage_viande){
        $data=array(
            'nomrepas'=>$nomrepas,
            'typerepas'=>$typerepas,
            'caloriedonee'=>$caloriedonee,
            'pourcentage_poisson'=>$pourcentage_poisson,
            'pourcentage_viande'=>$pourcentage_viande,

        );
        $this->db->insert('repas',$data);
    }
    function get_repas(){
        $query= $this->db->query('Select * from repas ');
        $data=array();
        foreach ($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
    }
    function get_typerepas(){
        $query= $this->db->query('Select * from typerepas ');
        $data=array();
        foreach ($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
    }
    function delete_repas($id){
        return $this->db->query(sprintf("delete from repas where idrepas = %d",$id));
    }
    function get_RepasInfo($id) {
        $request="Select * from repas where idrepas='%s'";
        $request=sprintf($request,$id);
        $query= $this->db->query($request);
        $result= $query->row_array();
        return $result;
    }
    public function modify_repas($nomrepas, $typerepas, $caloriedonee,$pourcentage_poisson,$pourcentage_viande,$idrepas)
    {
        $sql = "update repas set  nomrepas='$nomrepas',typerepas=$typerepas,caloriedonee=$caloriedonee,pourcentage_poisson=$pourcentage_poisson,pourcentage_viande=$pourcentage_viande where idrepas=$idrepas ";
        $this->db->query($sql);
    }
}
