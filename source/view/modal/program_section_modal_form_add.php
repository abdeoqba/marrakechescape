      <!-- Modal -->
      <div class="modal fade" id="ProgramAddModal" tabindex="-1" role="dialog" aria-labelledby="ProgramAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramAddModalLabel">New Program</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_categorys==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_categorys==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Program there must be existing Categorys, But there are no Categorys now. To add a new pen go to the list of Categorys</p>
                    <a href="categorys" class="btn btn-outline-light"><i class="fa fa-list"></i> Categorys list</a>
                    <a href="categorys" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Category</a>
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
                    <p class="card-text">To add a Program there must be existing Images, But there are no Images now. To add a new pen go to the list of Images</p>
                    <a href="images" class="btn btn-outline-light"><i class="fa fa-list"></i> Images list</a>
                    <a href="images" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Image</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
                <div class="form-group">
                  <label for="id_category">Category</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_category" id="id_category" class="form-control">';

                    foreach ($category_->categorys as $key_category => $c) {

                      echo '<option value="'.$c->id_category.'">'.$c->id_category.'</option>';
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
                  <label for="nbr_days">Nbr Days</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="nbr_days" name="nbr_days"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="start">Start</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="start" name="start"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="end">End</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="end" name="end"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="price">Price</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="price" name="price"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Program</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="program_add_submit();"
      // function program_add_submit(){
      //   $("#ProgramAddModal form").submit();
      // }
      </script>
      