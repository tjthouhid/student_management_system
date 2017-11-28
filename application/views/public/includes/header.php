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
        <link rel="stylesheet" href="<?php echo site_url().$options['public_resource'];?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo site_url().$options['public_resource'];?>css/bootstrap.min.css">
         <!-- choosen css -->
        <link href="<?php echo site_url().$options['public_resource'];?>css/chosen.min.css" rel="stylesheet">        

        <link rel="stylesheet" href="<?php echo site_url().$options['public_resource'];?>css/style.css">
       
       
        <!-- Jquery -->
        <script src="<?php echo site_url().$options['public_resource'];?>js/jquery.js"></script>
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
   <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Student Management</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <?php if(!$this->session->userdata('user_logged_in')){ ?>
          <li class="active"><a href="<?php echo site_url('home');?>">Home <span class="sr-only">(current)</span></a></li>
           <?php }else { ?>
          <li class="active"><a href="<?php echo site_url('students/profile');?>">Profile</a></li>
          <?php } ?>
         
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
          <?php if(!$this->session->userdata('user_logged_in')){ ?>
          <li><a href="<?php echo site_url('students/register');?>">Register</a></li>
          <li><a href="<?php echo site_url('students/login');?>">Login</a></li>
          <?php }else { ?>
          <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo site_url()."uploads/students/".$this->session->userdata('user_photo');?>" width="20px;"> &nbsp; <?php echo $this->session->userdata('user_name');?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              
              <li><a href="<?php echo site_url('students/logout');?>">Logout</a></li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>


