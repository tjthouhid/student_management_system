<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_classes extends CI_Model {
 
    var $table = 'classes';

 
    public function __construct()
    {
        parent::__construct();
        parent::__construct($this->table);

    }

    

    /**
       * Get number total filtered row
       *  
       * @return int Number total filtered row
       * @author Tj Thouhid
       * @version 2017-11-24
       */
       private function _get_number_of_filtered_result(){

           $query =$this->db->query("SELECT FOUND_ROWS() as totalRows");
           $row = $query->row();
           
           $result =(int) (isset($row)? $row->totalRows : 0); 
           return $result;
       }

       /**
           * Get Number total row 
           * 
           * @return int Number total row
           * @author Tj Thouhid
           * @version 2017-11-24
           */
           public function get_total_records($table_name,$pm_col) {
        
             $this->db->select($pm_col);
             $this->db->from($table_name);
             //$this->db->where("deleted", 0);

             return (int) ($this->db->count_all_results());
           }



       
       /**
       * ---This Function is for Getting Data For Classes table
       *  
       * @return int Number total filtered row
       * @author Tj Thouhid
       * @version 2017-11-24
       */
       function get_class_list_datatable(array $params)
       {
           $offset =$params['offset'];
           $length =$params['length'];
           $search =$params['search'];
           $sortings =$params['sortings'];
           $sortings_columns =$params['sortings_columns'];
           $advance_searches =$params['advance_searches'];


           $this->db->select('SQL_CALC_FOUND_ROWS cl.class_id, cl.class_id, cl.class_title', false);
           $this->db->from($this->table.' cl');  

           if($advance_searches['class_title']!=""){
             $this->db->like("cl.class_title", $advance_searches['class_title']);
           }

           


           // Conditions 
           //$this->db->where('cl.deleted', 0);  

           
           // Sortings
           foreach($sortings as $sorting){ 

               $this->db->order_by($sortings_columns[$sorting['column']], $sorting['dir']);
           }

           // Limit
           if($length != "-1"){
               $this->db->limit($length, $offset);
           }

           $query = $this->db->get();
           // echo $this->db->last_query(); exit;
           $data =$query->result();


           return array(
               'data' =>$data,
               'recordsFiltered' =>$this->_get_number_of_filtered_result(),
               'recordsTotal' =>$this->get_total_records($this->table,"class_id"),
           );
       }



  /**
   * ---This Function is for Deleting class
   *  
   * @param int delete_id value of primary index
   * @return boolean true/false
   * @author Tj Thouhid
   * @version 2017-11-24
   */
  function delete_data($delete_id){
    
    $this->db->where('class_id', $delete_id);
    $result=$this->db->delete($this->table);
    if($result){
      return true;
    }else{
      return false;
    }
  }


  /**
   * ---This Function is for Inserting Data For Classes table
   *  
   * @param array class table data
   * @return boolean true/false
   * @author Tj Thouhid
   * @version 2017-11-24
   */
  function insert_data($data){
    
    $result=$this->db->insert($this->table,$data);
    
    if($result){
      return true;
    }else{
      return false;
    }
  }
  /**
   * ---This Function is for Updating Data For Classes table
   *  
   * @param array class table data
   * @return boolean true/false
   * @author Tj Thouhid
   * @version 2017-11-24
   */
  function update_data($data,$pk){
    
    $result=$this->db->update($this->table,$data,array('class_id' =>$pk));
    
    if($result){
      return true;
    }else{
      return false;
    }
  }

  /**
   * ---This Function is for Getting Data For Single Class
   *  
   * @param array class table data
   * @return boolean true/false
   * @author Tj Thouhid
   * @version 2017-11-24
   */
  function get_data($id){
    $this->db->select('*');
    $this->db->where("class_id",$id);
    $this->db->limit(1);
    $result = $this->db->get($this->table);
     if ($result->num_rows()>0) {
      return $result->result();
     }else{
      return false;
     }

  }

}


       


    
    
 


  
  
 
  
 
}