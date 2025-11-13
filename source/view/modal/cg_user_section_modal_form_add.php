      <!-- Modal -->
      <div class="modal fade" id="UserAddModal" tabindex="-1" role="dialog" aria-labelledby="UserAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="cg_user-add" method="POST">
            
            <div class="modal-header">
              <h5 class="modal-title" id="UserAddModalLabel">New User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?><div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <small>Username for authentification</small>
                      
                        <input type="text" class="form-control" id="username" name="username"  >
                    
                    </div>
                    
                      <div class="form-group">
                        <label for="password">Password</label>
                        <small>Password for authentification</small>
                      
                        <input type="text" class="form-control" id="password" name="password"  >
                    
                    </div>
                    
                      <div class="form-group">
                        <label for="role">Role</label>
                        <small>User role (Admin, User or Visitor)</small>
                      
                        <input type="text" class="form-control" id="role" name="role"  >
                    
                    </div>
                    
                      <div class="form-group">
                        <label for="active">Active</label>
                        <small>State of user </small>
                      

                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="active" name="active" onchange="check_active()" >
                          <label class="custom-control-label" for="active" id="active_label">False</label>

                          <script>
                            function check_active(){

                              let active_label = $("#active_label");
                              let active = $("#active").is(":checked");
                              let active_message = "";

                              if(active) 
                                active_message = "True";
                              else 
                                active_message = "False";

                              $("#active_label").text(active_message);
                            
                            }
                          </script>
                        </div>
                      
                    </div>
                    
                      <div class="form-group">
                        <label for="allow_trash">Allow Trash</label>
                        <small>Allow access to trash</small>
                      

                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="allow_trash" name="allow_trash" onchange="check_allow_trash()" >
                          <label class="custom-control-label" for="allow_trash" id="allow_trash_label">False</label>

                          <script>
                            function check_allow_trash(){

                              let allow_trash_label = $("#allow_trash_label");
                              let allow_trash = $("#allow_trash").is(":checked");
                              let allow_trash_message = "";

                              if(allow_trash) 
                                allow_trash_message = "True";
                              else 
                                allow_trash_message = "False";

                              $("#allow_trash_label").text(allow_trash_message);
                            
                            }
                          </script>
                        </div>
                      
                    </div>
                    
                      <div class="form-group">
                        <label for="allow_truncate">Allow Truncate</label>
                        <small>Allow initial data</small>
                      

                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="allow_truncate" name="allow_truncate" onchange="check_allow_truncate()" >
                          <label class="custom-control-label" for="allow_truncate" id="allow_truncate_label">False</label>

                          <script>
                            function check_allow_truncate(){

                              let allow_truncate_label = $("#allow_truncate_label");
                              let allow_truncate = $("#allow_truncate").is(":checked");
                              let allow_truncate_message = "";

                              if(allow_truncate) 
                                allow_truncate_message = "True";
                              else 
                                allow_truncate_message = "False";

                              $("#allow_truncate_label").text(allow_truncate_message);
                            
                            }
                          </script>
                        </div>
                      
                    </div>
                    
                      <div class="form-group">
                        <label for="allow_read_history">Allow Read History</label>
                        <small>Allow access jornal activities</small>
                      

                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="allow_read_history" name="allow_read_history" onchange="check_allow_read_history()" >
                          <label class="custom-control-label" for="allow_read_history" id="allow_read_history_label">False</label>

                          <script>
                            function check_allow_read_history(){

                              let allow_read_history_label = $("#allow_read_history_label");
                              let allow_read_history = $("#allow_read_history").is(":checked");
                              let allow_read_history_message = "";

                              if(allow_read_history) 
                                allow_read_history_message = "True";
                              else 
                                allow_read_history_message = "False";

                              $("#allow_read_history_label").text(allow_read_history_message);
                            
                            }
                          </script>
                        </div>
                      
                    </div>
                    
                      <div class="form-group">
                        <label for="allow_edit">Allow Edit</label>
                        <small>Allow add, update and delete data</small>
                      

                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="allow_edit" name="allow_edit" onchange="check_allow_edit()" >
                          <label class="custom-control-label" for="allow_edit" id="allow_edit_label">False</label>

                          <script>
                            function check_allow_edit(){

                              let allow_edit_label = $("#allow_edit_label");
                              let allow_edit = $("#allow_edit").is(":checked");
                              let allow_edit_message = "";

                              if(allow_edit) 
                                allow_edit_message = "True";
                              else 
                                allow_edit_message = "False";

                              $("#allow_edit_label").text(allow_edit_message);
                            
                            }
                          </script>
                        </div>
                      
                    </div>
                    
                      <div class="form-group">
                        <label for="allow_manage">Allow Manage</label>
                        <small>allow manage users</small>
                      

                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="allow_manage" name="allow_manage" onchange="check_allow_manage()" >
                          <label class="custom-control-label" for="allow_manage" id="allow_manage_label">False</label>

                          <script>
                            function check_allow_manage(){

                              let allow_manage_label = $("#allow_manage_label");
                              let allow_manage = $("#allow_manage").is(":checked");
                              let allow_manage_message = "";

                              if(allow_manage) 
                                allow_manage_message = "True";
                              else 
                                allow_manage_message = "False";

                              $("#allow_manage_label").text(allow_manage_message);
                            
                            }
                          </script>
                        </div>
                      
                    </div>
                    
                  </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-primary" onclick="cg_user_add_submit();" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add User</button>
            </div>
          </form>
        </div>
      </div>