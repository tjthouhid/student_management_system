<div class="container">
	<div class="student-register-form">
		<h2 class="form-title"><?php echo $page_name;?></h2>
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo site_url('students/insert_student');?>" method="post" id="student-form" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="student_name"><?php echo lang('student')." ".lang('name');?></label>
				    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="<?php echo lang('student')." ".lang('name');?>">
				  </div>
				  <div class="form-group">
				    <label for="student_email"><?php echo lang('student')." ".lang('email');?></label>
				    <input type="text" class="form-control" id="student_email" name="student_email" placeholder="<?php echo lang('student')." ".lang('email');?>">
				  </div>
				  <div class="form-group">
				    <label for="student_mobile"><?php echo lang('student')." ".lang('phone');?></label>
				    <input type="text" class="form-control" id="student_mobile" name="student_mobile" placeholder="<?php echo lang('student')." ".lang('phone');?>">
				  </div>
				  <div class="form-group">
				    <label for="student_address"><?php echo lang('student')." ".lang('address');?></label>
				    <input type="text" class="form-control" id="student_address" name="student_address" placeholder="<?php echo lang('student')." ".lang('address');?>">
				  </div>
				  <div class="form-group">
				    <label for="student_nid"><?php echo lang('student')." ".lang('nid');?></label>
				    <input type="text" class="form-control" id="student_nid" name="student_nid" placeholder="<?php echo lang('student')." ".lang('nid');?>">
				  </div>
				  <div class="form-group">
				    <label for="course_id"><?php echo lang('course')." ".lang('list');?></label>
				    <select data-placeholder="<?php echo lang('choose')." ".lang('course');?>" class="form-control" id="course_id" name="course_id">
				    	<option></option>
				    	<?php foreach ($course_lists as $course_list): ?> 
				    		<option value="<?php echo $course_list->course_id;?>"><?php echo $course_list->course_name;?></option>
				    	
				    	<?php endforeach;?>
				    </select>
				   
				  </div>
				  <div class="form-group">
				    <label for="student_photo"><?php echo lang('student')." ".lang('photo');?></label>
				    <input type="file" class="form-control" id="student_photo" name="student_photo" placeholder="<?php echo lang('student')." ".lang('photo');?>">
				    <p class="help-block"><?php echo lang('student')." ".lang('photo');?></p>
				    <div class="img-show"></div>
				  </div>

				  <div class="form-group">
				    <label for="student_password"><?php echo lang('student')." ".lang('password');?></label>
				    <input type="password" class="form-control" id="student_password" name="student_password" placeholder="<?php echo lang('student')." ".lang('password');?>">
				  </div>
				  
				  <button type="submit" class="btn btn-primary"><?php echo lang('register');?></button>
				</form>
			</div>
		</div>
	</div>
</div>