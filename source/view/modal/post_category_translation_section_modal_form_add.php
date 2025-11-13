      <!-- Modal -->
      <div class="modal fade" id="PostCategoryTranslationAddModal" tabindex="-1" role="dialog" aria-labelledby="PostCategoryTranslationAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_category_translation-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="PostCategoryTranslationAddModalLabel">New Post Category Translation</h5>
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
                    <p class="card-text">To add a Post Category Translation there must be existing Post Categorys, But there are no Post Categorys now. To add a new pen go to the list of Post Categorys</p>
                    <a href="post_categorys" class="btn btn-outline-light"><i class="fa fa-list"></i> Post Categorys list</a>
                    <a href="post_categorys" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Post Category</a>
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
                  <label for="description">Description</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="description" name="description"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Post Category Translation</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="post_category_translation_add_submit();"
      // function post_category_translation_add_submit(){
      //   $("#PostCategoryTranslationAddModal form").submit();
      // }
      </script>
      