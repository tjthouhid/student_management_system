<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_dashboard extends CI_Model {
 
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
             //$this->db->where("student_deleted", 0);
            

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


           $this->db->select('SQL_CALC_FOUND_ROWS st.student_id,st.student_id, st.student_name,st.student_address,st.student_email,st.student_mobile,st.student_nid,cs.course_name,cs.course_price', false);
           $this->db->from('students st'); 
           $this->db->join('students_courses sc', 'sc.student_id = st.student_id');
           $this->db->join('courses cs', 'cs.course_id = sc.course_id');
            


           


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
               'recordsTotal' =>$this->get_total_records("students","student_id"),
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
      function save_pay($postedData){
          
          $query= $this->db->insert("students_payments",$postedData);
         if($query){
          return true;  
         }else{
          return false;
        }
     }
     function delete_data($id)
     {
       
       $result=$this->db->delete("courses",array('course_id' =>$id));
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
    $this->db->where("course_id",$id);
    $this->db->limit(1);
    $result = $this->db->get("courses");
     if ($result->num_rows()>0) {
      return $result->result();
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
  function get_student_data($id){
    $this->db->select('*');
    $this->db->where("student_id",$id);
    $this->db->limit(1);
    $result = $this->db->get("students");
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
  function update_data($postedData,$primary_key)
  {
      

      $this->db->where('course_id',$primary_key);
      $this->db->update("courses",$postedData);
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