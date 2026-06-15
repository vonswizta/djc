var scrollLinks = document.querySelectorAll('a[href^="#"]');
var scrollOffset = mastHeight;

scrollLinks.forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    var target = document.querySelector(this.getAttribute('href'));
    if (target) {
      var targetOffset = target.getBoundingClientRect().top + window.pageYOffset - scrollOffset;
      window.scrollTo({
        top: targetOffset,
        behavior: 'smooth'
      });
      target.setAttribute('tabindex', '-1');
      target.focus();
    }
  });
});
