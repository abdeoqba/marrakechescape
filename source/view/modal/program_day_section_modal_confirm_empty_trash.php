      <!-- Modal -->
      <div class="modal fade" id="ProgramDayEmptyTrashModal" tabindex="-1" role="dialog" aria-labelledby="ProgramDayEmptyTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_day-empty-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramDayEmptyTrashModalLabel">Empty Trash Program Day</h5>
              <button type="button" class="close" onclick="program_day_empty_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Program Days?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_day_empty_trash_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="program_day_empty_trash_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>