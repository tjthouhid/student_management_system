<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_students extends CI_Model {
 
    var $table = 'students';

 
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
       * @version 2017-11-26
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
           * @version 2017-11-26
           */
           public function get_total_records($table_name,$pm_col) {
        
             $this->db->select($pm_col);
             $this->db->from($table_name);
             $this->db->where("student_deleted", 0);
            

             return (int) ($this->db->count_all_results());
           }



       
       /**
       * ---This Function is for Getting Data For Classes table
       *  
       * @return int Number total filtered row
       * @author Tj Thouhid
       * @version 2017-11-26
       */
       function get_student_list_datatable(array $params)
       {
           $offset =$params['offset'];
           $length =$params['length'];
           $search =$params['search'];
           $sortings =$params['sortings'];
           $sortings_columns =$params['sortings_columns'];
           $advance_searches =$params['advance_searches'];


           $this->db->select('SQL_CALC_FOUND_ROWS st.student_id, st.student_id, st.student_name,st.student_birthdate,st.student_gender', false);
           $this->db->from($this->table.' st'); 
            $this->db->where("st.student_deleted", 0);

           if($advance_searches['student_name']!=""){
             $this->db->like("st.student_name", $advance_searches['student_name']);
           }

           if($advance_searches['student_gender']!=""){
             $this->db->like("st.student_gender", $advance_searches['student_gender']);
           }

           


           // Conditions 
           //$this->db->where('st.deleted', 0);  

           
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
               'recordsTotal' =>$this->get_total_records($this->table,"student_id"),
           );
       }
       /**
         * ---This Function is for Inserting Data For students table
         *  
         * @param array students table data
         * @return boolean true/false
         * @author Tj Thouhid
         * @version 2017-11-26
         */
      function save_student_info($postedData,$image_name){
          $student_inserted = date('Y-m-d h:i:s');
          $attr = array(
                'student_name' => $postedData['student_name'],
                'student_birthdate' => $postedData['student_birthdate'],
                'student_gender' => $postedData['student_gender'],
                'student_address' => $postedData['student_address'],
                'student_phone' => $postedData['student_phone'],
                'student_email' => $postedData['student_email'],
                'student_password' => $postedData['student_password'],
                'student_bloodGroup' => $postedData['student_bloodGroup'],
                'student_fatherName' => $postedData['student_fatherName'],
                'student_motherName' => $postedData['student_motherName'],
                'student_inserted' => $student_inserted,
                'student_updated' => $student_inserted
              );
          if($image_name!==""){
            $attr['student_photo']=$image_name;
          }
          $query= $this->db->insert($this->table,$attr);
         if($query){
          return true;  
         }else{
          return false;
        }
     }
     function delete_data($id)
     {
       
       $result=$this->db->update($this->table,array('student_deleted'=>1),array('student_id' =>$id));
       if($result){
          return true;
        }else{
          return false;
        }
     }
     /**
   * ---This Function is for Getting Data For Single Student
   *  
   * @param array class table data
   * @return boolean true/false
   * @author Tj Thouhid
   * @version 2017-11-27
   */
  function get_data($id){
    $this->db->select('*');
    $this->db->where("student_id",$id);
    $this->db->limit(1);
    $result = $this->db->get($this->table);
     if ($result->num_rows()>0) {
      return $result->result();
     }else{
      return false;
     }

  }
  /**
   * ---This Function is for Updating Data For Students table
   *  
   * @param array Student table data
   * @return boolean true/false
   * @author Tj Thouhid
   * @version 2017-11-27
   */
  function update_data($postedData,$primary_key,$image_name)
  {
      $updated = date('Y-m-d h:i:s');
      $attr = array(
              'student_name' => $postedData['student_name'],
              'student_birthdate' => $postedData['student_birthdate'],
              'student_gender' => $postedData['student_gender'],
              'student_address' => $postedData['student_address'],
              'student_phone' => $postedData['student_phone'],
              'student_email' => $postedData['student_email'],
              'student_password' => $postedData['student_password'],
              'student_bloodGroup' => $postedData['student_bloodGroup'],
              'student_fatherName' => $postedData['student_fatherName'],
              'student_motherName' => $postedData['student_motherName'],
              'student_updated' => $updated
          );
      if($image_name!==""){
        $attr['student_photo']=$image_name;
      }

      $this->db->where('student_id',$primary_key);
      $this->db->update($this->table,$attr);
       if( $this->db->affected_rows() )
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
  }
}