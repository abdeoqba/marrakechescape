      <!-- Modal -->
      <div class="modal fade" id="PaymentsMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="PaymentsMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="payments-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PaymentsMoveToTrashModalLabel">Delete Payments</h5>
              <button type="button" class="close" onclick="payments_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="payments_move_to_trash_id_payments"></b> ?</p>
              <input type="hidden" class="form-control" id="payments_move_to_trash_id_payments" name="id_payments">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="payments_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="payments_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function payments_move_to_trash_set(id_payments,id_payments){
        $("#payments_move_to_trash_id_payments").html(id_payments);
        $("#payments_move_to_trash_id_payments").val(id_payments);

        $(".payments-"+id_payments+" .list-group-item").addClass(card_hover_class);

        $("#PaymentsMoveToTrashModal").modal("show");
      }

      function payments_move_to_trash_submit(){
        $("#PaymentsMoveToTrashModal form").submit();
      }

      function payments_move_to_trash_dismiss(){
        $("#PaymentsMoveToTrashModal").modal("hide");
      }
      </script>
      