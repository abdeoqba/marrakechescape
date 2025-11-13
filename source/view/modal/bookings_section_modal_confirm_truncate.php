      <!-- Modal -->
      <div class="modal fade" id="BookingsTruncateModal" tabindex="-1" role="dialog" aria-labelledby="BookingsTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="bookings-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="BookingsTruncateModalLabel">Truncate Bookings</h5>
              <button type="button" class="close" onclick="bookings_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Bookingss?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="bookings_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="bookings_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function bookings_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#BookingsTruncateModal").modal("show");
      }

      function bookings_truncate_submit(){
        $("#BookingsTruncateModal form").submit();
      }

      function bookings_truncate_dismiss(){
        $("#BookingsTruncateModal").modal("hide");
      }
      </script>
      