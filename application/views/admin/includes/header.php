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
    <header id="header">
        <div class="container-fluid">
            <div class="row">
               <nav class="navbar navbar-default">
               <div class="container-fluid">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="Dashboard.html">
                       <h3 class="logo">School<span class="half_color">Logo</span></h3>
                     </a>
                    </div>
                      <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                      <ul class="nav navbar-nav navbar-right">
                     
                         <li>
                            <a href="#"><i class="fa fa-plus-circle"></i> Add User</a>
                         </li>
                         <li>
                            <a href="#"><i class="fa fa-th-list"></i> User List</a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello Emon<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-key"></i> Password</a>
                            </li>
                           
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                          </ul>
                        </li>
               
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
            </div>
            </div>
    </header>



    <section id="page-content">
      <div class="container-fluid">
          <div class="row margin_row">
            <?php $this->load->view($root_folder.'/includes/side-bar');?>
              