if (document.querySelector('#filter-category') !== null) {
  $('#filter-category').on('change', function () {
    var url = "/category/" + $(this).val();
    if (url) {
      window.location.href = url;
    }
  });
}