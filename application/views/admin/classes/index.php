
<div class="col-md-10"> <!-- Start of Main Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large maincontent">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $page_name;?></h1><!-- header test -->
                    <a href="<?php echo site_url();?>scadmin/classes/add" class="btn btn-primary"><?php echo lang('add')." ".lang("class");?></a>
                </div>
                <div class="panel-body"> <!-- Start of content Body -->
                    <div class="search-bar">
                        <input class="form-control searchOptns" type="text" placeholder="Title" id="class_title">
                        <button type="button" class="form-control searchOptns" id="column_search" name="column_search" >Search</button>
                    </div>
                    <table id="classes_table" class="table table-striped table-bordered">
                      <thead>
                       <!--  <tr>
                            <td></td>
                            <td><input class="form-control searchOptns" type="text" placeholder="Restaurant Name" id="restaurant_name"></td>
                            <td><input class="form-control searchOptns" type="text" placeholder="Zip Code" id="restaurant_postcode"></td>
                            <td><input class="form-control searchOptns" type="text" placeholder="City" id="restaurant_city"></td>
                            <td><input class="form-control searchOptns" type="text" placeholder="Phone" id="restaurant_phone"></td>
                            <td><input class="form-control searchOptns date" type="text" placeholder="Created" id="created"></td>
                            <td><button type="button" class="form-control searchOptns" id="column_search" name="column_search" ><i class="fa fa-search" aria-hidden="true"></i></button></td>
                            <td colspan=""><button type="button" class="form-control show_dataTable_search_bar"><i class="fa fa-arrow-down" aria-hidden="true"></i></button></td>
                            
                        </tr>
 -->                    <tr>
                          <th><?php echo lang('sl_no');?></th>
                          <th><?php echo lang('class');?> <?php echo lang('title');?></th>
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

<script type="text/javascript" src="<?php echo site_url().$options['admin_resource'];?>js/pages/classes.js"></script>

