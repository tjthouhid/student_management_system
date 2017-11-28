
       
    <script src="<?php echo site_url().$options['public_resource'];?>js/bootstrap.min.js"></script>
    <!-- Chosen Js --> 
    <script src="<?php echo site_url().$options['public_resource']?>js/chosen.jquery.min.js"></script>  
    
    <!-- Notify Js --> 
    <script src="<?php echo site_url().$options['public_resource']?>js/notify.min.js"></script>
     <!-- Validator Js --> 
    <script src="<?php echo site_url().$options['public_resource']?>js/jquery.validate.min.js"></script>
    <script src="<?php echo site_url().$options['public_resource'];?>js/custom.js"></script>

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