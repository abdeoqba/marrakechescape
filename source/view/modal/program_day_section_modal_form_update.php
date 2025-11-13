      <!-- Modal -->
      <div class="modal fade" id="ProgramDayUpdateModal" tabindex="-1" role="dialog" aria-labelledby="ProgramDayUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_day-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramDayUpdateModalLabel">Update Program Day</h5>
              <button type="button" class="close" onclick="program_day_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_program_day" id="program_day_update_id_program_day" >
                <div class="form-group">
                  <label for="program_day_update_id_program">Program</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_program" id="program_day_update_id_program" class="form-control">';

                      foreach ($program_->programs as $key_program => $p_) {

                        echo '<option value="'.$p_->id_program.'">'.$p_->id_program.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="program_day_update_day_order">Day Order</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_day_update_day_order" name="day_order" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="program_day_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="program_day_update_submit();"><i class="fa fa-pen"></i> Update Program Day</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function program_day_update_set(id_program_day){
          //code
          
          $("#program_day_update_id_program_day").val(id_program_day);
              
          let id_program = $("#id_program_"+id_program_day).val();
          $("#program_day_update_id_program").val(id_program);
              
          let day_order = $("#day_order_"+id_program_day).text();
          $("#program_day_update_day_order").val(day_order);
              $(".program_day-"+id_program_day+" .list-group-item").addClass(card_hover_class);

          $("#ProgramDayUpdateModal").modal("show");
        }

        function program_day_update_submit(){
          $("#ProgramDayUpdateModal form").submit();
        }

        function program_day_update_dismiss(){
          $("#ProgramDayUpdateModal").modal("hide");
        }
      </script>
      