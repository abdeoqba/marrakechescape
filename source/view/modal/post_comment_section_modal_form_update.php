      <!-- Modal -->
      <div class="modal fade" id="PostCommentUpdateModal" tabindex="-1" role="dialog" aria-labelledby="PostCommentUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_comment-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostCommentUpdateModalLabel">Update Post Comment</h5>
              <button type="button" class="close" onclick="post_comment_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_post_comment" id="post_comment_update_id_post_comment" >
                <div class="form-group">
                  <label for="post_comment_update_id_post">Post</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_post" id="post_comment_update_id_post" class="form-control">';

                      foreach ($post_->posts as $key_post => $p_) {

                        echo '<option value="'.$p_->id_post.'">'.$p_->id_post.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="post_comment_update_id_client">Client</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_client" id="post_comment_update_id_client" class="form-control">';

                      foreach ($client_->clients as $key_client => $c_) {

                        echo '<option value="'.$c_->id_client.'">'.$c_->first_name.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="post_comment_update_name">Name</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_comment_update_name" name="name" >
                </div>
                <div class="form-group">
                  <label for="post_comment_update_email">Email</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_comment_update_email" name="email" >
                </div>
                <div class="form-group">
                  <label for="post_comment_update_content">Content</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="content" id="post_comment_update_content"></textarea>
                      
                </div>
                <div class="form-group">
                  <label for="post_comment_update_status">Status</label>
                  <small>pending, approved, rejected</small>
                  <input type="text" class="form-control" id="post_comment_update_status" name="status" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="post_comment_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="post_comment_update_submit();"><i class="fa fa-pen"></i> Update Post Comment</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function post_comment_update_set(id_post_comment){
          //code
          
          $("#post_comment_update_id_post_comment").val(id_post_comment);
              
          let id_post = $("#id_post_"+id_post_comment).val();
          $("#post_comment_update_id_post").val(id_post);
              
          let id_client = $("#id_client_"+id_post_comment).val();
          $("#post_comment_update_id_client").val(id_client);
              
          let name = $("#name_"+id_post_comment).text();
          $("#post_comment_update_name").val(name);
              
          let email = $("#email_"+id_post_comment).text();
          $("#post_comment_update_email").val(email);
              
          let content = $("#content_"+id_post_comment).text();
          $("#post_comment_update_content").val(content);
              
          let status = $("#status_"+id_post_comment).text();
          $("#post_comment_update_status").val(status);
              $(".post_comment-"+id_post_comment+" .list-group-item").addClass(card_hover_class);

          $("#PostCommentUpdateModal").modal("show");
        }

        function post_comment_update_submit(){
          $("#PostCommentUpdateModal form").submit();
        }

        function post_comment_update_dismiss(){
          $("#PostCommentUpdateModal").modal("hide");
        }
      </script>
      