      <!-- Modal -->
      <div class="modal fade" id="BookingsDeleteModal" tabindex="-1" role="dialog" aria-labelledby="BookingsDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="bookings-delete" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="BookingsDeleteModalLabel">Delete Bookings</h5>
              <button type="button" class="close" onclick="bookings_delete_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="bookings_delete_name"></b> ?</p>
              <input type="hidden" class="form-control" id="bookings_delete_id_bookings" name="id_bookings">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="bookings_delete_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="bookings_delete_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>