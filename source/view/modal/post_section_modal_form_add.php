      <!-- Modal -->
      <div class="modal fade" id="PostAddModal" tabindex="-1" role="dialog" aria-labelledby="PostAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="PostAddModalLabel">New Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_post_categorys==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_post_categorys==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Post there must be existing Post Categorys, But there are no Post Categorys now. To add a new pen go to the list of Post Categorys</p>
                    <a href="post_categorys" class="btn btn-outline-light"><i class="fa fa-list"></i> Post Categorys list</a>
                    <a href="post_categorys" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Post Category</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
            <?php if($nbr_images==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_images==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Post there must be existing Images, But there are no Images now. To add a new pen go to the list of Images</p>
                    <a href="images" class="btn btn-outline-light"><i class="fa fa-list"></i> Images list</a>
                    <a href="images" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Image</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
                <div class="form-group">
                  <label for="id_post_category">Post Category</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_post_category" id="id_post_category" class="form-control">';

                    foreach ($post_category_->post_categorys as $key_post_category => $p) {

                      echo '<option value="'.$p->id_post_category.'">'.$p->id_post_category.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                    
                <div class="form-group">
                  <label for="id_image">Image</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_image" id="id_image" class="form-control">';

                    foreach ($image_->images as $key_image => $i) {

                      echo '<option value="'.$i->id_image.'">'.$i->alt_text.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                <div class="form-group">
                  <label for="published_at">Published At</label>
                  <small></small>
                
                      <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="<?=variables::date_time_local_format(); ?>"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="status">Status</label>
                  <small>draft, published</small>
                
                      <input type="text" class="form-control" id="status" name="status"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Post</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="post_add_submit();"
      // function post_add_submit(){
      //   $("#PostAddModal form").submit();
      // }
      </script>
      