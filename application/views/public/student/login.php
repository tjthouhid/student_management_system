<div class="container">
	<div class="student-register-form">
		<h2 class="form-title"><?php echo $page_name;?></h2>
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo site_url('students/login');?>" method="post" id="student-login-form" enctype="multipart/form-data">
				  
				  <div class="form-group">
				    <label for="student_email"><?php echo lang('student')." ".lang('email');?></label>
				    <input type="text" class="form-control" id="student_email" name="student_email" placeholder="<?php echo lang('student')." ".lang('email');?>" required>
				  </div>
				  

				  <div class="form-group">
				    <label for="student_password"><?php echo lang('student')." ".lang('password');?></label>
				    <input type="password" class="form-control" id="student_password" name="student_password" placeholder="<?php echo lang('student')." ".lang('password');?>" required>
				  </div>
				  
				  <button type="submit" class="btn btn-primary"><?php echo lang('login');?></button>
				</form>
			</div>
		</div>
	</div>
</div>