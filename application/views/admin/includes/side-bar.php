<div class="col-md-2" id="sidebar_left">
                  <div class="sidebar content-box" style="display: block;">
                      <ul class="nav">
                          <!-- Main menu -->
                          <li class="active">
                           <a href="<?php echo site_url('scadmin');?>"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                          </li>
                          
                          <li>
                              <a href="javascript:;" data-toggle="collapse" data-target="#course-list">
                                  Course<i class="fa fa-fw fa-caret-down pull-right"></i>
                              </a>
                              <ul id="course-list" class="collapse">
                                  <li>
                                      <a href="<?php echo site_url('scadmin/course/');?>">Course List</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo site_url('scadmin/course/add');?>">Add Course</a>
                                  </li>
                              </ul>
                          </li>
                           <li>
                              <a href="<?php echo site_url('scadmin/login/out');?>">Logout<i class="fa fa-fw fa-sign-out pull-right"></i></a>
                          </li>
                      </ul>
                   </div>
                </div>