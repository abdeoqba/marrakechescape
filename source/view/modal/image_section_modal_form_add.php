      <!-- Modal -->
      <div class="modal fade" id="ImageAddModal" tabindex="-1" role="dialog" aria-labelledby="ImageAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="image-add" method="POST" enctype="multipart/form-data" >
            
            <div class="modal-header">
              <h5 class="modal-title" id="ImageAddModalLabel">New Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                <div class="form-group">
                  <label for="photo_file">Photo File</label>
                  <small></small>
                
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo_file" id="photo_file">
                        <label class="custom-file-label" for="photo_file">Choose file</label>
                      </div>
                      
              </div>
                    
                <div class="form-group">
                  <label for="alt_text">Alt Text</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="alt_text" name="alt_text"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Image</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="image_add_submit();"
      // function image_add_submit(){
      //   $("#ImageAddModal form").submit();
      // }
      </script>
      