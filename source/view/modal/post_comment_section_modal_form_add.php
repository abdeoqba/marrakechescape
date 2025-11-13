      <!-- Modal -->
      <div class="modal fade" id="PostCommentAddModal" tabindex="-1" role="dialog" aria-labelledby="PostCommentAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_comment-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="PostCommentAddModalLabel">New Post Comment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_posts==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_posts==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Post Comment there must be existing Posts, But there are no Posts now. To add a new pen go to the list of Posts</p>
                    <a href="posts" class="btn btn-outline-light"><i class="fa fa-list"></i> Posts list</a>
                    <a href="posts" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Post</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
            <?php if($nbr_clients==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_clients==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Post Comment there must be existing Clients, But there are no Clients now. To add a new pen go to the list of Clients</p>
                    <a href="clients" class="btn btn-outline-light"><i class="fa fa-list"></i> Clients list</a>
                    <a href="clients" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Client</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
                <div class="form-group">
                  <label for="id_post">Post</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_post" id="id_post" class="form-control">';

                    foreach ($post_->posts as $key_post => $p) {

                      echo '<option value="'.$p->id_post.'">'.$p->id_post.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                    
                <div class="form-group">
                  <label for="id_client">Client</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_client" id="id_client" class="form-control">';

                    foreach ($client_->clients as $key_client => $c) {

                      echo '<option value="'.$c->id_client.'">'.$c->first_name.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                <div class="form-group">
                  <label for="name">Name</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="name" name="name"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="email">Email</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="email" name="email"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="content">Content</label>
                  <small></small>
                
                      <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                      
              </div>
                    
                <div class="form-group">
                  <label for="status">Status</label>
                  <small>pending, approved, rejected</small>
                
                      <input type="text" class="form-control" id="status" name="status"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Post Comment</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="post_comment_add_submit();"
      // function post_comment_add_submit(){
      //   $("#PostCommentAddModal form").submit();
      // }
      </script>
      