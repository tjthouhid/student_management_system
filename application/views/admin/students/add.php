<?php
$class_name="";

$student_name="";
$student_birthdate="";
$student_gender="";
$student_address="";
$student_phone="";
$student_email="";
$student_password="";
$student_photo="";
$student_bloodGroup="";
$student_fatherName="";
$student_motherName="";
$img = "";
$url=site_url()."scadmin/students/insert_student";
$btn_text=lang('save');
if(isset($id)){
    if($datas){
        $student_name=$datas[0]->student_name;
        $student_birthdate=$datas[0]->student_birthdate;
        $student_gender=$datas[0]->student_gender;
        $student_address=$datas[0]->student_address;
        $student_phone=$datas[0]->student_phone;
        $student_email=$datas[0]->student_email;
        $student_password=$datas[0]->student_password;
        $student_photo=$datas[0]->student_photo;
        if ($student_photo!=="") {
          $img = "uploads/students/".$student_photo;
        }else{
          $img = "";
        }
        $student_bloodGroup=$datas[0]->student_bloodGroup;
        $student_fatherName=$datas[0]->student_fatherName;
        $student_motherName=$datas[0]->student_motherName;
        $url=site_url()."scadmin/students/update_student/".$id;
        $btn_text=lang('update');
    }else{
        $this->session->set_flashdata('notification_msg', lang("not_available"));
        $this->session->set_flashdata('notification_type', 'error');                 
        redirect(site_url('scadmin/students' ));
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
                           <label for="student_name" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("name");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="student_name" name="student_name" placeholder="<?php echo lang("student")." ".lang("name");?>" required="" value="<?php echo $student_name; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                           <label for="student_birthdate" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("birthdate");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="student_birthdate" name="student_birthdate" placeholder="<?php echo lang("student")." ".lang("birthdate");?>" required="" value="<?php echo $student_birthdate; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
						      <label class="col-sm-2"><?php echo lang("student")." ".lang("gender");?></label>
						      <div class="col-sm-8">
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="student_gender" value="<?php echo lang("male");?>" <?php if($student_gender=="male"):?>checked<?php endif;?>>
						            <?php echo lang("male");?>
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" <?php if($student_gender=="female"):?>checked<?php endif;?> name="student_gender" value="<?php echo lang("female");?>">
						            <?php echo lang("female");?>
						          </label>
						        </div>
						      </div>
						  </div>
						  <div class="form-group row">
                           <label for="student_address" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("address");?></label>
                           <div class="col-sm-8">
                             <textarea id="student_address" name="student_address" class="form-control" rows="5" placeholder="<?php echo lang("student")." ".lang("address");?>"><?php echo $student_address; ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                           <label for="student_phone" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("phone");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="student_phone" name="student_phone" placeholder="<?php echo lang("student")." ".lang("phone");?>" required="" value="<?php echo $student_phone; ?>">
                          </div>
                        </div>

                         <div class="form-group row">
                           <label for="student_email" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("email");?></label>
                           <div class="col-sm-8">
                             <input type="email" class="form-control" id="student_email" name="student_email" placeholder="<?php echo lang("student")." ".lang("email");?>" required="" value="<?php echo $student_email; ?>">
                          </div>
                        </div>

                         <div class="form-group row">
                           <label for="student_password" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("password");?></label>
                           <div class="col-sm-8">
                             <input type="password" class="form-control" id="student_password" name="student_password" placeholder="<?php echo lang("student")." ".lang("password");?>" required="" value="<?php echo $student_password; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                           <label for="student_photo" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("photo");?></label>
                           <div class="col-sm-8">
                             <input type="file" class="form-control" id="student_photo" name="student_photo"> 
                            <img src="<?php echo site_url().$img; ?>" id="student-profile-img" width="200px" />

                          </div>
                        </div>

                        <div class="form-group row">
                           <label for="student_bloodGroup" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("bloodgroup");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="student_bloodGroup" name="student_bloodGroup" placeholder="<?php echo lang("student")." ".lang("bloodgroup");?>" required="" value="<?php echo $student_bloodGroup; ?>">
                          </div>
                        </div>

                         <div class="form-group row">
                           <label for="student_fatherName" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("fathername");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="student_fatherName" name="student_fatherName" placeholder="<?php echo lang("student")." ".lang("fathername");?>" required="" value="<?php echo $student_fatherName; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                           <label for="student_motherName" class="col-sm-2 col-form-label"><?php echo lang("student")." ".lang("mothername");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="student_motherName" name="student_motherName" placeholder="<?php echo lang("student")." ".lang("mothername");?>" required="" value="<?php echo $student_motherName; ?>">
                          </div>
                        </div>

                         <div class="form-group row">
                         <!-- 	<div class="col-sm-2"></div> -->
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
<script type="text/javascript" src="<?php echo site_url().$options['admin_resource'];?>js/pages/students.js"></script>