      <!-- Modal -->
      <div class="modal fade" id="UserUpdateModal" tabindex="-1" role="dialog" aria-labelledby="UserUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="cg_user-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="UserUpdateModalLabel">Update User</h5>
              <button type="button" class="close" onclick="cg_user_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_user" id="cg_user_update_id_user" >
                <div class="form-group">
                  <label for="cg_user_update_username">Username</label>
                  <small>Username for authentification</small>
                  <input type="text" class="form-control" id="cg_user_update_username" name="username" >
                </div>
                <div class="form-group">
                  <label for="cg_user_update_password">Password</label>
                  <small>Password for authentification</small>
                  <input type="text" class="form-control" id="cg_user_update_password" name="password" >
                </div>
                <div class="form-group">
                  <label for="cg_user_update_role">Role</label>
                  <small>User role (Admin, User or Visitor)</small>
                  <input type="text" class="form-control" id="cg_user_update_role" name="role" >
                </div>
                <div class="form-group">
                  <label for="cg_user_update_active">Active</label>
                  <small>State of user </small>
                  
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cg_user_update_active" name="active" onchange="check_cg_user_update_active()" >
                    <label class="custom-control-label" for="cg_user_update_active" id="cg_user_update_active_label"></label>
                    <script>
                      function check_cg_user_update_active(){

                        let cg_user_update_active_label = $("#cg_user_update_active_label");
                        let cg_user_update_active = $("#cg_user_update_active").is(":checked");
                        let cg_user_update_active_message = "";

                        if(cg_user_update_active) 
                          cg_user_update_active_message = "True";
                        else 
                          cg_user_update_active_message = "False";

                        $("#cg_user_update_active_label").text(cg_user_update_active_message);
                      
                      }
                    </script>
                  </div>
                      
                </div>
                <div class="form-group">
                  <label for="cg_user_update_allow_trash">Allow Trash</label>
                  <small>Allow access to trash</small>
                  
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cg_user_update_allow_trash" name="allow_trash" onchange="check_cg_user_update_allow_trash()" >
                    <label class="custom-control-label" for="cg_user_update_allow_trash" id="cg_user_update_allow_trash_label"></label>
                    <script>
                      function check_cg_user_update_allow_trash(){

                        let cg_user_update_allow_trash_label = $("#cg_user_update_allow_trash_label");
                        let cg_user_update_allow_trash = $("#cg_user_update_allow_trash").is(":checked");
                        let cg_user_update_allow_trash_message = "";

                        if(cg_user_update_allow_trash) 
                          cg_user_update_allow_trash_message = "True";
                        else 
                          cg_user_update_allow_trash_message = "False";

                        $("#cg_user_update_allow_trash_label").text(cg_user_update_allow_trash_message);
                      
                      }
                    </script>
                  </div>
                      
                </div>
                <div class="form-group">
                  <label for="cg_user_update_allow_truncate">Allow Truncate</label>
                  <small>Allow initial data</small>
                  
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cg_user_update_allow_truncate" name="allow_truncate" onchange="check_cg_user_update_allow_truncate()" >
                    <label class="custom-control-label" for="cg_user_update_allow_truncate" id="cg_user_update_allow_truncate_label"></label>
                    <script>
                      function check_cg_user_update_allow_truncate(){

                        let cg_user_update_allow_truncate_label = $("#cg_user_update_allow_truncate_label");
                        let cg_user_update_allow_truncate = $("#cg_user_update_allow_truncate").is(":checked");
                        let cg_user_update_allow_truncate_message = "";

                        if(cg_user_update_allow_truncate) 
                          cg_user_update_allow_truncate_message = "True";
                        else 
                          cg_user_update_allow_truncate_message = "False";

                        $("#cg_user_update_allow_truncate_label").text(cg_user_update_allow_truncate_message);
                      
                      }
                    </script>
                  </div>
                      
                </div>
                <div class="form-group">
                  <label for="cg_user_update_allow_read_history">Allow Read History</label>
                  <small>Allow access jornal activities</small>
                  
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cg_user_update_allow_read_history" name="allow_read_history" onchange="check_cg_user_update_allow_read_history()" >
                    <label class="custom-control-label" for="cg_user_update_allow_read_history" id="cg_user_update_allow_read_history_label"></label>
                    <script>
                      function check_cg_user_update_allow_read_history(){

                        let cg_user_update_allow_read_history_label = $("#cg_user_update_allow_read_history_label");
                        let cg_user_update_allow_read_history = $("#cg_user_update_allow_read_history").is(":checked");
                        let cg_user_update_allow_read_history_message = "";

                        if(cg_user_update_allow_read_history) 
                          cg_user_update_allow_read_history_message = "True";
                        else 
                          cg_user_update_allow_read_history_message = "False";

                        $("#cg_user_update_allow_read_history_label").text(cg_user_update_allow_read_history_message);
                      
                      }
                    </script>
                  </div>
                      
                </div>
                <div class="form-group">
                  <label for="cg_user_update_allow_edit">Allow Edit</label>
                  <small>Allow add, update and delete data</small>
                  
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cg_user_update_allow_edit" name="allow_edit" onchange="check_cg_user_update_allow_edit()" >
                    <label class="custom-control-label" for="cg_user_update_allow_edit" id="cg_user_update_allow_edit_label"></label>
                    <script>
                      function check_cg_user_update_allow_edit(){

                        let cg_user_update_allow_edit_label = $("#cg_user_update_allow_edit_label");
                        let cg_user_update_allow_edit = $("#cg_user_update_allow_edit").is(":checked");
                        let cg_user_update_allow_edit_message = "";

                        if(cg_user_update_allow_edit) 
                          cg_user_update_allow_edit_message = "True";
                        else 
                          cg_user_update_allow_edit_message = "False";

                        $("#cg_user_update_allow_edit_label").text(cg_user_update_allow_edit_message);
                      
                      }
                    </script>
                  </div>
                      
                </div>
                <div class="form-group">
                  <label for="cg_user_update_allow_manage">Allow Manage</label>
                  <small>allow manage users</small>
                  
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cg_user_update_allow_manage" name="allow_manage" onchange="check_cg_user_update_allow_manage()" >
                    <label class="custom-control-label" for="cg_user_update_allow_manage" id="cg_user_update_allow_manage_label"></label>
                    <script>
                      function check_cg_user_update_allow_manage(){

                        let cg_user_update_allow_manage_label = $("#cg_user_update_allow_manage_label");
                        let cg_user_update_allow_manage = $("#cg_user_update_allow_manage").is(":checked");
                        let cg_user_update_allow_manage_message = "";

                        if(cg_user_update_allow_manage) 
                          cg_user_update_allow_manage_message = "True";
                        else 
                          cg_user_update_allow_manage_message = "False";

                        $("#cg_user_update_allow_manage_label").text(cg_user_update_allow_manage_message);
                      
                      }
                    </script>
                  </div>
                      
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="cg_user_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="cg_user_update_submit();"><i class="fa fa-pen"></i> Update User</button>
            </div>
          </form>
        </div>
      </div>