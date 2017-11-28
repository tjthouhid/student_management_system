<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $options['title'];?> - <?php echo $page_name;?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <link rel="stylesheet" href="<?php echo site_url().$options['admin_resource'];?>css/normalize.css"> -->
         <!-- Custom Fonts -->
        <link rel="stylesheet" href="<?php echo site_url().$options['admin_resource'];?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo site_url().$options['admin_resource'];?>css/bootstrap.min.css">
         <!-- choosen css -->
        <link href="<?php echo site_url().$options['admin_resource'];?>css/chosen.min.css" rel="stylesheet">        <!-- data table css -->
        <link href="<?php echo site_url().$options['admin_resource'];?>css/jquery.dataTables.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="<?php echo site_url().$options['admin_resource'];?>css/admin.css">
        <!-- <link rel="stylesheet" href="<?php echo site_url().$options['admin_resource'];?>css/responsive.css"> -->

        <!-- Mordenizer js -->
       <!--  <script src="<?php echo site_url().$options['admin_resource'];?>js/vendor/modernizr-2.8.3.min.js"></script> -->
        
        <!-- Jquery -->
        <script src="<?php echo site_url().$options['admin_resource'];?>js/jquery.js"></script>
        <script type="text/javascript">
          var site_url="<?php echo site_url();?>";
        </script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    



    <section id="page-content" class="login-container">
      <div class="container-fluid">
          <div class="row margin_row">
            

			
			<div class="col-md-12"> <!-- Start of Main Container -->
			    <div class="row">
			        <div class="col-md-12">
			            <div class="content-box-large maincontent">
			                <div class="panel-heading ">
			                    <h1 class="text-center"><?php echo $page_name;?></h1><!-- header test -->
			                </div>
			                <div class="panel-body"> <!-- Start of content Body -->
			                    <form action="<?php echo site_url('scadmin/login');?>" method="post" id="login-form">
			                    	<div class="form-group">
			                    	    <label for="user_name"><?php echo lang("user_name");?></label>
			                    	    <input type="text" class="form-control" id="user_name" placeholder="User Name" name="user_name" required="">
			                    	 </div>
			                    	<div class="form-group">
			                    	    <label for="user_pass"><?php echo lang("password");?></label>
			                    	    <input type="password" class="form-control" id="user_pass" placeholder="Password" name="user_pass" required="">
			                    	 </div>
			                    	 <button type="submit" class="btn btn-success"><?php echo lang("login");?></button>
			                    </form>
			                </div> <!-- End of content Body -->
			            </div>
			        </div>
			    </div>
			</div><!-- End of main container -->



      </div>
      </div>
</section>


<!-- <br>
<br>
<br>
    <footer>

    <div class="container-fluid">
            <div class="row margin_row">
                <nav class="navbar navbar-default navbar-fixed-bottom">
                  <div class="container text-center">
                     <p class="navbar-text">&copy;2016 Copyright Text</p>
                  </div>
                </nav>
            </div>      
    </div>

    </footer> -->
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       
    <script src="<?php echo site_url().$options['admin_resource'];?>js/bootstrap.min.js"></script>
    <!-- Chosen Js --> 
    <script src="<?php echo site_url().$options['admin_resource']?>js/chosen.jquery.min.js"></script>  
    <!-- Data table Js --> 
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/buttons.flash.min.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/jszip.min.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/pdfmake.min.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/buttons.print.min.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/vfs_fonts.js"></script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/datatable/buttons.colVis.min.js"></script>
    <!-- Notify Js --> 
    <script src="<?php echo site_url().$options['admin_resource']?>js/notify.min.js"></script>
     <!-- Validator Js --> 
    <script src="<?php echo site_url().$options['admin_resource']?>js/jquery.validate.min.js"></script>
    <script type="text/javascript">
    	var validate_user_name="<?php echo lang('please_enter')." ".lang('user_name');?>";
    	var validate_password="<?php echo lang('please_enter')." ".lang('password');?>";
    </script>
    <script src="<?php echo site_url().$options['admin_resource']?>js/pages/login.js"></script>
    <script src="<?php echo site_url().$options['admin_resource'];?>js/main.js"></script>

    <?php if($this->session->flashdata('notification_msg')){ 
      $notification_type=$this->session->flashdata('notification_type');
      ?>
    <script type="text/javascript">
      jQuery(function($){
        var notification_msg="<?php echo $this->session->flashdata('notification_msg');?>";
        var notification_type="<?php echo $notification_type;?>";
        showNotifyJs(notification_msg,notification_type);
      });
    </script>

    <?php } ?>
       
  </body>
</html>