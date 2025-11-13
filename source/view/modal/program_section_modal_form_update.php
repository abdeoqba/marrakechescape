      <!-- Modal -->
      <div class="modal fade" id="ProgramUpdateModal" tabindex="-1" role="dialog" aria-labelledby="ProgramUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramUpdateModalLabel">Update Program</h5>
              <button type="button" class="close" onclick="program_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_program" id="program_update_id_program" >
                <div class="form-group">
                  <label for="program_update_id_category">Category</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_category" id="program_update_id_category" class="form-control">';

                      foreach ($category_->categorys as $key_category => $c_) {

                        echo '<option value="'.$c_->id_category.'">'.$c_->id_category.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="program_update_id_image">Image</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_image" id="program_update_id_image" class="form-control">';

                      foreach ($image_->images as $key_image => $i_) {

                        echo '<option value="'.$i_->id_image.'">'.$i_->alt_text.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="program_update_nbr_days">Nbr Days</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_update_nbr_days" name="nbr_days" >
                </div>
                <div class="form-group">
                  <label for="program_update_start">Start</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_update_start" name="start" >
                </div>
                <div class="form-group">
                  <label for="program_update_end">End</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_update_end" name="end" >
                </div>
                <div class="form-group">
                  <label for="program_update_price">Price</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_update_price" name="price" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="program_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="program_update_submit();"><i class="fa fa-pen"></i> Update Program</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function program_update_set(id_program){
          //code
          
          $("#program_update_id_program").val(id_program);
              
          let id_category = $("#id_category_"+id_program).val();
          $("#program_update_id_category").val(id_category);
              
          let id_image = $("#id_image_"+id_program).val();
          $("#program_update_id_image").val(id_image);
              
          let nbr_days = $("#nbr_days_"+id_program).text();
          $("#program_update_nbr_days").val(nbr_days);
              
          let start = $("#start_"+id_program).text();
          $("#program_update_start").val(start);
              
          let end = $("#end_"+id_program).text();
          $("#program_update_end").val(end);
              
          let price = $("#price_"+id_program).text();
          $("#program_update_price").val(price);
              $(".program-"+id_program+" .list-group-item").addClass(card_hover_class);

          $("#ProgramUpdateModal").modal("show");
        }

        function program_update_submit(){
          $("#ProgramUpdateModal form").submit();
        }

        function program_update_dismiss(){
          $("#ProgramUpdateModal").modal("hide");
        }
      </script>
      