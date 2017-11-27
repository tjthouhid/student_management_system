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