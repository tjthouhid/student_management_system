
<div class="col-md-10"> <!-- Start of Main Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large maincontent">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $page_name;?></h1><!-- header test -->
                    <a href="<?php echo site_url();?>scadmin/students/add" class="btn btn-primary"><?php echo lang('add')." ".lang("student");?></a>
                </div>
                <div class="panel-body"> <!-- Start of content Body -->
                    <div class="search-bar">
                        <input class="form-control searchOptns" type="text" placeholder="Title" id="student_name">
                        <input class="form-control searchOptns" type="text" placeholder="Gender" id="student_gender">

                        <button type="button" class="form-control searchOptns" id="column_search" name="column_search" >Search</button>
                    </div>
                    <table id="students_table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><?php echo lang('sl_no');?></th>
                          <th><?php echo lang('student');?> <?php echo lang('title');?></th>
                           <th><?php echo lang('student');?> <?php echo lang('birthdate');?></th> 
                           <th><?php echo lang('student');?> <?php echo lang('gender');?></th> 
                          <th><?php echo lang('action');?></th>
                        </tr>
                      </thead>


                      <tbody>

                      </tbody>
                    </table>
                </div> <!-- End of content Body -->
            </div>
        </div>
    </div>
</div><!-- End of main container -->


<div class="modal fade" tabindex="-1" role="dialog" id="delete-column">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo lang('delete')." ".lang('class');?></h4>
      </div>
      <div class="modal-body">
        <?php echo lang('delete_confirm');?>
        <input type="hidden" value="" class="delete-action">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('cancel')?></button>
        <button type="button" class="btn btn-primary do-delete-btn"><?php echo lang('yes')?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" src="<?php echo site_url().$options['admin_resource'];?>js/pages/students.js"></script>

