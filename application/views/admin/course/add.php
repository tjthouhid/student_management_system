<?php
$class_name="";

$course_name="";
$course_price="";

$url=site_url()."scadmin/course/insert_course";
$btn_text=lang('save');
if(isset($id)){
    if($datas){
        $course_name=$datas[0]->course_name;
        $course_price=$datas[0]->course_price;
        
        $url=site_url()."scadmin/course/update_course/".$id;
        $btn_text=lang('update');
    }else{
        $this->session->set_flashdata('notification_msg', lang("not_available"));
        $this->session->set_flashdata('notification_type', 'error');                 
        redirect(site_url('scadmin/course' ));
    }
}
?>
<div class="col-md-10"> <!-- Start of Main Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large maincontent">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $page_name;?></h1><!-- header test -->
                </div>
                <div class="panel-body"> <!-- Start of content Body -->
                    <form class="" action="<?php echo $url;?>" method="post" enctype="multipart/form-data" id="student-form">
                        <div class="form-group row">
                           <label for="course_name" class="col-sm-2 col-form-label"><?php echo lang("course")." ".lang("name");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="course_name" name="course_name" placeholder="<?php echo lang("course")." ".lang("name");?>" required="" value="<?php echo $course_name; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                           <label for="course_price" class="col-sm-2 col-form-label"><?php echo lang("price");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="course_price" name="course_price" placeholder="<?php echo lang("price");?>" required="" value="<?php echo $course_price; ?>">
                          </div>
                        </div>
                        
                       
						  
                         <div class="form-group row">
                         
						    <div class="col-sm-8">
						       <button type="submit" class="btn btn-primary"><?php echo $btn_text;?></button>
						    </div>
					     </div>
                       
                    </form>
                </div> <!-- End of content Body -->
            </div>
        </div>
    </div>
</div><!-- End of main container -->
