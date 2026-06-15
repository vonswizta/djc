$('#main a[href^="http"]').each(function () {
  if (this.href.indexOf(location.hostname) == -1) {
    $(this).attr({
      target: "_blank",
      rel: "noopener noreferrer",
      title: "Opens in a new window"
    });
  }
});
