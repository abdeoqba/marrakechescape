      <!-- Modal -->
      <div class="modal fade" id="BookingsMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="BookingsMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="bookings-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="BookingsMoveToTrashModalLabel">Delete Bookings</h5>
              <button type="button" class="close" onclick="bookings_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="bookings_move_to_trash_id_bookings"></b> ?</p>
              <input type="hidden" class="form-control" id="bookings_move_to_trash_id_bookings" name="id_bookings">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="bookings_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="bookings_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function bookings_move_to_trash_set(id_bookings,id_bookings){
        $("#bookings_move_to_trash_id_bookings").html(id_bookings);
        $("#bookings_move_to_trash_id_bookings").val(id_bookings);

        $(".bookings-"+id_bookings+" .list-group-item").addClass(card_hover_class);

        $("#BookingsMoveToTrashModal").modal("show");
      }

      function bookings_move_to_trash_submit(){
        $("#BookingsMoveToTrashModal form").submit();
      }

      function bookings_move_to_trash_dismiss(){
        $("#BookingsMoveToTrashModal").modal("hide");
      }
      </script>
      