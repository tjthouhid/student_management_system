function showNotifyJs(error_msg,type){

			$.notify(
			  error_msg, 
		
			  {
			  	position:"top right",
			  	autoHide: true,
			  	// if autoHide, hide after milliseconds
			  	autoHideDelay: 5000,
			  	className: type
			  }
			  

			 );
}

jQuery(function($){


	function readURL(input,$sleletor) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	        console.log(e.target.result)                 
	           $sleletor.closest('.form-group').find(".img-show").html("<img width='120px' height='120px' src='"+e.target.result+"'>");
	           
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$("#student_photo").change(function(){
	    readURL(this,$(this));
	});
	$("select").chosen();
	var studentForm=$("#student-form");
    studentForm.validate({
        rules: {
           student_name: {
             required: true
           },
           student_email: {
             required: true,
             email: true,
             remote: {
                    url: site_url+"students/checkEmail",
                    type: "post"
                 }
           },
           student_mobile: {
             required: true,
             number: true
           },
           student_address: {
             required: true
           },
           course_id: {
             required: true
           },
           student_password: {
                 required: true
            }
       },
       messages: {
               student_email: {
               	remote:"This Email Already Registered."
               }
           },
      submitHandler: function(form) {
        // some other code
        // maybe disabling submit button
        // then:
        form.submit();
      }
     });
		
});