$(function () {
  $("#table").DataTable();
  $("#start_at").on("click", function() {
    $(this).datetimepicker({
      inline: true,
      sideBySide: true,
      locale: 'id',
      format: 'DD/MM/YYYY HH:mm'
    });
  });
  $("#end_at").on("click", function() {
    $(this).datetimepicker({
      inline: true,
      sideBySide: true,
      locale: 'id',
      format: 'DD/MM/YYYY HH:mm'
    });
  });
  $("#datetimepicker12").datetimepicker({
    inline: true,
    sideBySide: true,
    locale: 'id',
    format: 'DD/MM/YYYY HH:mm'
  });
});
