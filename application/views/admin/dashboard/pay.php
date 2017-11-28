<?php
$class_name="";

$student_payment_amount="";
$student_payment_date="";

$url=site_url()."scadmin/dashboard/insert_pay/".$id;
$btn_text=lang('save');

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
                             <input type="text" class="form-control" id="student_name" name="student_name" placeholder="<?php echo lang("course")." ".lang("name");?>" readonly="" desabled value="<?php echo $student_data[0]->student_name;; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                           <label for="student_payment_amount" class="col-sm-2 col-form-label"><?php echo lang("pay");?></label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="student_payment_amount" name="student_payment_amount" placeholder="<?php echo lang("pay");?>" required="" value="<?php echo $student_payment_amount; ?>">
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
