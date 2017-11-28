jQuery(function($){
 var form=$("#login-form");
        form.validate({
            rules: {
               user_name: {
                 required: true
               },
               user_pass: {
                     required: true
                }
           },
           messages: {
                   user_name: validate_user_name,
                   user_pass: validate_password
                   
            },
          submitHandler: function(form) {
            // some other code
            // maybe disabling submit button
            // then:
            form.submit();
          }
         });
	
});