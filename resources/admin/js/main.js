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
	 // Uses this function to search submit
        function tableReload(){
            dataTableObj.draw();
        }

	 $("body").on("click",".delete-btn",function(e){
            e.preventDefault();
            var deleteUrl=$(this).data('deleteUrl');
            $('#delete-column').find(".delete-action").val(deleteUrl);
            $('#delete-column').modal('show');

        });


	$("body").on("click",".do-delete-btn",function(e){
	    e.preventDefault();
	    console.log("tj")
	    var dis=$(this);
	    var deleteUrl=dis.closest(".modal-content").find(".delete-action").val();
	    
	    
	    $.ajax({
	        url: deleteUrl,
	        type: 'post',
	        dataType: 'json',
	        
	    })
	    .done(function(data) {
	        if(data.notification_type==="success"){
	            showNotifyJs(data.notification_msg,data.notification_type);
	            $('#delete-column').modal('hide');
	            tableReload();
	        }else{
	            showNotifyJs(data.notification_msg,data.notification_type);
	            $('#delete-column').modal('hide');
	        }
	        console.log(data);
	    })
	    .fail(function(error) {
	        console.log(error);
	    });
	    
	});

 /*
 * For Search Button
 */
	$("#column_search").on("click",function(e){
	    e.preventDefault();

	    tableReload();
	});


 /*
 * For Chosen Js
 */
 $(".select").chosen();


// Uses this function to search submit
function tableReload(){
	dataTableObj.draw();
}
});