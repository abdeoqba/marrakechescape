      <!-- Modal -->
      <div class="modal fade" id="ProgramTranslationAddModal" tabindex="-1" role="dialog" aria-labelledby="ProgramTranslationAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_translation-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramTranslationAddModalLabel">New Program Translation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_programs==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_programs==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Program Translation there must be existing Programs, But there are no Programs now. To add a new pen go to the list of Programs</p>
                    <a href="programs" class="btn btn-outline-light"><i class="fa fa-list"></i> Programs list</a>
                    <a href="programs" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Program</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
                <div class="form-group">
                  <label for="id_program">Program</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_program" id="id_program" class="form-control">';

                    foreach ($program_->programs as $key_program => $p) {

                      echo '<option value="'.$p->id_program.'">'.$p->id_program.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                <div class="form-group">
                  <label for="language">Language</label>
                  <small>en, fr, ar</small>
                
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
                    
                <div class="form-group">
                  <label for="content">Content</label>
                  <small></small>
                
                      <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                      
              </div>
                    
                <div class="form-group">
                  <label for="includes">Includes</label>
                  <small></small>
                
                      <textarea class="form-control" rows="5" name="includes" id="includes"></textarea>
                      
              </div>
                    
                <div class="form-group">
                  <label for="excludes">Excludes</label>
                  <small></small>
                
                      <textarea class="form-control" rows="5" name="excludes" id="excludes"></textarea>
                      
              </div>
                    
                <div class="form-group">
                  <label for="highlights">Highlights</label>
                  <small></small>
                
                      <textarea class="form-control" rows="5" name="highlights" id="highlights"></textarea>
                      
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Program Translation</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="program_translation_add_submit();"
      // function program_translation_add_submit(){
      //   $("#ProgramTranslationAddModal form").submit();
      // }
      </script>
      