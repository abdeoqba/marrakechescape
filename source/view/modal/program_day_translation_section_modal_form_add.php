      <!-- Modal -->
      <div class="modal fade" id="ProgramDayTranslationAddModal" tabindex="-1" role="dialog" aria-labelledby="ProgramDayTranslationAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_day_translation-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramDayTranslationAddModalLabel">New Program Day Translation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_program_days==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_program_days==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Program Day Translation there must be existing Program Days, But there are no Program Days now. To add a new pen go to the list of Program Days</p>
                    <a href="program_days" class="btn btn-outline-light"><i class="fa fa-list"></i> Program Days list</a>
                    <a href="program_days" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Program Day</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
                <div class="form-group">
                  <label for="id_day">Day</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_day" id="id_day" class="form-control">';

                    foreach ($program_day_->program_days as $key_program_day => $p) {

                      echo '<option value="'.$p->id_program_day.'">'.$p->day_order.'</option>';
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
                  <label for="content">Content</label>
                  <small></small>
                
                      <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                      
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Program Day Translation</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="program_day_translation_add_submit();"
      // function program_day_translation_add_submit(){
      //   $("#ProgramDayTranslationAddModal form").submit();
      // }
      </script>
      