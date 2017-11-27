<?php
$class_name="";

$url=site_url()."scadmin/classes/insert_class";
$btn_text=lang('save');
if(isset($id)){
    if($datas){
        $class_name=$datas[0]->class_title;
        $url=site_url()."scadmin/classes/update_class/".$id;
        $btn_text=lang('update');
    }else{
        $this->session->set_flashdata('notification_msg', lang("not_available"));
        $this->session->set_flashdata('notification_type', 'error');                 
        redirect(site_url('scadmin/classes' ));
    }
}
?>

<div class="col-md-10"> <!-- Start of Main Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large maincontent">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $page_name;?></h1><!-- header test -->
                </div>
                <div class="panel-body"> <!-- Start of content Body -->
                    <form class="" action="<?php echo $url;?>" method="post">
                        <div class="form-group">
                           <label for="class_title"><?php echo lang("class")." ".lang("title");?></label>
                           <input type="text" class="form-control" id="class_title" name="class_title" placeholder="<?php echo lang("class")." ".lang("title");?>" required="" value="<?php echo $class_name;?>">
                         </div>
                         <button type="submit" class="btn btn-primary"><?php echo $btn_text;?></button>
                    </form>
                </div> <!-- End of content Body -->
            </div>
        </div>
    </div>
</div><!-- End of main container -->

