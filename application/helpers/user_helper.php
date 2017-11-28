<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('login_admin'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function login_admin($users_data=array())
    {
        //$email=isset($users_data['email']) ? $users_data['email'] : "";
        $user_name=isset($users_data['user_name']) ? $users_data['user_name'] : "";
        $pass=isset($users_data['pass']) ? $users_data['pass'] : "";
        $CI =& get_instance();
        $CI->load->helper('encrypt');
        $pass=encrypt_pass($pass);
        $query=$CI->db->get_where('users', array('user_name' => $user_name,'user_password' => $pass),1);
        if ($query->num_rows()) {
            $result=$query->row();
             $data['admin_user_id']=$result->user_id;
             $data['admin_user_name']=$result->user_name;
             $data['admin_logged_in']=true;
             $CI->session->set_userdata($data);
             return true;
         }else{
            return false;
         }
    }
}



if ( ! function_exists('login_user'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function login_user($users_data=array())
    {
        //$email=isset($users_data['email']) ? $users_data['email'] : "";
        $user_email=isset($users_data['user_email']) ? $users_data['user_email'] : "";
        $pass=isset($users_data['pass']) ? $users_data['pass'] : "";
        $CI =& get_instance();
        $CI->load->helper('encrypt');
        $pass=encrypt_pass($pass);
        $query=$CI->db->get_where('students', array('student_email' => $user_email,'student_password' => $pass),1);
        if ($query->num_rows()) {
            $result=$query->row();
             $data['user_id']=$result->student_id;
             $data['user_email']=$result->student_email;
             $data['user_name']=$result->student_name;
             $data['user_photo']=$result->student_photo;
             $data['user_logged_in']=true;
             $CI->session->set_userdata($data);
             return true;
         }else{
            return false;
         }
    }
}
if ( ! function_exists('check_admin_login'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function check_admin_login()
    {
        $CI =& get_instance();
        $class=$CI->router->class;
        $method=$CI->router->method;
        if($CI->session->userdata('admin_logged_in')){
            
            if($class==="login"){
                $CI->session->set_flashdata('notification_msg', lang('access_denied'));
                $CI->session->set_flashdata('notification_type', 'warning');
                redirect(site_url('scadmin/dashboard'));
                return true;
            }
            
        }else{
            if($class!=="login"){
                $CI->session->set_flashdata('notification_msg', lang('access_denied'));
                $CI->session->set_flashdata('notification_type', 'warning');
                redirect(site_url('scadmin/login'));
                return false;
            }
        }
    
    }
}
if ( ! function_exists('check_user_login'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function check_user_login()
    {
        $CI =& get_instance();
        $class=$CI->router->class;
        $method=$CI->router->method;
        if($CI->session->userdata('user_logged_in')){
            
            if($class==="students" && $method == "login"){
                $CI->session->set_flashdata('notification_msg', lang('access_denied'));
                $CI->session->set_flashdata('notification_type', 'warning');
                redirect(site_url());
                return true;
            }else if($class==="students" && $method == "register"){
                $CI->session->set_flashdata('notification_msg', lang('access_denied'));
                $CI->session->set_flashdata('notification_type', 'warning');
                redirect(site_url());
                return true;
            }
            
        }else{
            if($class=="students" && $method == "profile"){
                $CI->session->set_flashdata('notification_msg', lang('access_denied'));
                $CI->session->set_flashdata('notification_type', 'warning');
                redirect(site_url('students/login'));
                return false;
            }
        }
    
    }
}
if ( ! function_exists('user_logout'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function user_logout()
    {
        $CI =& get_instance();
         $CI->session->unset_userdata('user_id');
         $CI->session->unset_userdata('user_email');
         $CI->session->unset_userdata('user_name');
         $CI->session->unset_userdata('user_photo');
         $CI->session->unset_userdata('user_logged_in');
         //$CI->session->sess_destroy();
         return true;
         
    }
}
if ( ! function_exists('admin_logout'))
{
    /**
    * This Function is for Get User 
    * @param array $User Data for User Table
    * @return error/userId
    * @author Tj Thouhid
    * @version 2017-10-22
    */

    function admin_logout()
    {
        $CI =& get_instance();
         $CI->session->unset_userdata('admin_user_id');
         $CI->session->unset_userdata('admin_user_name');
         $CI->session->unset_userdata('admin_logged_in');
        
         //$CI->session->sess_destroy();
         return true;
         
    }
}