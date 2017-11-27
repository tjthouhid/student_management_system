<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generate_action_button'))
{
    function generate_action_button($class="",$primary_id="",$view=false)
    {
        $str="";
        $str.="<div class='action-btns'>";

        if($view){
           $str.='<a href="'.site_url().$class.'/view/'.$primary_id.'" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>'; 
        }
        $str.='<a href="'.site_url().$class.'/edit/'.$primary_id.'" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
        $str.='<a href="javascript:void(0);" data-delete-url="'.site_url().$class.'/delete/'.$primary_id.'" class="delete-btn btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';

    	$str.="</div>";
    	return $str;
    	
       
    }   
     
}
