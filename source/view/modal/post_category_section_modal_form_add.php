      <!-- Modal -->
      <div class="modal fade" id="PostCategoryAddModal" tabindex="-1" role="dialog" aria-labelledby="PostCategoryAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_category-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="PostCategoryAddModalLabel">New Post Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_images==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_images==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Post Category there must be existing Images, But there are no Images now. To add a new pen go to the list of Images</p>
                    <a href="images" class="btn btn-outline-light"><i class="fa fa-list"></i> Images list</a>
                    <a href="images" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Image</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
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
                        
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Post Category</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="post_category_add_submit();"
      // function post_category_add_submit(){
      //   $("#PostCategoryAddModal form").submit();
      // }
      </script>
      