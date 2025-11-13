let card_hover_class = "list-group-item-secondary";

function export_csv(){
  $("#export_form").submit();
}

$(function() {

  $(".modal").on("hide.bs.modal", function (e) {
    $(".list-group-item").removeClass(card_hover_class);
  });

  $(".toast").toast("show");
  
});