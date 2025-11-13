      <!-- Modal -->
      <div class="modal fade" id="PostTranslationAddModal" tabindex="-1" role="dialog" aria-labelledby="PostTranslationAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_translation-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="PostTranslationAddModalLabel">New Post Translation</h5>
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
                    <p class="card-text">To add a Post Translation there must be existing Posts, But there are no Posts now. To add a new pen go to the list of Posts</p>
                    <a href="posts" class="btn btn-outline-light"><i class="fa fa-list"></i> Posts list</a>
                    <a href="posts" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Post</a>
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
                  <label for="language">Language</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="language" name="language"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="title">Title</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="title" name="title"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="slug" name="slug"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="content">Content</label>
                  <small></small>
                
                      <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                      
              </div>
                    
                <div class="form-group">
                  <label for="meta_title">Meta Title</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="meta_title" name="meta_title"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="meta_description">Meta Description</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="meta_description" name="meta_description"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="excerpt">Excerpt</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="excerpt" name="excerpt"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Post Translation</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="post_translation_add_submit();"
      // function post_translation_add_submit(){
      //   $("#PostTranslationAddModal form").submit();
      // }
      </script>
      